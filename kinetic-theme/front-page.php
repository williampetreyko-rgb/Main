<?php
/**
 * Front Page Template
 * Used when "Your homepage displays: A static page" is set in Settings → Reading,
 * or when a page is set as the front page. Also auto-used as the home page.
 *
 * @package Kinetic
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php get_template_part( 'template-parts/sections/hero' ); ?>
<?php get_template_part( 'template-parts/sections/features' ); ?>
<?php get_template_part( 'template-parts/sections/testimonials' ); ?>
<?php get_template_part( 'template-parts/sections/newsletter' ); ?>

<?php get_footer(); ?>
