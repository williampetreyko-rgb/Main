<?php
/**
 * KINETIC Theme — Functions
 *
 * @package Kinetic
 */

defined( 'ABSPATH' ) || exit;

define( 'KINETIC_VERSION', '1.0.0' );
define( 'KINETIC_DIR',  get_template_directory() );
define( 'KINETIC_URI',  get_template_directory_uri() );

/* ============================================================
   THEME SETUP
   ============================================================ */
function kinetic_setup(): void {
	// Make theme available for translation
	load_theme_textdomain( 'kinetic', KINETIC_DIR . '/languages' );

	// WordPress core features
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	// Custom logo
	add_theme_support( 'custom-logo', [
		'height'      => 48,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	] );

	// Navigation menus
	register_nav_menus( [
		'primary'   => __( 'Primary Navigation', 'kinetic' ),
		'footer'    => __( 'Footer Navigation', 'kinetic' ),
	] );

	// Editor colour palette matching design tokens
	add_theme_support( 'editor-color-palette', [
		[ 'name' => __( 'Primary', 'kinetic' ),   'slug' => 'primary',   'color' => '#b89fff' ],
		[ 'name' => __( 'Secondary', 'kinetic' ), 'slug' => 'secondary', 'color' => '#00d2fd' ],
		[ 'name' => __( 'Surface', 'kinetic' ),   'slug' => 'surface',   'color' => '#0a0e14' ],
		[ 'name' => __( 'On Surface', 'kinetic' ),'slug' => 'on-surface','color' => '#f1f3fc' ],
	] );
}
add_action( 'after_setup_theme', 'kinetic_setup' );

/* ============================================================
   ENQUEUE SCRIPTS & STYLES
   ============================================================ */
function kinetic_enqueue_assets(): void {
	// Google Fonts
	wp_enqueue_style(
		'kinetic-fonts',
		'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Manrope:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap',
		[],
		null
	);

	// Material Symbols
	wp_enqueue_style(
		'material-symbols',
		'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
		[],
		null
	);

	// Tailwind CSS (CDN — swap for CLI build in production)
	wp_enqueue_script(
		'tailwindcss',
		'https://cdn.tailwindcss.com?plugins=forms,container-queries',
		[],
		null,
		false // load in <head> so config script runs after
	);

	// Tailwind config — inline after Tailwind loads
	wp_add_inline_script( 'tailwindcss', kinetic_tailwind_config(), 'after' );

	// Theme stylesheet
	wp_enqueue_style(
		'kinetic-style',
		KINETIC_URI . '/assets/css/kinetic.css',
		[ 'kinetic-fonts', 'material-symbols' ],
		KINETIC_VERSION
	);

	// Main JS (defer)
	wp_enqueue_script(
		'kinetic-main',
		KINETIC_URI . '/assets/js/kinetic.js',
		[],
		KINETIC_VERSION,
		true
	);

	// Pass data to JS
	wp_localize_script( 'kinetic-main', 'kineticData', [
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'kinetic_newsletter' ),
		'siteUrl' => get_site_url(),
	] );
}
add_action( 'wp_enqueue_scripts', 'kinetic_enqueue_assets' );

/**
 * Tailwind config as inline JS string.
 */
