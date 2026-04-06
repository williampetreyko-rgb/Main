<?php
/**
 * Hero Section
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<header id="hero" class="relative min-h-[921px] flex items-center overflow-hidden pt-20">

  <!-- Ambient glows -->
  <div class="absolute inset-0 z-0" aria-hidden="true">
    <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-primary/10 blur-[120px] rounded-full hero-orb"></div>
    <div class="absolute bottom-1/4 -right-20 w-[600px] h-[600px] bg-secondary/5 blur-[150px] rounded-full"
         style="animation-delay:3s" ></div>
  </div>

  <div class="container mx-auto px-8 relative z-10">
    <div class="max-w-5xl">

      <!-- Eyebrow -->
      <p class="font-label uppercase tracking-widest text-secondary text-sm mb-6"
         data-reveal="fade">
        <?php esc_html_e( 'Web Design & Development Agency', 'kinetic' ); ?>
      </p>

      <!-- Headline -->
      <h1 class="text-7xl md:text-9xl font-headline font-bold leading-[0.9] tracking-tighter text-on-surface mb-8"
          data-reveal>
        <?php echo esc_html( kinetic_get( 'hero_headline_1', 'We Build the' ) ); ?>
        <span class="text-gradient">
          <?php echo esc_html( kinetic_get( 'hero_headline_gradient', 'Future' ) ); ?>
        </span>
        <?php echo esc_html( kinetic_get( 'hero_headline_2', 'of the Web' ) ); ?>
      </h1>

      <!-- Tagline -->
      <p class="text-xl md:text-2xl text-on-surface-variant font-body max-w-2xl mb-12 leading-relaxed"
         data-reveal>
        <?php echo esc_html( kinetic_get( 'hero_tagline', 'KineticSEO combines high-fidelity design with technical mastery to create immersive digital experiences that define the new standard.' ) ); ?>
      </p>

      <!-- CTAs -->
      <div class="flex flex-col md:flex-row gap-6" data-reveal>
        <button class="btn-primary text-on-primary text-xl font-bold px-12 py-5 font-headline">
          <?php echo esc_html( kinetic_get( 'hero_cta_primary', 'Start Your Project' ) ); ?>
          <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
        </button>
        <button class="btn-ghost text-on-surface text-xl font-bold px-12 py-5 font-headline">
          <?php echo esc_html( kinetic_get( 'hero_cta_secondary', 'View Showreel' ) ); ?>
        </button>
      </div>

    </div><!-- /.max-w-5xl -->
  </div><!-- /.container -->

  <!-- Decorative ring stack (desktop only) -->
  <div class="absolute right-[-10%] top-1/2 -translate-y-1/2 w-[40%] aspect-square hidden xl:block pointer-events-none"
       aria-hidden="true">
    <div class="w-full h-full rounded-full border border-primary/20 ring-outer relative">
      <div class="absolute inset-4 rounded-full border border-secondary/10 ring-mid"></div>
      <div class="absolute inset-12 rounded-full border border-primary/5"></div>
      <?php
      $hero_img = get_theme_mod( 'kinetic_hero_image', '' );
      if ( $hero_img ) :
      ?>
      <img
        src="<?php echo esc_url( $hero_img ); ?>"
        alt=""
        class="w-full h-full object-cover rounded-full mix-blend-screen opacity-60"
        loading="eager"
        decoding="async">
      <?php endif; ?>
    </div>
  </div>

</header>
