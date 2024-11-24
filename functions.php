<?php
/**
 * This is our functions file
 *
 * @package WordPress
 * @subpackage active-website-management
 */

/**
 * This import file in enqueue file for include inside this file add enqueue function for site.
 */
require_once 'inc/enqueue.php';
/**
 * This import file in enqueue file for include inside this file add nav function for site.
 */
require_once 'inc/nav.php';
/**
 * This file imports all template functions.
 */
require_once 'inc/template-functions.php';

/**
 * This file imports all the custom post type.
 */
require_once 'inc/cpt/testimonials.php';
require_once 'inc/cpt/blog.php';

// Enable support for dynamic title tags in WordPress.
add_theme_support( 'title-tag' );

function awm_enable_custom_uploads( $mimes ) {
	// Allow SVG file uploads.
	$mimes['svg'] = 'image/svg+xml';
	// Allow WebP file uploads.
	$mimes['WebP'] = 'image/WebP';
	return $mimes;
}
add_filter( 'upload_mimes', 'awm_enable_custom_uploads' );

/**
 * Sets up theme support for post thumbnails and defines a custom image size.
 *
 * @return void
 */
function awm_blog_archive_image_size() {
	add_theme_support( 'post-thumbnails' );
	// Archive image size.
	add_image_size( 'blog-archive-image', 368, 193, true );
	// Single blog image size.
	add_image_size( 'blog-single-image', 746, 392, true );
}

add_action( 'after_setup_theme', 'awm_blog_archive_image_size' );
