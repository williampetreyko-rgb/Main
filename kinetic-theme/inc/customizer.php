<?php
/**
 * KINETIC Theme — Customizer Settings
 *
 * @package Kinetic
 */

defined( 'ABSPATH' ) || exit;

function kinetic_customizer_register( WP_Customize_Manager $wp_customize ): void {

	/* ---- Panel: Hero ---- */
	$wp_customize->add_panel( 'kinetic_hero', [
		'title'    => __( 'Hero Section', 'kinetic' ),
		'priority' => 30,
	] );

	$wp_customize->add_section( 'kinetic_hero_content', [
		'title'    => __( 'Hero Content', 'kinetic' ),
		'panel'    => 'kinetic_hero',
		'priority' => 10,
	] );

	kinetic_add_text_setting( $wp_customize, 'hero_headline_1',
		__( 'We Build the', 'kinetic' ),
		'kinetic_hero_content', 'heading' );

	kinetic_add_text_setting( $wp_customize, 'hero_headline_gradient',
		__( 'Future', 'kinetic' ),
		'kinetic_hero_content', 'heading' );

	kinetic_add_text_setting( $wp_customize, 'hero_headline_2',
		__( 'of the Web', 'kinetic' ),
		'kinetic_hero_content', 'heading' );

	kinetic_add_textarea_setting( $wp_customize, 'hero_tagline',
		__( 'KineticSEO combines high-fidelity design with technical mastery to create immersive digital experiences that define the new standard.', 'kinetic' ),
		'kinetic_hero_content' );

	kinetic_add_text_setting( $wp_customize, 'hero_cta_primary',
		__( 'Start Your Project', 'kinetic' ),
		'kinetic_hero_content' );

	kinetic_add_text_setting( $wp_customize, 'hero_cta_secondary',
		__( 'View Showreel', 'kinetic' ),
		'kinetic_hero_content' );

	/* ---- Panel: Features ---- */
	$wp_customize->add_panel( 'kinetic_features', [
		'title'    => __( 'Features Section', 'kinetic' ),
		'priority' => 40,
	] );

	$wp_customize->add_section( 'kinetic_features_content', [
		'title'    => __( 'Features Content', 'kinetic' ),
		'panel'    => 'kinetic_features',
		'priority' => 10,
	] );

	kinetic_add_text_setting( $wp_customize, 'features_headline',
		__( 'Engineered for Excellence', 'kinetic' ),
		'kinetic_features_content', 'heading' );

	kinetic_add_textarea_setting( $wp_customize, 'features_tagline',
		__( "We don't just build websites; we craft digital ecosystems that outperform the competition on every measurable scale.", 'kinetic' ),
		'kinetic_features_content' );

	/* ---- Panel: Newsletter ---- */
	$wp_customize->add_section( 'kinetic_newsletter', [
		'title'    => __( 'Newsletter Section', 'kinetic' ),
		'priority' => 50,
	] );

	kinetic_add_text_setting( $wp_customize, 'newsletter_headline',
		__( 'Stay in the Loop', 'kinetic' ),
		'kinetic_newsletter', 'heading' );

	kinetic_add_textarea_setting( $wp_customize, 'newsletter_tagline',
		__( "Get curated insights on web trends, technological innovations, and KineticSEO's latest experiments delivered to your inbox.", 'kinetic' ),
		'kinetic_newsletter' );

	/* ---- Footer ---- */
	$wp_customize->add_section( 'kinetic_footer', [
		'title'    => __( 'Footer', 'kinetic' ),
		'priority' => 60,
	] );

	kinetic_add_text_setting( $wp_customize, 'footer_brand_name',
		__( 'KineticSEO', 'kinetic' ),
		'kinetic_footer' );

	kinetic_add_textarea_setting( $wp_customize, 'footer_tagline',
		__( 'Engineering the future of digital presence through technical precision and visionary design.', 'kinetic' ),
		'kinetic_footer' );

	kinetic_add_text_setting( $wp_customize, 'footer_copyright',
		__( '© 2024 KineticSEO Agency.', 'kinetic' ),
		'kinetic_footer' );
}
add_action( 'customize_register', 'kinetic_customizer_register' );

/* ---- Helpers ---- */

function kinetic_add_text_setting(
	WP_Customize_Manager $wpc,
	string $id,
	string $default,
	string $section,
	string $type = 'text'
): void {
	$wpc->add_setting( "kinetic_{$id}", [
		'default'           => $default,
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	] );
	$wpc->add_control( "kinetic_{$id}", [
		'label'   => ucwords( str_replace( '_', ' ', $id ) ),
		'section' => $section,
		'type'    => $type,
	] );
}

function kinetic_add_textarea_setting(
	WP_Customize_Manager $wpc,
	string $id,
	string $default,
	string $section
): void {
	$wpc->add_setting( "kinetic_{$id}", [
		'default'           => $default,
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'postMessage',
	] );
	$wpc->add_control( "kinetic_{$id}", [
		'label'   => ucwords( str_replace( '_', ' ', $id ) ),
		'section' => $section,
		'type'    => 'textarea',
	] );
}

/**
 * Tiny helper used in templates to get a customizer value.
 */
function kinetic_get( string $key, string $fallback = '' ): string {
	return esc_html( get_theme_mod( "kinetic_{$key}", $fallback ) );
}
