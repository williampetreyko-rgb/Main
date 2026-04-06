<?php
/**
 * 404 Template
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="min-h-[80vh] flex items-center justify-center px-8">
  <div class="text-center max-w-2xl" data-reveal>

    <!-- Big 404 -->
    <p class="text-[12rem] font-headline font-black leading-none text-gradient opacity-60 select-none mb-0"
       aria-hidden="true">404</p>

    <h1 class="text-4xl md:text-5xl font-headline font-bold tracking-tight mt-6 mb-6">
      <?php esc_html_e( 'Page Not Found', 'kinetic' ); ?>
    </h1>

    <p class="text-on-surface-variant text-lg mb-12">
      <?php esc_html_e( "The page you're looking for doesn't exist or has been moved.", 'kinetic' ); ?>
    </p>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
       class="btn-primary text-on-primary text-lg font-bold px-10 py-4 font-headline inline-flex">
      <span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
      <?php esc_html_e( 'Back to Home', 'kinetic' ); ?>
    </a>

  </div>
</main>

<?php get_footer(); ?>
