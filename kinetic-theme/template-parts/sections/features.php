<?php
/**
 * Features / Bento Grid Section
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- ============================================================
     FEATURES — BENTO GRID
     ============================================================ -->
<section id="services" class="py-32 px-8 bg-surface-container-low relative noise-texture">
  <div class="max-w-screen-2xl mx-auto">

    <!-- Section header -->
    <div class="flex justify-between items-end mb-20 gap-8">
      <div class="max-w-2xl" data-reveal>
        <h2 class="text-5xl font-headline font-bold tracking-tight mb-6">
          <?php echo esc_html( kinetic_get( 'features_headline', 'Engineered for Excellence' ) ); ?>
        </h2>
        <p class="text-on-surface-variant text-lg leading-relaxed">
          <?php echo esc_html( kinetic_get( 'features_tagline', "We don't just build websites; we craft digital ecosystems that outperform the competition on every measurable scale." ) ); ?>
        </p>
      </div>
      <div class="hidden lg:block text-right" aria-hidden="true">
        <span class="text-8xl font-headline font-black opacity-5">TECH</span>
      </div>
    </div>

    <!-- Bento grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-stagger>

      <!-- Card 1: Custom Design (wide) -->
      <div class="md:col-span-2 bento-card group relative overflow-hidden p-10 md:p-12">
        <div class="absolute top-0 right-0 p-8" aria-hidden="true">
          <span class="material-symbols-outlined text-primary text-6xl card-icon">palette</span>
        </div>
        <div class="relative z-10 max-w-md">
          <span class="text-secondary font-label uppercase tracking-widest text-sm mb-4 block">
            <?php esc_html_e( 'Visual Authority', 'kinetic' ); ?>
          </span>
          <h3 class="text-4xl font-headline font-bold mb-6">
            <?php esc_html_e( 'Custom Design', 'kinetic' ); ?>
          </h3>
          <p class="text-on-surface-variant text-lg leading-relaxed mb-8">
            <?php esc_html_e( 'Unique, asymmetric layouts and immersive visual storytelling tailored specifically to your brand identity. We reject templates.', 'kinetic' ); ?>
          </p>
          <div class="flex flex-wrap gap-4">
            <span class="bg-surface-variant px-4 py-2 rounded-full text-xs font-label">UI/UX Strategy</span>
            <span class="bg-surface-variant px-4 py-2 rounded-full text-xs font-label">Art Direction</span>
          </div>
        </div>
        <!-- Background texture image -->
        <div class="absolute bottom-0 right-0 w-1/2 h-full card-bg-img pointer-events-none" aria-hidden="true">
          <img
            src="<?php echo esc_url( KINETIC_URI . '/assets/images/circuit-bg.jpg' ); ?>"
            alt=""
            class="w-full h-full object-cover"
            loading="lazy"
            decoding="async">
        </div>
      </div>

      <!-- Card 2: High Performance -->
      <div class="bento-card p-10 md:p-12 flex flex-col justify-between">
        <div>
          <span class="material-symbols-outlined text-secondary text-5xl mb-8 block card-icon">bolt</span>
          <h3 class="text-3xl font-headline font-bold mb-4">
            <?php esc_html_e( 'High Performance', 'kinetic' ); ?>
          </h3>
          <p class="text-on-surface-variant leading-relaxed">
            <?php esc_html_e( 'Lightning-fast load times and optimised Core Web Vitals for a flawless user experience.', 'kinetic' ); ?>
          </p>
        </div>
        <div class="mt-8 pt-8 border-t border-outline-variant/10">
          <div class="flex items-end gap-2">
            <span class="text-4xl font-headline font-bold text-secondary">99</span>
            <span class="text-on-surface-variant text-sm font-label uppercase tracking-tighter mb-1">PageSpeed Score</span>
          </div>
        </div>
      </div>

      <!-- Card 3: SEO Mastery -->
      <div class="md:col-span-1 bento-card p-10 md:p-12 flex flex-col justify-between">
        <div>
          <span class="material-symbols-outlined text-primary text-5xl mb-8 block card-icon">troubleshoot</span>
          <h3 class="text-3xl font-headline font-bold mb-4">
            <?php esc_html_e( 'SEO Mastery', 'kinetic' ); ?>
          </h3>
          <p class="text-on-surface-variant leading-relaxed">
            <?php esc_html_e( 'Built from the ground up to rank. Strategic technical SEO integrated into the architecture.', 'kinetic' ); ?>
          </p>
        </div>
        <div class="mt-8">
          <a class="text-primary flex items-center gap-2 font-bold hover:underline" href="#">
            <?php esc_html_e( 'Read Strategy', 'kinetic' ); ?>
            <span class="material-symbols-outlined" aria-hidden="true">north_east</span>
          </a>
        </div>
      </div>

      <!-- Card 4: 3D / WebGL (wide, gradient border) -->
      <div class="md:col-span-2 relative p-[1px] rounded-[2rem] overflow-hidden">
        <div class="absolute inset-0 signature-gradient opacity-30 rounded-[2rem]" aria-hidden="true"></div>
        <div class="relative bg-surface-container-high rounded-[2rem] p-10 md:p-12 h-full flex flex-col md:flex-row items-center gap-10 overflow-hidden bento-card"
             style="border-radius:inherit">
          <div class="flex-1">
            <h3 class="text-4xl font-headline font-bold mb-4">
              <?php esc_html_e( 'Immersive 3D Experiences', 'kinetic' ); ?>
            </h3>
            <p class="text-on-surface-variant text-lg">
              <?php esc_html_e( 'Pushing boundaries with WebGL and interactive spatial environments that captivate users.', 'kinetic' ); ?>
            </p>
          </div>
          <div class="w-full md:w-64 h-48 bg-surface-variant rounded-xl overflow-hidden glass-panel border border-outline-variant/10 shadow-2xl flex-shrink-0">
            <?php
            $webgl_img = get_theme_mod( 'kinetic_webgl_image', '' );
            if ( $webgl_img ) :
            ?>
            <img
              src="<?php echo esc_url( $webgl_img ); ?>"
              alt="<?php esc_attr_e( 'Abstract digital 3D visualization', 'kinetic' ); ?>"
              class="w-full h-full object-cover"
              loading="lazy"
              decoding="async">
            <?php else : ?>
            <div class="w-full h-full signature-gradient opacity-30"></div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div><!-- /.grid -->
  </div><!-- /.max-w-screen-2xl -->
</section>
