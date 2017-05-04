<?php
/**
 * Enviroinfo.eu 2017 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Enviroinfo.eu_2017
 */
/**
 * Store the theme's directory path and uri in constants
 */
define('THEME_DIR_PATH', get_template_directory());
define('THEME_DIR_URI', get_template_directory_uri());

if ( ! function_exists( 'enviro2017_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function enviro2017_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Enviroinfo.eu 2017, use a find and replace
         * to change 'enviro2017' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'enviro2017', THEME_DIR_PATH . '/languages' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'enviro2017' ),
            'footer' => esc_html__( 'Footer', 'enviro2017' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form'
        ) );

    }
endif;
add_action( 'after_setup_theme', 'enviro2017_setup' );



/**
 * Enqueue scripts and styles.
 */
function enviro2017_scripts() {

    wp_enqueue_style( 'enviro2017-font',  THEME_DIR_URI . '/fonts/liberationsans.css' );

    wp_enqueue_style( 'enviro2017-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

	wp_enqueue_style( 'enviro2017-style', get_stylesheet_uri() );

    wp_enqueue_script('enviro2017-bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery') );

    wp_enqueue_script( 'enviro2017-particles',THEME_DIR_URI . '/js/particles.min.js', array('jquery'), null, true );
    wp_localize_script( 'enviro2017-particles', 'ParticlesConfigURL', THEME_DIR_URI . '/js/particlesjs-config.json' );

	wp_enqueue_script( 'enviro2017-app', THEME_DIR_URI . '/js/app.js', array('jquery', 'enviro2017-particles'), '20170426', true );

}
add_action( 'wp_enqueue_scripts', 'enviro2017_scripts' );


require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/customize-wp.php';

require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

require get_template_directory() . '/inc/custom-post-types.php';