function kinetic_tailwind_config(): string {
	return <<<'JS'
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "on-surface-variant": "#a8abb3",
        "surface-container": "#151a21",
        "surface-variant": "#20262f",
        "on-secondary-fixed": "#003a47",
        "surface-container-high": "#1b2028",
        "outline": "#72757d",
        "primary-fixed": "#ac8eff",
        "on-primary": "#37008e",
        "error-container": "#9f0519",
        "inverse-primary": "#6d23f9",
        "secondary-fixed": "#79dfff",
        "on-primary-container": "#2a0070",
        "on-surface": "#f1f3fc",
        "on-error-container": "#ffa8a3",
        "tertiary": "#f5f2ff",
        "primary-container": "#ac8eff",
        "on-primary-fixed": "#000000",
        "surface-container-lowest": "#000000",
        "on-primary-fixed-variant": "#350088",
        "inverse-on-surface": "#51555c",
        "error": "#ff716c",
        "secondary-fixed-dim": "#1cd5ff",
        "secondary": "#00d2fd",
        "surface-dim": "#0a0e14",
        "secondary-dim": "#00c3eb",
        "on-secondary-container": "#eefaff",
        "secondary-container": "#00677e",
        "primary": "#b89fff",
        "primary-fixed-dim": "#a07dff",
        "outline-variant": "#44484f",
        "on-error": "#490006",
        "on-secondary": "#004352",
        "background": "#0a0e14",
        "on-background": "#f1f3fc",
        "surface": "#0a0e14",
        "primary-dim": "#834fff",
        "surface-container-low": "#0f141a",
        "surface-container-highest": "#20262f",
        "surface-tint": "#b89fff",
        "surface-bright": "#262c36",
        "inverse-surface": "#f8f9ff",
        "error-dim": "#d7383b"
      },
      borderRadius: {
        DEFAULT: "0.125rem",
        lg: "0.25rem",
        xl: "0.5rem",
        full: "0.75rem"
      },
      fontFamily: {
        headline: ["Space Grotesk"],
        body: ["Manrope"],
        label: ["Inter"]
      },
      keyframes: {
        float: {
          "0%, 100%": { transform: "translateY(0px)" },
          "50%":       { transform: "translateY(-20px)" }
        },
        "float-reverse": {
          "0%, 100%": { transform: "translateY(0px)" },
          "50%":       { transform: "translateY(20px)" }
        },
        drift: {
          "0%, 100%": { transform: "translate(0px, 0px)" },
          "33%":       { transform: "translate(30px, -15px)" },
          "66%":       { transform: "translate(-20px, 10px)" }
        },
        "hero-wave": {
          "0%, 100%": { backgroundPosition: "0% 50%" },
          "50%":       { backgroundPosition: "100% 50%" }
        },
        "glow-pulse": {
          "0%, 100%": { opacity: "0.5" },
          "50%":       { opacity: "1" }
        }
      },
      animation: {
        float:          "float 6s ease-in-out infinite",
        "float-reverse":"float-reverse 8s ease-in-out infinite",
        drift:          "drift 12s ease-in-out infinite",
        "hero-wave":    "hero-wave 8s ease-in-out infinite",
        "glow-pulse":   "glow-pulse 3s ease-in-out infinite"
      }
    }
  }
};
JS;
}

/* ============================================================
   WIDGETS / SIDEBARS
   ============================================================ */
function kinetic_register_sidebars(): void {
	register_sidebar( [
		'name'          => __( 'Footer Widget Area', 'kinetic' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Widgets shown in the footer columns.', 'kinetic' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget__title">',
		'after_title'   => '</h4>',
	] );
}
add_action( 'widgets_init', 'kinetic_register_sidebars' );

/* ============================================================
   NEWSLETTER AJAX HANDLER
   ============================================================ */

// Logged-in users
add_action( 'wp_ajax_kinetic_newsletter_subscribe',        'kinetic_newsletter_subscribe' );
// Guests
add_action( 'wp_ajax_nopriv_kinetic_newsletter_subscribe', 'kinetic_newsletter_subscribe' );

function kinetic_newsletter_subscribe(): void {
	check_ajax_referer( 'kinetic_newsletter', 'nonce' );

	$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );

	if ( ! is_email( $email ) ) {
		wp_send_json_error( __( 'Please enter a valid email address.', 'kinetic' ) );
	}

	/**
	 * Store subscriber in a custom DB option list (simple MVP).
	 * Replace this block with a Resend / Mailchimp API call when ready.
	 */
	$subscribers = get_option( 'kinetic_newsletter_subscribers', [] );

	if ( in_array( $email, $subscribers, true ) ) {
		wp_send_json_success( __( 'Already subscribed!', 'kinetic' ) );
	}

	$subscribers[] = $email;
	update_option( 'kinetic_newsletter_subscribers', $subscribers, false );

	/**
	 * Hook for third-party integrations:
	 *   do_action( 'kinetic_newsletter_new_subscriber', $email );
	 */
	do_action( 'kinetic_newsletter_new_subscriber', $email );

	wp_send_json_success( __( 'Subscribed!', 'kinetic' ) );
}

/* ============================================================
   CUSTOMIZER SETTINGS
   ============================================================ */
require_once KINETIC_DIR . '/inc/customizer.php';

/* ============================================================
   CLEAN UP <head>
   ============================================================ */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
