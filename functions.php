<?php
/**
 * MipamTheme.
 */

/*
function load_dashicons(){
	wp_enqueue_style( "test", get_stylesheet_directory_uri() . "../assets/css/style.min.css" );
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'load_dashicons');*/
/*
//<script src="https://kit.fontawesome.com/650b750a42.js" crossorigin="anonymous"></script>


function mipam_register_styles() {*/

/*	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'mipam-style', get_stylesheet_uri(), array(), $theme_version );

	// Add print CSS.
	wp_enqueue_style( 'mipam-print-style', get_stylesheet_directory_uri() . "../assets/css/style.min.css", $theme_version );*/
	/*wp_enqueue_script( 'twentytwenty-js', 'https://kit.fontawesome.com/650b750a42.js', array(), $theme_version, false );

}

add_action( 'wp_enqueue_scripts', 'mipam_register_styles' );


*/
function load_stylesheets()
{
	wp_register_style('color', get_stylesheet_directory_uri() . '/css/style.min.css', array(), 1, 'all');
    wp_enqueue_style('color');

	wp_register_style('print', get_stylesheet_directory_uri() . '/css/print.css', array(), 1, 'all');
    wp_enqueue_style('print');

}
add_action( 'wp_enqueue_scripts', 'load_stylesheets' );

// Disable dash icons on front end


//tips
function register_tips_post_type() {
    register_post_type(
    'tips',
    [
        'labels' => [
            'name' => __( 'Tips' ),
            'singular_name' => __( 'Tips' ),
            ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-insert',
        'supports' => [
            'title',        // Post title
            'editor',       // Post content
            'thumbnail',
 			'custom-fields',
  			'page-attributes',
			
		],
		'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => false,
		//'taxonomies'=>array( 'category', 'tips' ),

        
    ]
    );
}
add_action( 'init', 'register_tips_post_type' );

//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_subjects_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('types',array('tips'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
 
}






//Hide project
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}
 
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );


?>
