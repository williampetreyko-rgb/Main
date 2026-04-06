<?php
/**
 * Testimonials Section
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;

/**
 * Pull testimonials from a CPT "kinetic_testimonial" if it exists,
 * otherwise fall back to hard-coded defaults.
 */
$testimonials = [];

if ( post_type_exists( 'kinetic_testimonial' ) ) {
	$query = new WP_Query( [
		'post_type'      => 'kinetic_testimonial',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'no_found_rows'  => true,
	] );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$testimonials[] = [
				'quote'    => get_the_content(),
				'name'     => get_the_title(),
				'role'     => get_post_meta( get_the_ID(), '_testimonial_role', true ),
				'company'  => get_post_meta( get_the_ID(), '_testimonial_company', true ),
				'avatar'   => get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ),
				'border'   => get_post_meta( get_the_ID(), '_testimonial_border_color', true ) ?: 'primary',
			];
		}
		wp_reset_postdata();
	}
}

// Default fallback content
if ( empty( $testimonials ) ) {
	$testimonials = [
		[
			'quote'   => '"KineticSEO didn\'t just build us a website; they constructed a digital storefront that increased our conversions by 300% in the first quarter."',
			'name'    => 'Marcus Chen',
			'role'    => 'CEO',
			'company' => 'Visionary Lab',
			'avatar'  => '',
			'border'  => 'primary',
		],
		[
			'quote'   => '"The technical precision is unmatched. Our platform handles 10x the traffic with zero latency. It\'s truly high-performance engineering."',
			'name'    => 'Elena Rodriguez',
			'role'    => 'CTO',
			'company' => 'NextStream',
			'avatar'  => '',
			'border'  => 'secondary',
		],
		[
			'quote'   => '"In an era of generic templates, KineticSEO provides an editorial tech feel that makes our luxury brand stand out in a crowded market."',
			'name'    => 'Jameson Wright',
			'role'    => 'Founder',
			'company' => 'Wright & Co.',
			'avatar'  => '',
			'border'  => 'primary',
		],
	];
}
?>
<!-- ============================================================
     TESTIMONIALS
     ============================================================ -->
<section id="testimonials" class="py-32 bg-surface">
  <div class="max-w-screen-2xl mx-auto px-8">

    <h2 class="text-5xl font-headline font-bold tracking-tight mb-20 text-center" data-reveal>
      <?php esc_html_e( 'Validated by Leaders', 'kinetic' ); ?>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" data-stagger>
      <?php foreach ( $testimonials as $t ) :
        $border_class = ( $t['border'] === 'secondary' ) ? 'border-secondary' : 'border-primary';
        $quote_class  = ( $t['border'] === 'secondary' ) ? 'text-secondary/10' : 'text-primary/10';
        $role_label   = trim( $t['role'] . ( ! empty( $t['company'] ) ? ', ' . $t['company'] : '' ) );
      ?>
      <article class="testimonial-card border-l-4 <?php echo esc_attr( $border_class ); ?> p-10 relative">

        <!-- Decorative quote mark -->
        <span class="absolute -top-6 -right-6 text-9xl font-headline <?php echo esc_attr( $quote_class ); ?> select-none leading-none"
              aria-hidden="true">"</span>

        <blockquote class="text-xl text-on-surface leading-relaxed mb-8 italic font-light">
          <?php echo wp_kses_post( $t['quote'] ); ?>
        </blockquote>

        <footer class="flex items-center gap-4">
          <div class="w-14 h-14 rounded-full bg-surface-variant overflow-hidden flex-shrink-0">
            <?php if ( ! empty( $t['avatar'] ) ) : ?>
            <img
              src="<?php echo esc_url( $t['avatar'] ); ?>"
              alt="<?php echo esc_attr( $t['name'] ); ?>"
              class="w-full h-full object-cover"
              loading="lazy"
              decoding="async"
              width="56"
              height="56">
            <?php else : ?>
            <div class="w-full h-full signature-gradient flex items-center justify-center text-lg font-bold text-white">
              <?php echo esc_html( mb_substr( $t['name'], 0, 1 ) ); ?>
            </div>
            <?php endif; ?>
          </div>
          <div>
            <p class="font-bold font-headline"><?php echo esc_html( $t['name'] ); ?></p>
            <p class="text-sm text-secondary font-label uppercase tracking-widest"><?php echo esc_html( $role_label ); ?></p>
          </div>
        </footer>

      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>
