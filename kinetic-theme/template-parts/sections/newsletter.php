<?php
/**
 * Newsletter / Stay in the Loop Section
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- ============================================================
     NEWSLETTER
     ============================================================ -->
<section class="py-24 px-8 relative" id="newsletter">
  <div class="max-w-5xl mx-auto bg-surface-container-high rounded-[3rem] p-12 md:p-16 lg:p-24 text-center relative overflow-hidden"
       data-reveal>

    <!-- Gradient wash -->
    <div class="absolute inset-0 signature-gradient opacity-5 pointer-events-none" aria-hidden="true"></div>

    <div class="relative z-10">
      <h2 class="text-4xl md:text-6xl font-headline font-bold mb-6">
        <?php echo esc_html( kinetic_get( 'newsletter_headline', 'Stay in the Loop' ) ); ?>
      </h2>
      <p class="text-on-surface-variant text-lg max-w-xl mx-auto mb-12">
        <?php echo esc_html( kinetic_get( 'newsletter_tagline', "Get curated insights on web trends, technological innovations, and KineticSEO's latest experiments delivered to your inbox." ) ); ?>
      </p>

      <!-- Form -->
      <form id="newsletter-form"
            class="flex flex-col md:flex-row gap-4 max-w-2xl mx-auto"
            novalidate>
        <?php wp_nonce_field( 'kinetic_newsletter_form', '_wpnonce', false ); ?>
        <label for="newsletter-email" class="sr-only">
          <?php esc_html_e( 'Your email address', 'kinetic' ); ?>
        </label>
        <input
          id="newsletter-email"
          class="newsletter-input flex-1 px-8 py-5"
          type="email"
          name="email"
          placeholder="<?php esc_attr_e( 'Enter your email', 'kinetic' ); ?>"
          required
          autocomplete="email">
        <button
          type="submit"
          class="btn-primary text-on-primary font-bold px-10 py-5 font-headline">
          <?php esc_html_e( 'Subscribe', 'kinetic' ); ?>
        </button>
      </form>

      <p class="mt-6 text-xs text-on-surface-variant font-label">
        <?php esc_html_e( 'No spam. Unsubscribe at any time.', 'kinetic' ); ?>
      </p>
    </div>

  </div>
</section>
