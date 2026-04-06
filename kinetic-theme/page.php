<?php
/**
 * Generic Page Template
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="max-w-3xl mx-auto px-8 py-24">
  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="text-4xl md:text-6xl font-headline font-bold tracking-tight mb-12" data-reveal>
      <?php the_title(); ?>
    </h1>

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="mb-12 rounded-[1.5rem] overflow-hidden aspect-video" data-reveal>
      <?php the_post_thumbnail( 'full', [ 'class' => 'w-full h-full object-cover' ] ); ?>
    </div>
    <?php endif; ?>

    <div class="prose prose-invert prose-lg max-w-none
                prose-headings:font-headline prose-headings:tracking-tight
                prose-a:text-primary prose-a:no-underline hover:prose-a:underline
                prose-blockquote:border-primary prose-blockquote:text-on-surface-variant
                prose-code:text-secondary prose-code:bg-surface-container-high prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded"
         data-reveal>
      <?php the_content(); ?>
    </div>
  </article>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
