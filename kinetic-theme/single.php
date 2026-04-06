<?php
/**
 * Single Post Template
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="max-w-3xl mx-auto px-8 py-24">
  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- Back link -->
    <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog' ) ); ?>"
       class="inline-flex items-center gap-2 text-on-surface-variant text-sm hover:text-primary transition-colors mb-12 font-label">
      <span class="material-symbols-outlined text-base" aria-hidden="true">arrow_back</span>
      <?php esc_html_e( 'All Posts', 'kinetic' ); ?>
    </a>

    <!-- Header -->
    <header class="mb-12" data-reveal>
      <div class="flex items-center gap-3 mb-6">
        <span class="text-secondary font-label uppercase tracking-widest text-xs">
          <?php echo esc_html( get_the_date() ); ?>
        </span>
        <?php $cats = get_the_category(); if ( $cats ) : ?>
        <span class="text-outline-variant">·</span>
        <span class="text-primary font-label text-xs"><?php echo esc_html( $cats[0]->name ); ?></span>
        <?php endif; ?>
      </div>

      <h1 class="text-4xl md:text-6xl font-headline font-bold tracking-tight leading-tight mb-6">
        <?php the_title(); ?>
      </h1>

      <?php if ( has_excerpt() ) : ?>
      <p class="text-on-surface-variant text-xl leading-relaxed">
        <?php the_excerpt(); ?>
      </p>
      <?php endif; ?>
    </header>

    <!-- Featured image -->
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="mb-12 rounded-[1.5rem] overflow-hidden aspect-video" data-reveal>
      <?php the_post_thumbnail( 'full', [ 'class' => 'w-full h-full object-cover' ] ); ?>
    </div>
    <?php endif; ?>

    <!-- Content -->
    <div class="prose prose-invert prose-lg max-w-none
                prose-headings:font-headline prose-headings:tracking-tight
                prose-a:text-primary prose-a:no-underline hover:prose-a:underline
                prose-blockquote:border-primary prose-blockquote:text-on-surface-variant
                prose-code:text-secondary prose-code:bg-surface-container-high prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded"
         data-reveal>
      <?php the_content(); ?>
    </div>

    <!-- Post navigation -->
    <nav class="mt-16 pt-8 border-t border-outline-variant/20 flex justify-between gap-8" aria-label="<?php esc_attr_e( 'Post navigation', 'kinetic' ); ?>">
      <?php
      $prev = get_previous_post();
      $next = get_next_post();
      ?>
      <?php if ( $prev ) : ?>
      <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>"
         class="flex-1 text-left group">
        <span class="text-on-surface-variant text-xs font-label uppercase tracking-widest flex items-center gap-1 mb-2 group-hover:text-primary transition-colors">
          <span class="material-symbols-outlined text-sm" aria-hidden="true">arrow_back</span>
          <?php esc_html_e( 'Previous', 'kinetic' ); ?>
        </span>
        <span class="font-headline font-bold text-lg hover:text-primary transition-colors line-clamp-2">
          <?php echo esc_html( get_the_title( $prev ) ); ?>
        </span>
      </a>
      <?php endif; ?>
      <?php if ( $next ) : ?>
      <a href="<?php echo esc_url( get_permalink( $next ) ); ?>"
         class="flex-1 text-right group">
        <span class="text-on-surface-variant text-xs font-label uppercase tracking-widest flex items-center justify-end gap-1 mb-2 group-hover:text-primary transition-colors">
          <?php esc_html_e( 'Next', 'kinetic' ); ?>
          <span class="material-symbols-outlined text-sm" aria-hidden="true">arrow_forward</span>
        </span>
        <span class="font-headline font-bold text-lg hover:text-primary transition-colors line-clamp-2">
          <?php echo esc_html( get_the_title( $next ) ); ?>
        </span>
      </a>
      <?php endif; ?>
    </nav>

  </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
