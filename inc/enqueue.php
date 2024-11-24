<?php
/**
 * This file is responsible for enqueuing all the necessary scripts and styles for the site.
 *
 * @package active-website-management
 */

/**
 * Enqueue all assets for the theme.
 */
function awm_frontend_theme_scripts() {
	// Enqueue theme stylesheet.
	// wp_enqueue_style( 'awm-theme', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Fontello icons.
	wp_enqueue_style( 'font-icon', get_template_directory_uri() . '/dist/assets/font/fontello/css/fontello.bundle.css', array(), filemtime( get_template_directory() . '/dist/assets/font/fontello/css/fontello.bundle.css' ), 'all' );

	// Enqueue additional custom CSS.
	wp_enqueue_style( 'awm-style', get_template_directory_uri() . '/dist/assets/css/main.bundle.css', array(), filemtime( get_template_directory() . '/dist/assets/css/main.bundle.css' ), 'all' );

	// Enqueue custom JS with filemtime
	wp_enqueue_script( 'awm-script', get_template_directory_uri() . '/dist/assets/js/script.bundle.js', array(), filemtime( get_template_directory() . '/dist/assets/js/script.bundle.js' ), true );

	wp_localize_script(
		'awm-script',
		'awmOptions',
		array(
			'ajax_url'             => admin_url( 'admin-ajax.php' ),
			'get_plan_price_nonce' => wp_create_nonce( 'get_plan_price_nonce' ),
			'ipinfoToken'          => get_field( 'ipinfoio_token', 'option' ),
			'awmpopup'             => get_field( 'awm_popup_time', 'option' ),
			'thank_you_url'        => get_site_url( null, 'thank-you/' ),
			'paypal_sdk_url'       => 'https://www.paypal.com/sdk/js?client-id=Af8H60zvqYWUp4tNdGBmnPGmZ5tZ5U9lvmfQXfkDv2t7fw9Cx28WUJ5iOgk5834z2E0oeCYzi4qocG3H&currency=USD',
		),
	);
}

add_action( 'wp_enqueue_scripts', 'awm_frontend_theme_scripts' );

function awm_remove_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );           // WordPress core block library
	wp_dequeue_style( 'wp-block-library-theme' );     // WordPress core block library theme support
	wp_dequeue_style( 'wc-block-style' );             // WooCommerce block styles (if using WooCommerce)
}
add_action( 'wp_enqueue_scripts', 'awm_remove_block_library_css', 100 );
