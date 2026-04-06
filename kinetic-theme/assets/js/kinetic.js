/**
 * KINETIC THEME — Main JavaScript
 * Scroll reveals · Nav behavior · Interactions · Mobile menu
 */

(function () {
  'use strict';

  /* ============================================================
     SCROLL REVEAL — IntersectionObserver
     ============================================================ */
  function initScrollReveals() {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Mark everything visible immediately if user prefers reduced motion
    if (prefersReduced) {
      document.querySelectorAll('[data-reveal], [data-stagger]').forEach(el => {
        el.classList.add('is-visible');
      });
      return;
    }

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target); // fire once
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );

    document.querySelectorAll('[data-reveal], [data-stagger]').forEach(el => {
      observer.observe(el);
    });
  }

  /* ============================================================
     NAV — scroll-aware background
     ============================================================ */
  function initNav() {
    const header = document.getElementById('site-header');
    if (!header) return;

    const update = () => {
      if (window.scrollY > 20) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    };

    window.addEventListener('scroll', update, { passive: true });
    update();
  }

  /* ============================================================
     MOBILE MENU TOGGLE
     ============================================================ */
  function initMobileMenu() {
    const btn  = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (!btn || !menu) return;

    const openIcon  = btn.querySelector('.icon-open');
    const closeIcon = btn.querySelector('.icon-close');

    btn.addEventListener('click', () => {
      const isOpen = menu.classList.toggle('open');
      btn.setAttribute('aria-expanded', String(isOpen));
      if (openIcon)  openIcon.style.display  = isOpen ? 'none'  : '';
      if (closeIcon) closeIcon.style.display = isOpen ? ''      : 'none';
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!header && !btn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.remove('open');
        btn.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ============================================================
     NEWSLETTER — inline validation & success state
     ============================================================ */
  function initNewsletter() {
    const form = document.getElementById('newsletter-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const input = form.querySelector('input[type="email"]');
      const btn   = form.querySelector('button[type="submit"]');
      if (!input || !btn) return;

      const email = input.value.trim();

      // Basic client-side guard
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        input.classList.add('!border-red-500', '!shadow-[0_0_0_3px_rgba(255,113,108,0.2)]');
        input.focus();
        setTimeout(() => {
          input.classList.remove('!border-red-500', '!shadow-[0_0_0_3px_rgba(255,113,108,0.2)]');
        }, 2500);
        return;
      }

      // Loading state
      btn.disabled = true;
      const originalText = btn.textContent;
      btn.textContent = 'Sending…';

      try {
        // Hook: POST to wp-admin/admin-ajax.php or a REST endpoint
        const response = await fetch(kineticData?.ajaxUrl || '/wp-admin/admin-ajax.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: new URLSearchParams({
            action: 'kinetic_newsletter_subscribe',
            email,
            nonce: kineticData?.nonce || '',
          }),
        });

        const data = await response.json();

        if (data.success) {
          // Success state
          form.innerHTML = `
            <div class="flex flex-col items-center gap-3 py-2">
              <span class="material-symbols-outlined text-5xl text-secondary">check_circle</span>
              <p class="text-on-surface font-bold text-lg font-headline">You're in!</p>
              <p class="text-on-surface-variant text-sm">Check your inbox for a confirmation.</p>
            </div>`;
        } else {
          throw new Error(data.data || 'Server error');
        }
      } catch {
        btn.disabled = false;
        btn.textContent = originalText;
        input.classList.add('!border-red-500');
        setTimeout(() => input.classList.remove('!border-red-500'), 2500);
      }
    });
  }

  /* ============================================================
     CARD TILT — very subtle mouse-tracking depth on bento cards
     ============================================================ */
  function initCardTilt() {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return;

    document.querySelectorAll('.bento-card').forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width  - 0.5) * 6;
        const y = ((e.clientY - rect.top)  / rect.height - 0.5) * 6;
        card.style.transform = `translateY(-5px) perspective(600px) rotateX(${-y}deg) rotateY(${x}deg)`;
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
      });
    });
  }

  /* ============================================================
     SMOOTH ANCHOR SCROLL
     ============================================================ */
  function initSmoothAnchors() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', (e) => {
        const target = document.querySelector(anchor.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  }

  /* ============================================================
     INIT
     ============================================================ */
  document.addEventListener('DOMContentLoaded', () => {
    initNav();
    initScrollReveals();
    initMobileMenu();
    initNewsletter();
    initCardTilt();
    initSmoothAnchors();
  });

})();
