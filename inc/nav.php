<?php
/**
 * This file is display all Nav function in site.
 *
 * @package active-website-management
 */

/**
 * Register navigation menu and add theme support for menus.
 *
 * @return void
 */
function awm_active_website_management_theme_setup() {
	// Enable support for menus.
	add_theme_support( 'menus' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'active_website_management_header_menu'    => __( 'Header Menu', 'awm' ),
			'active_website_management_footer_menu'    => __( 'Footer Menu', 'awm' ),
			'active_website_management_header_v2_menu' => __( 'Header Menu V2', 'awm' ),
			'active_website_management_footer_v2_menu' => __( 'Footer Menu V2', 'awm' ),
		)
	);
}
add_action( 'after_setup_theme', 'awm_active_website_management_theme_setup' );

/**
 * Class WP_Bootstrap_Navwalker
 *
 * Custom Walker Class for Bootstrap Navigation Menu.
 *
 * @package WordPress
 * @subpackage Bootstrap
 */
class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

	/**
	 * Start Level.
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of the current menu item (default: 0).
	 * @param array    $args   An array of arguments (default: empty array).
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent      = str_repeat( "\t", $depth );
		$classes     = array( 'sub-menu' );
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$output     .= "\n$indent<ul$class_names>\n";
	}

	/**
	 * Start Element.
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param object   $item   Menu item object.
	 * @param int      $depth  Depth of the current menu item (default: 0).
	 * @param array    $args   An array of arguments (default: empty array).
	 * @param int      $id     Menu item ID (default: 0).
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= $indent . '<li' . $class_names . '>';

		$attributes           = array();
		$attributes['title']  = ! empty( $item->attr_title ) ? esc_attr( $item->attr_title ) : '';
		$attributes['target'] = ! empty( $item->target ) ? esc_attr( $item->target ) : '';
		$attributes['rel']    = ! empty( $item->xfn ) ? esc_attr( $item->xfn ) : '';
		$attributes['href']   = ! empty( $item->url ) ? esc_url( $item->url ) : '';

		$attributes['class'] = 'description-secondary';

		$attributes = apply_filters( 'nav_menu_link_attributes', $attributes, $item, $args, $depth );

		$attr = '';
		foreach ( $attributes as $key => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $key ) ? esc_url( $value ) : esc_attr( $value );
				$attr .= ' ' . $key . '="' . $value . '"';
			}
		}

		$title 		  = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output  = '';
		if ( is_object( $args ) ) {
			$item_output  .= isset( $args->before ) ? $args->before : '';
			$item_output  .= '<a' . $attr . '>';  // Use $attr here, not $attributes
			$item_output  .= isset( $args->link_before ) ? $args->link_before : '';
			$item_output  .= apply_filters( 'the_title', $item->title, $item->ID );
			$item_output  .= isset( $args->link_after ) ? $args->link_after : '';
			$item_output  .= '</a>';
			$item_output  .= isset( $args->after ) ? $args->after : '';
		} elseif ( is_array( $args ) ) {
			$item_output  .= isset( $args['before'] ) ? $args['before'] : '';
			$item_output  .= '<a' . $attr . '>';  // Use $attr here, not $attributes
			$item_output  .= isset( $args['link_before'] ) ? $args['link_before'] : '';
			$item_output  .= apply_filters( 'the_title', $item->title, $item->ID );
			$item_output  .= isset( $args['link_after'] ) ? $args['link_after'] : '';
			$item_output  .= '</a>';
			$item_output  .= isset( $args['after'] ) ? $args['after'] : '';
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
