<?php
/**
 * This code creates a Testimonial custom post type and its category for a Testimonial.
 */
function awm_testimonial_custom_post_type() {
	// Set UI labels for Custom Post Type.
	$labels = array(
		'name'                  => _x( 'Testimonial', 'awm' ),
		'singular_name'         => _x( 'Testimonial', 'awm' ),
		'menu_name'             => __( 'Testimonial' ),
		'name_admin_bar'        => __( 'Testimonial', 'awm' ),
		'archives'              => __( 'Testimonial Archives', 'awm' ),
		'attributes'            => __( 'Testimonial Attributes', 'awm' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'awm' ),
		'all_items'             => __( 'All Testimonial', 'awm' ),
		'add_new_item'          => __( 'Add New Testimonial', 'awm' ),
		'add_new'               => __( 'Add New Testimonial', 'awm' ),
		'new_item'              => __( 'New Testimonial', 'awm' ),
		'edit_item'             => __( 'Edit Testimonial', 'awm' ),
		'update_item'           => __( 'Update Testimonial', 'awm' ),
		'view_item'             => __( 'View Testimonial', 'awm' ),
		'view_items'            => __( 'View Testimonial', 'awm' ),
		'search_items'          => __( 'Search Testimonial', 'awm' ),
		'not_found'             => __( 'Not found', 'awm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'awm' ),
		'featured_image'        => __( 'Featured Image', 'awm' ),
		'set_featured_image'    => __( 'Set featured image', 'awm' ),
		'remove_featured_image' => __( 'Remove featured image', 'awm' ),
		'use_featured_image'    => __( 'Use as featured image', 'awm' ),
		'insert_into_item'      => __( 'Insert into Testimonial', 'awm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'awm' ),
		'items_list'            => __( 'Testimonial list', 'awm' ),
		'items_list_navigation' => __( 'Testimonial list navigation', 'awm' ),
		'filter_items_list'     => __( 'Filter Testimonial list', 'awm' ),
	);

	$rewrite = array(
		'slug'         => 'testimonial',
		'with_front'   => true,
		'hierarchical' => true,
	);

	// Set other options for Custom Post Type.
	$args = array(
		'label'               => __( 'Testimonial' ),
		'description'         => __( 'Testimonial and Reviews' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'post-formats', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'trackbacks' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'show_in_rest'        => true,
		'taxonomies'          => array(),
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-admin-multisite',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite'             => $rewrite,
		'map_meta_cap'        => true,
	);
	register_post_type( 'testimonial', $args );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'init', 'awm_testimonial_custom_post_type', 1 );
