<?php
/**
 * The template function PHP file 
 *
 * All default assets loads from CDN
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap Wordpress Theme by Bwebdesign 1.0
 */

/*=============================
=        Add html title       =
=============================*/

add_theme_support( 'title-tag' );

/*=============================
=         Enquey Styles       =
=============================*/

// Bootstrap + Custom theme CSS 
function bootstrap_css() {
	
	$dependencies = array('bootstrap');
	wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' );	
	wp_enqueue_style( 'bootstrap'); 	
	wp_enqueue_style( 'custom-theme', get_template_directory_uri() . '/style.css' );
	
}
add_action( 'wp_enqueue_scripts' , 'bootstrap_css' );	

/*=============================
=        Enquey Scripts       =
=============================*/

// Making jQuery to load from Google CDN Library
function replace_jquery() {
	
	if (!is_admin()) {
		
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
		wp_enqueue_script('jquery');
		
	}
	
}
add_action('init', 'replace_jquery');

// Bootstrap
function bootstrap_js() {
	
	global $wp_scripts;
	
	// js from CDN
	$dependencies = array('jquery');	
	wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', $dependencies, '4.0.0', true );
	wp_enqueue_script( 'bootstrap' );
  
	// If you’re using our compiled JavaScript, don’t forget to include CDN versions of jQuery and Popper.js before it.
	wp_enqueue_script( 'slim-min-js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js' , $dependencies, '3.2.1' );
	wp_enqueue_script( 'proper-min-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js' , $dependencies, '1.11.0' );
	
}
add_action( 'wp_enqueue_scripts' , 'bootstrap_js' );

/*=============================
=         Custom logo         =
=============================*/

add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 200,
		'flex-height' => true,
) );

/*=============================
=            Menus            =
=============================*/

// Register Custom Navigation Walker - https://github.com/wp-bootstrap/wp-bootstrap-navwalker
require_once( get_template_directory() . '/inc/wp-bootstrap-navwalker.php' );
add_theme_support( 'menus' );

// Add featured image
add_theme_support( 'post-thumbnails' );

function register_theme_menus() {
    register_nav_menus(
      array(  
    	'primary' => __( 'Primary Menu', 'bootstrap' ),
		'footer-menu' => __( 'Footer Menu' ),
      )
    );
}
add_action( 'init', 'register_theme_menus' );

/*=============================
=            Widgets          =
=============================*/

register_sidebar( array(
'name' => 'Footer Widget',
'id' => 'footer-widget',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );