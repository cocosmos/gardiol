<?php
/**
 * MipamTheme.
 */
//$theme_dir = get_template_directory();
//require $theme_dir . '/inc/structure/header.php';

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
   wp_enqueue_style( 'style-name', get_stylesheet_uri() . "style.css" );
}
?>
