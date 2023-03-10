<?php

/**
* hugs_for_bugs functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package hugs_for_bugs
*/

if ( ! function_exists( 'hugs_for_bugs_setup' ) ) :

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/

    function hugs_for_bugs_setup() {

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
	    add_theme_support( 'title-tag' );

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */

	    add_theme_support( 'post-thumbnails' );

    	// This theme uses wp_nav_menu() in one location.

    	register_nav_menus( array(
    		'primary' => esc_html__( 'Primary', 'hugs_for_bugs' ),
    		'footer' => esc_html__( 'Footer', 'hugs_for_bugs' )
    	));
    }

endif;

add_action( 'after_setup_theme', 'hugs_for_bugs_setup' );

/**
* Enqueue scripts and styles.
*/

function hugs_for_bugs_scripts() {
	wp_enqueue_style( 'hugs_for_bugs-style', get_stylesheet_uri() );
  wp_enqueue_style( 'hugs_for_bugs-main-style', get_template_directory_uri() . '/assets/dist/style.css', array(), null );
  wp_enqueue_style( 'hugs_for_bugs-tailwind-style', get_template_directory_uri() . '/assets/dist/tailwind.css', array(), null );
  
	wp_enqueue_script( 'hugs_for_bugs-main-js', get_template_directory_uri() . '/assets/js/index.js', array(), null, true );
}

add_action( 'wp_enqueue_scripts', 'hugs_for_bugs_scripts' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}