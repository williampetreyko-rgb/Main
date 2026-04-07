<?php
/**
 * Hero Section — Updated Design
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;

$circuit_img = get_theme_mod( 'kinetic_circuit_image', '' );
$hero_img    = get_theme_mod( 'kinetic_hero_image', '' );
?>
<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<header id="hero" class="relative min-h-[110vh] flex items-center overflow-visible pt-20 pb-32">

  <!-- ── Background layers ── -->
  <div class="absolute inset-0 z-0 overflow-hidden" aria-hidden="true">

    <!-- Animated fluid mesh gradient -->
    <div class="smooth-mesh animate-hero-wave absolute inset-0"></div>

    <!-- Circuit board image (optional — set via Customizer) -->
    <?php if ( $circuit_img ) : ?>
    <img
      src="<?php echo esc_url( $circuit_img ); ?>"
      alt=""
      class="circuit-bg absolute inset-0 w-full h-full object-cover opacity-70 mix-blend-screen"
      loading="eager"
      decoding="async">
    <?php endif; ?>

    <!-- Subtle grid overlay -->
    <div class="hero-grid absolute inset-0"></div>

    <!-- Vignette mask -->
    <div class="hero-mask absolute inset-0"></div>

    <!-- Bottom fade to surface-container-low -->
    <div class="absolute bottom-0 left-0 right-0 h-[400px] bg-gradient-to-t from-[#0f141a] to-transparent"></div>
  </div>

  <!-- ── Ambient glows ── -->
  <div class="absolute inset-0 z-1 pointer-events-none" aria-hidden="true">
    <div class="absolute top-1/4 -left-20 w-[600px] h-[600px] bg-primary/10 blur-[130px] rounded-full hero-orb animate-float"></div>
    <div class="absolute bottom-1/4 -right-20 w-[700px] h-[700px] bg-secondary/6 blur-[160px] rounded-full animate-float-reverse"
         style="animation-delay:3s"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-primary/5 blur-[100px] rounded-full animate-drift"
         style="animation-delay:6s"></div>
  </div>

  <!-- ── Content ── -->
  <div class="container mx-auto px-8 relative z-10">
    <div class="max-w-6xl">

      <!-- Eyebrow -->
      <p class="font-label uppercase tracking-widest text-secondary text-sm mb-8"
         data-reveal="fade">
        <?php esc_html_e( 'Web Design & Development Agency', 'kinetic' ); ?>
      </p>

      <!-- Headline -->
      <h1 class="text-[7rem] md:text-[8.5rem] lg:text-[10rem] font-headline font-bold leading-[0.88] tracking-tighter text-on-surface mb-10"
          data-reveal>
        <?php echo esc_html( kinetic_get( 'hero_headline_1', 'We Build' ) ); ?><br>
        <?php echo esc_html( kinetic_get( 'hero_headline_2', 'the' ) ); ?>
        <span class="text-gradient">
          <?php echo esc_html( kinetic_get( 'hero_headline_gradient', 'Future' ) ); ?>
        </span><br>
        <?php echo esc_html( kinetic_get( 'hero_headline_3', 'of the Web' ) ); ?>
      </h1>

      <!-- Tagline -->
      <p class="text-xl md:text-2xl text-on-surface-variant font-body max-w-2xl mb-14 leading-relaxed"
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

    </div><!-- /.max-w-6xl -->
  </div><!-- /.container -->

  <!-- ── Decorative ring stack (desktop only) ── -->
  <div class="absolute right-[-8%] top-1/2 -translate-y-1/2 w-[38%] aspect-square hidden xl:block pointer-events-none z-10"
       aria-hidden="true">
    <div class="w-full h-full rounded-full border border-primary/15 ring-outer relative">
      <div class="absolute inset-4 rounded-full border border-secondary/8 ring-mid"></div>
      <div class="absolute inset-12 rounded-full border border-primary/5"></div>
      <?php if ( $hero_img ) : ?>
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
