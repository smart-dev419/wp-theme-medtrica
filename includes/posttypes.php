<?php
// Create Custom Post Type for Slider
function register_slides_posttype() {
	$labels = array(
		'name'              => _x( 'Slides', 'post type general name' ),
		'singular_name'     => _x( 'Slide', 'post type singular name' ),
		'add_new'           => __( 'Add New Slide' ),
		'add_new_item'      => __( 'Add New Slide' ),
		'edit_item'         => __( 'Edit Slide' ),
		'new_item'          => __( 'New Slide' ),
		'view_item'         => __( 'View Slide' ),
		'search_items'      => __( 'Search Slides' ),
		'not_found'         => __( 'Slide' ),
		'not_found_in_trash'=> __( 'Slide' ),
		'parent_item_colon' => __( 'Slide' ),
		'menu_name'         => __( 'Slides' )
	);
	$taxonomies = array();
	$supports = array('title','thumbnail');
	$post_type_args = array(
		'labels'            => $labels,
		'singular_label'    => __('Slide'),
		'public'            => true,
		'show_ui'           => true,
		'exclude_from_search' => true,
		'publicly_queryable'=> false,
		'query_var'         => true,
		'capability_type'   => 'post',
		'has_archive'       => false,
		'hierarchical'      => false,
		'rewrite'           => array( 'slug' => 'slide', 'with_front' => false ),
		//'supports'          => $supports,
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_position'     => 5, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
		'menu_icon' => 'dashicons-format-gallery',
		//'menu_icon'         => get_template_directory_uri() . '/inc/slider/images/icon.png',
		'taxonomies'        => $taxonomies
	);
	register_post_type('slides',$post_type_args);
}
add_action('init', 'register_slides_posttype');