<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-surface text-on-surface' ); ?>>
<?php wp_body_open(); ?>

<!-- ============================================================
     TOP NAV BAR
     ============================================================ -->
<nav id="site-header"
     class="sticky top-0 w-full z-50 bg-surface/60 backdrop-blur-xl shadow-[0_20px_40px_rgba(184,159,255,0.06)]"
     aria-label="<?php esc_attr_e( 'Primary navigation', 'kinetic' ); ?>">

  <div class="flex justify-between items-center px-6 md:px-8 py-4 max-w-screen-2xl mx-auto">

    <!-- Logo / Brand -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
       class="text-2xl font-bold tracking-tighter text-on-surface font-headline"
       rel="home">
      <?php
      if ( has_custom_logo() ) :
        the_custom_logo();
      else :
        echo esc_html( kinetic_get( 'footer_brand_name', get_bloginfo( 'name' ) ) );
      endif;
      ?>
    </a>

    <!-- Desktop nav links -->
    <div class="hidden md:flex items-center space-x-10 font-headline tracking-tight">
      <?php
      wp_nav_menu( [
        'theme_location'  => 'primary',
        'container'       => false,
        'menu_class'      => 'flex items-center space-x-10',
        'fallback_cb'     => 'kinetic_default_nav',
        'link_before'     => '',
        'link_after'      => '',
        'depth'           => 1,
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
        'walker'          => new Kinetic_Nav_Walker(),
      ] );
      ?>
    </div>

    <!-- CTA button -->
    <div class="flex items-center gap-4">
      <button class="btn-primary text-on-primary font-bold px-8 py-3 text-sm font-headline hidden md:inline-flex">
        <?php esc_html_e( 'Get Started', 'kinetic' ); ?>
      </button>

      <!-- Hamburger (mobile) -->
      <button id="mobile-menu-btn"
              class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg bg-surface-variant/40 text-on-surface"
              aria-controls="mobile-menu"
              aria-expanded="false"
              aria-label="<?php esc_attr_e( 'Toggle menu', 'kinetic' ); ?>">
        <span class="material-symbols-outlined icon-open">menu</span>
        <span class="material-symbols-outlined icon-close" style="display:none">close</span>
      </button>
    </div>
  </div>

  <!-- Mobile dropdown menu -->
  <div id="mobile-menu"
       class="md:hidden px-6 pb-6 bg-surface-container-low border-t border-outline-variant/10">
    <?php
    wp_nav_menu( [
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'flex flex-col space-y-4 pt-4',
      'fallback_cb'    => 'kinetic_default_nav_mobile',
      'depth'          => 1,
      'walker'         => new Kinetic_Nav_Walker( true ),
    ] );
    ?>
    <button class="btn-primary mt-4 w-full justify-center text-on-primary font-bold px-8 py-3 text-sm font-headline">
      <?php esc_html_e( 'Get Started', 'kinetic' ); ?>
    </button>
  </div>
</nav>
<?php
/* ---- Fallback nav (no menu assigned) ---- */
if ( ! function_exists( 'kinetic_default_nav' ) ) :
function kinetic_default_nav(): void {
  echo '<ul class="flex items-center space-x-10">';
  foreach ( [ 'Services' => '#services', 'Work' => '#work', 'Testimonials' => '#testimonials' ] as $label => $href ) {
    printf( '<li><a href="%s" class="nav-link">%s</a></li>', esc_url( $href ), esc_html( $label ) );
  }
  echo '</ul>';
}
endif;
if ( ! function_exists( 'kinetic_default_nav_mobile' ) ) :
function kinetic_default_nav_mobile(): void {
  echo '<ul class="flex flex-col space-y-4 pt-4">';
  foreach ( [ 'Services' => '#services', 'Work' => '#work', 'Testimonials' => '#testimonials' ] as $label => $href ) {
    printf( '<li><a href="%s" class="nav-link text-base">%s</a></li>', esc_url( $href ), esc_html( $label ) );
  }
  echo '</ul>';
}
endif;
?>
<?php
/**
 * Minimal custom nav walker — applies nav-link classes.
 */
if ( ! class_exists( 'Kinetic_Nav_Walker' ) ) :
class Kinetic_Nav_Walker extends Walker_Nav_Menu {
  private bool $mobile;
  public function __construct( bool $mobile = false ) { $this->mobile = $mobile; }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ): void {
    $url     = $item->url ?? '#';
    $title   = apply_filters( 'the_title', $item->title, $item->ID );
    $classes = $this->mobile ? 'nav-link text-base' : 'nav-link';
    $output .= sprintf(
      '<li><a href="%s" class="%s">%s</a></li>',
      esc_url( $url ),
      esc_attr( $classes ),
      esc_html( $title )
    );
  }
}
endif;
?>
