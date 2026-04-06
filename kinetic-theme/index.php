<?php
/**
 * Blog Index / Fallback Template
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="max-w-screen-xl mx-auto px-8 py-24">

  <h1 class="text-5xl font-headline font-bold tracking-tight mb-16" data-reveal>
    <?php
    if ( is_home() && ! is_front_page() ) :
      single_post_title();
    else :
      esc_html_e( 'Latest Posts', 'kinetic' );
    endif;
    ?>
  </h1>

  <?php if ( have_posts() ) : ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-stagger>
      <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'bento-card p-8 flex flex-col gap-4' ); ?>>
        <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-xl aspect-video">
          <?php the_post_thumbnail( 'medium_large', [ 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-500' ] ); ?>
        </a>
        <?php endif; ?>

        <div class="flex-1 flex flex-col gap-3">
          <span class="text-secondary font-label uppercase tracking-widest text-xs">
            <?php echo esc_html( get_the_date() ); ?>
          </span>
          <h2 class="text-2xl font-headline font-bold">
            <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors">
              <?php the_title(); ?>
            </a>
          </h2>
          <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">
            <?php the_excerpt(); ?>
          </p>
        </div>

        <a href="<?php the_permalink(); ?>"
           class="text-primary flex items-center gap-2 font-bold text-sm hover:underline mt-2 self-start">
          <?php esc_html_e( 'Read More', 'kinetic' ); ?>
          <span class="material-symbols-outlined text-base" aria-hidden="true">arrow_forward</span>
        </a>
      </article>
      <?php endwhile; ?>
    </div>

    <?php the_posts_pagination( [
      'prev_text' => '<span class="material-symbols-outlined">arrow_back</span>',
      'next_text' => '<span class="material-symbols-outlined">arrow_forward</span>',
      'class'     => 'mt-16 flex gap-4 justify-center',
    ] ); ?>

  <?php else : ?>
    <p class="text-on-surface-variant text-lg">
      <?php esc_html_e( 'No posts found.', 'kinetic' ); ?>
    </p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
