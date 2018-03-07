<?php
// Include style sheet and script files
function load_scripts(){
	wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all' );

	wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0', 'all' );
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Load Bootstrap-NavWalker extension to use Bootstrap menu style
require get_template_directory() . '/bootstrap-navwalker.php';

// Main configuration
function configure(){
	// Register menus
	register_nav_menus(
		array(
			'top_menu'	  => 'Top Menu',
			'main_menu'   => 'Main Menu',
			'footer_menu' => 'Footer Menu'
		)
	);

	// Add theme support
	$args = array(
		'height' => 225,
		'width'  => 1920
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'configure', 0 );