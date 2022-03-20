<?php
/**
 * MipamTheme.
 */

wp_enqueue_style( "total-child-css", get_stylesheet_directory_uri() . "../assets/css/style.min.css", array("total-parent-css") );

//<script src="https://kit.fontawesome.com/650b750a42.js" crossorigin="anonymous"></script>


function mipam_register_styles() {

/*	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'mipam-style', get_stylesheet_uri(), array(), $theme_version );

	// Add print CSS.
	wp_enqueue_style( 'mipam-print-style', get_stylesheet_directory_uri() . "../assets/css/style.min.css", $theme_version );*/
	wp_enqueue_script( 'twentytwenty-js', 'https://kit.fontawesome.com/650b750a42.js', array(), $theme_version, false );

}

add_action( 'wp_enqueue_scripts', 'mipam_register_styles' );



?>
