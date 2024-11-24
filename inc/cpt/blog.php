<?php
/**
 * This code creates a Blog custom post type and its category for a Blog.
 */
function awm_blog_custom_post_type() {

	$labels_category = array(
		'name'              => __( 'Blog Categories', 'awm' ),
		'singular_name'     => __( 'Blog Category', 'awm' ),
		'search_items'      => __( 'Search Blog Categories', 'awm' ),
		'all_items'         => __( 'All Blog Categories', 'awm' ),
		'parent_item'       => __( 'Parent Blog Category', 'awm' ),
		'parent_item_colon' => __( 'Parent Blog Category:', 'awm' ),
		'edit_item'         => __( 'Edit Blog Category', 'awm' ),
		'update_item'       => __( 'Update Blog Category', 'awm' ),
		'add_new_item'      => __( 'Add New Blog Category', 'awm' ),
		'new_item_name'     => __( 'New Blog Category Name', 'awm' ),
		'menu_name'         => __( 'Blog Categories', 'awm' ),
	);

	register_taxonomy(
		'blog-category',
		array( 'blog' ),
		array(
			'hierarchical'      => true,
			'labels'            => $labels_category,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'blog-category' ),
			'show_in_rest'      => true,
		)
	);

	$labels_tag = array(
		'name'          => __( 'Blog Tags', 'awm' ),
		'singular_name' => __( 'Blog Tag', 'awm' ),
		'search_items'  => __( 'Search Blog Tags', 'awm' ),
		'all_items'     => __( 'All Blog Tags', 'awm' ),
		'edit_item'     => __( 'Edit Blog Tag', 'awm' ),
		'update_item'   => __( 'Update Blog Tag', 'awm' ),
		'add_new_item'  => __( 'Add New Blog Tag', 'awm' ),
		'new_item_name' => __( 'New Blog Tag Name', 'awm' ),
		'menu_name'     => __( 'Blog Tags', 'awm' ),
	);

	register_taxonomy(
		'blog-tag',
		array( 'blog' ),
		array(
			'hierarchical'       => false,
			'labels'             => $labels_tag,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'blog-tag' ),
			'show_in_rest'       => true,
			'public'             => true,
			'publicly_queryable' => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
		)
	);

	// Set UI labels for Custom Post Type.
	$labels = array(
		'name'                  => _x( 'Blog', 'awm' ),
		'singular_name'         => _x( 'Blog', 'awm' ),
		'menu_name'             => __( 'Blog' ),
		'name_admin_bar'        => __( 'Blog', 'awm' ),
		'archives'              => __( 'Blog Archives', 'awm' ),
		'attributes'            => __( 'Blog Attributes', 'awm' ),
		'parent_item_colon'     => __( 'Parent Blog:', 'awm' ),
		'all_items'             => __( 'All Blog', 'awm' ),
		'add_new_item'          => __( 'Add New Blog', 'awm' ),
		'add_new'               => __( 'Add New Blog', 'awm' ),
		'new_item'              => __( 'New Blog', 'awm' ),
		'edit_item'             => __( 'Edit Blog', 'awm' ),
		'update_item'           => __( 'Update Blog', 'awm' ),
		'view_item'             => __( 'View Blog', 'awm' ),
		'view_items'            => __( 'View Blog', 'awm' ),
		'search_items'          => __( 'Search Blog', 'awm' ),
		'not_found'             => __( 'Not found', 'awm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'awm' ),
		'featured_image'        => __( 'Featured Image', 'awm' ),
		'set_featured_image'    => __( 'Set featured image', 'awm' ),
		'remove_featured_image' => __( 'Remove featured image', 'awm' ),
		'use_featured_image'    => __( 'Use as featured image', 'awm' ),
		'insert_into_item'      => __( 'Insert into Blog', 'awm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Blog', 'awm' ),
		'items_list'            => __( 'Blog list', 'awm' ),
		'items_list_navigation' => __( 'Blog list navigation', 'awm' ),
		'filter_items_list'     => __( 'Filter Blog list', 'awm' ),
	);

	$rewrite = array(
		'slug'         => 'blog',
		'with_front'   => true,
		'hierarchical' => true,
	);

	// Set other options for Custom Post Type.
	$args = array(
		'label'               => __( 'Blog' ),
		'description'         => __( 'Blog and Reviews' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'post-formats', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'trackbacks' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'show_in_rest'        => true,
		'taxonomies'          => array( 'blog-category', 'blog-tag' ),
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

	register_post_type( 'blog', $args );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'init', 'awm_blog_custom_post_type', 1 );
