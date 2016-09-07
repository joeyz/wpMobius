<?php
if ( ! function_exists( 'mobius_setup' ) ) :

function mobius_setup(){
      /*
    * Make theme available for translation.
    * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
    */
   load_theme_textdomain( 'mobius' );

   /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
   add_theme_support( 'title-tag' );

   // This theme uses wp_nav_menu() in two locations.
   register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'mobius' ),
      'social'  => __( 'Social Links Menu', 'mobius' ),
   ) );

   /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
   add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
   ) );

/*
* This theme styles the visual editor to resemble the theme style,
* specifically font, colors, icons, and column width.
*/
   add_editor_style( array( 'css/editor-style.css', mobius_fonts_url() ) );
}
endif;
add_action( 'after_setup_theme', 'mobius_setup' );


if ( ! function_exists( 'mobius_fonts_url' ) ) :
/**
 * Register Google fonts for Mobius.
 *
 */
function twentysixteen_fonts_url() {
   $fonts_url = '';
   $fonts     = array();
   $subsets   = 'latin,latin-ext';
   /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
   if ( 'off' !== _x( 'on', 'Roboto+Slab font: on or off', 'mobius' ) ) {
      $fonts[] = 'Roboto+Slab:400,700';
   }

   if ( $fonts ) {
      $fonts_url = add_query_arg( array(
         'family' => urlencode( implode( '|', $fonts ) ),
         'subset' => urlencode( $subsets ),
      ), 'https://fonts.googleapis.com/css' );
   }
   return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function mobius_javascript_detection() {
   echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'mobius_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 */
function mobius_scripts() {
   // Add custom fonts, used in the main stylesheet.
   wp_enqueue_style( 'mobius-fonts', mobius_fonts_url(), array(), null );

   // Add Font Awesome, used in the main stylesheet.
   wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3' );
   // Theme stylesheet.
   wp_enqueue_style( 'mobius-style', get_stylesheet_uri() );
   // Load the Bootstrap stylesheet.
   wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap-min.css', array( 'mobius-style' ), '3.3.7' );

   // Load Bootstrap js
   wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
   // Load MatchHeight script
   wp_enqueue_script( 'matchHeight-script', get_template_directory_uri() . '/js/jquery.matchHeight.js', array( 'jquery' ), '0.7.0', true );
   // Load the flexaible vertical  centering script
   wp_enqueue_script( 'flexVertCenter-script', get_template_directory_uri() . '/js/jquery.flexverticalcenter.js', array( 'jquery' ), '1.0.0', true );
   // Load theme script file
   wp_enqueue_script( 'mobius-script', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'mobius_scripts' );

/**
 * Custom INC files we might want to parse when we load the theme.
 */
//require get_template_directory() . '/inc/some-include-file.php';