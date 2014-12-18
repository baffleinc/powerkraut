<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
if( ! function_exists( 'grunterie_enqueue_style' ) ) {
	function grunterie_enqueue_style()
	{
		// Register the main style
		wp_register_style( 'grunterie-stylesheet', get_stylesheet_directory_uri() . '/css/app.prefixed.css', array(), '', 'all' );

		wp_enqueue_style( 'grunterie-stylesheet' );

		wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/js/app.js', array('jquery') );

	}
}
add_action( 'wp_enqueue_scripts', 'grunterie_enqueue_style' );