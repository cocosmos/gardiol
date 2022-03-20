<?php
/**
 * MipamTheme.
 */



function mipam_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'mipam-style', get_stylesheet_uri(), array(), $theme_version );


	// Add print CSS.
	wp_enqueue_style( 'mipam-print-style', get_stylesheet_directory_uri() . "./assets/css/style.min.css", $theme_version );

}

add_action( 'wp_enqueue_scripts', 'mipam_register_styles' );



?>
