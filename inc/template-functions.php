<?php
/**
 * This file is display all Template function in site.
 *
 * @package active-website-management
 */

/**
 * This function is used for register testimonials post type metabox.
 */
function awm_testimonial_metabox() {
	add_meta_box(
		'client_position',
		'Client Position',
		'awm_testimonial_metabox_callback',
		'testimonial',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'awm_testimonial_metabox' );

/**
 * This function is used for testimonials post type metabox callback function.
 */
function awm_testimonial_metabox_callback( $post ) {
	wp_nonce_field( 'save_testimonial_text_metabox', 'testimonial_metabox_nonce' );

	$value = get_post_meta( $post->ID, 'client_position', true );

	echo '<label for="testimonial_text_metabox_field">Enter text here:</label>';
	echo '<input type="text" id="testimonial_text_metabox_field" name="testimonial_text_metabox_field" value="' . esc_attr( $value ) . '" size="25" />';
}
add_action( 'save_post', 'awm_save_testimonial_metabox' );

/**
 * This function is used for save testimonials post type metabox.
 */
function awm_save_testimonial_metabox( $post_id ) {
	$nonce = filter_input( INPUT_POST, 'testimonial_metabox_nonce', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
	if ( ! $nonce || ! wp_verify_nonce( $nonce, 'save_testimonial_text_metabox' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$testimonial_text = filter_input( INPUT_POST, 'testimonial_text_metabox_field', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
	if ( null !== $testimonial_text ) {
		update_post_meta( $post_id, 'client_position', $testimonial_text );
	} else {
		delete_post_meta( $post_id, 'client_position' );
	}
}

// Theme Options setup using Advanced Custom Fields (ACF).
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title' => __( 'Theme General Settings', 'awm' ),
			'menu_title' => __( 'Theme Settings', 'awm' ),
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => __( 'Theme Header Settings', 'awm' ),
			'menu_title'  => __( 'Header', 'awm' ),
			'parent_slug' => 'theme-general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => __( 'Theme footer Settings', 'awm' ),
			'menu_title'  => __( 'footer', 'awm' ),
			'parent_slug' => 'theme-general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => __( 'Theme call to action v2 Settings', 'awm' ),
			'menu_title'  => __( 'call to action v2', 'awm' ),
			'parent_slug' => 'theme-general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => __( 'Theme Blog Archive Settings', 'awm' ),
			'menu_title'  => __( 'blog archive', 'awm' ),
			'parent_slug' => 'theme-general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => __( 'Theme Blog Single Settings', 'awm' ),
			'menu_title'  => __( 'blog single', 'awm' ),
			'parent_slug' => 'theme-general-settings',
		)
	);
	acf_add_options_sub_page(
		array(
			'page_title'  => __( 'Theme Blog tag page Settings', 'awm' ),
			'menu_title'  => __( 'blog tag', 'awm' ),
			'parent_slug' => 'theme-general-settings',
		)
	);
}

/**
 * Blog page excerpt set contant.
 */
function awm_blog_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'awm_blog_custom_excerpt_length', 999 );

/**
 * Blog page remove excerpt [].
 */
function awm_blog_custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'awm_blog_custom_excerpt_more' );

/**
 * This function is used to create think about section shortcode.
 */
function awm_our_solution_home_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/our-solution-home.php' ) ) {
		get_template_part( 'template-parts/our-solution-home' );
	} else {
		echo 'our solution template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'our_solution_home_section', 'awm_our_solution_home_section_shortcode' );

/**
 * This function is used to create improvement section shortcode.
 */
function awm_improvement_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/improvement-section.php' ) ) {
		get_template_part( 'template-parts/improvement-section' );
	} else {
		echo 'improvement template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'improvement_section', 'awm_improvement_section_shortcode' );

/**
 * This function is used to create our process section shortcode.
 */
function awm_our_process_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/our-process.php' ) ) {
		get_template_part( 'template-parts/our-process' );
	} else {
		echo 'our process template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'our_process_section', 'awm_our_process_section_shortcode' );

/**
 * This function is used to create we work section shortcode.
 */
function awm_we_work_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/we-work-section.php' ) ) {
		get_template_part( 'template-parts/we-work-section' );
	} else {
		echo 'we work template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'we_work_section', 'awm_we_work_section_shortcode' );

/**
 * This function is used to create call to action section shortcode.
 */
function awm_call_to_action_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/call-to-action-section.php' ) ) {
		get_template_part( 'template-parts/call-to-action-section' );
	} else {
		echo 'call to action template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'call_to_action_section', 'awm_call_to_action_section_shortcode' );

/**
 * This function is used to create call to action section shortcode.
 */
function awm_call_to_action_v2_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/call-to-action-section-v2.php' ) ) {
		get_template_part( 'template-parts/call-to-action-section-v2' );
	} else {
		echo 'call to action v2 template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'call_to_action_v2_section', 'awm_call_to_action_v2_section_shortcode' );

/**
 * This function is used to create call to action section shortcode.
 */
function awm_blog_call_to_action_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/blog-call-to-action-section.php' ) ) {
		get_template_part( 'template-parts/blog-call-to-action-section' );
	} else {
		echo 'blog call to action template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'blog_call_to_action_section', 'awm_blog_call_to_action_section_shortcode' );

/**
 * This function is used to create our pricing section shortcode.
 */
function awm_our_pricing_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/our-pricing-section.php' ) ) {
		get_template_part( 'template-parts/our-pricing-section' );
	} else {
		echo 'our pricing section template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'our_pricing_section', 'awm_our_pricing_section_shortcode' );

/**
 * This function is used to create pricing call to action section shortcode.
 */
function awm_pricing_call_to_action_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/pricing-call-to-action.php' ) ) {
		get_template_part( 'template-parts/pricing-call-to-action' );
	} else {
		echo 'pricing call to action section template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'pricing_call_to_action', 'awm_pricing_call_to_action_section_shortcode' );

/**
 * This function is used to create testimonials section shortcode.
 */
function awm_testimonials_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/testimonials-section.php' ) ) {
		get_template_part( 'template-parts/testimonials-section' );
	} else {
		echo 'testimonials template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'testimonials_section', 'awm_testimonials_section_shortcode' );

/**
 * This function is used to create contact section shortcode.
 */
function awm_contact_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/contact-section.php' ) ) {
		get_template_part( 'template-parts/contact-section' );
	} else {
		echo 'contact template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'contact_section', 'awm_contact_section_shortcode' );

/**
 * This function is used to create contact V2 section shortcode.
 */
function awm_contact_v2_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/contact-section-v2.php' ) ) {
		get_template_part( 'template-parts/contact-section-v2' );
	} else {
		echo 'contact v2 template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'contact_section_v2', 'awm_contact_v2_section_shortcode' );

/**
 * This function is used to create about section shortcode.
 */
function awm_about_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/about-section.php' ) ) {
		get_template_part( 'template-parts/about-section' );
	} else {
		echo 'about template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'about_section', 'awm_about_section_shortcode' );

/**
 * This function is used to create faq section shortcode.
 */
function awm_faq_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/faq-section.php' ) ) {
		get_template_part( 'template-parts/faq-section' );
	} else {
		echo 'faq template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'faq_section', 'awm_faq_section_shortcode' );

/**
 * This function is used to create single blog CTA one section shortcode.
 */
function awm_single_blog_cta_one_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/single-blog-cta-one.php' ) ) {
		get_template_part( 'template-parts/single-blog-cta-one' );
	} else {
		echo 'single blog CTA one template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'single_blog_cta_one_section', 'awm_single_blog_cta_one_section_shortcode' );

/**
 * This function is used to create single blog CTA two section shortcode.
 */
function awm_single_blog_cta_two_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/single-blog-cta-two.php' ) ) {
		get_template_part( 'template-parts/single-blog-cta-two' );
	} else {
		echo 'single blog CTA two template part not found.';
	}

	return ob_get_clean();
}
add_shortcode( 'single_blog_cta_two_section', 'awm_single_blog_cta_two_section_shortcode' );

/**
 * This function is used to create single blog small pricing section shortcode.
 */
function awm_single_blog_small_pricing_section_shortcode() {
	ob_start();

	if ( locate_template( 'template-parts/single-blog-pricing-section.php' ) ) {
		get_template_part( 'template-parts/single-blog-pricing-section' );
	} else {
		echo 'small pricing template part not found';
	}

	return ob_get_clean();
}
add_shortcode( 'small_pricing_section', 'awm_single_blog_small_pricing_section_shortcode' );

/**
 * Adds the 'defer' attribute to the script tag for specified script handles.
 *
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string The modified script tag with the 'defer' attribute added.
 */
function awm_add_defer_attribute_to_script( $tag, $handle ) {

	$script_to_defer = array(
		'swv',
		'contact-form-7',
		'awm-script',
		'rank-math',
	);

	if ( in_array( $handle, $script_to_defer, true ) ) {
		$tag = str_replace( ' src', ' defer src', $tag );
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'awm_add_defer_attribute_to_script', 10, 2 );

/**
 * Adds the 'preload' and 'onload' attributes to the style tag for specified style handles.
 *
 * This function is used to improve the performance of loading certain CSS files by preloading them and
 * deferring their execution until the page has finished loading.
 *
 * @param string $tag    The style tag.
 * @param string $handle The style handle.
 * @return string The modified style tag with the 'preload' and 'onload' attributes added.
 */
function awm_add_defer_attribute_to_style( $tag, $handle ) {

	$styles_to_defer = array(
		'contact-form-7',
		'font-icon',
	);

	if ( in_array( $handle, $styles_to_defer, true ) ) {
		$tag = str_replace( "rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $tag );
	}
	return $tag;
}
add_filter( 'style_loader_tag', 'awm_add_defer_attribute_to_style', 10, 2 );

/**
 * Calculate the estimated read time for a blog post.
 *
 * This function calculates the read time for a post based on the
 * word count of its content. It assumes an average reading speed
 * of 200 words per minute.
 *
 * @param int $post_id The ID of the post.
 *
 * @return int The estimated reading time in minutes.
 */
function awm_calculate_read_time( $post_id ) {
	$content          = get_post_field( 'post_content', $post_id );
	$word_count       = str_word_count( strip_tags( $content ) );
	$words_per_minute = 200;

	$read_time = ceil( $word_count / $words_per_minute );

	return $read_time;
}

/**
 * This code is used to blog archive page pagination.
 * Modify the output of pagination links to include inactive "prev" and "next" buttons.
 *
 * @param string $output The HTML output of the pagination links.
 * @param array  $args An array of arguments for the pagination, including 'current', 'total', 'prev_text', and 'next_text'.
 *
 * @return string Modified pagination links HTML with inactive prev/next buttons when necessary.
 */
function awm_paginate_links_output( $output, $args ) {

	if ( 1 === $args['current'] ) {
		$prev   = '<a class="prev page-numbers inactive">' . $args['prev_text'] . '</a>';
		$output = $prev . "\n" . $output;
	}

	if ( $args['total'] === $args['current'] ) {
		$next    = '<a class="next page-numbers inactive">' . $args['next_text'] . '</a>';
		$output .= "\n" . $next;
	}

	return $output;
}
add_filter( 'paginate_links_output', 'awm_paginate_links_output', 10, 2 );


/**
 * Blog Archive
 * Add meta box for featured blog post.
 */
function awm_add_featured_blog_checkbox_meta_box() {
	add_meta_box(
		'featured_blog_checkbox',
		'Feature this Post',
		'awm_render_featured_blog_checkbox_meta_box',
		'blog',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'awm_add_featured_blog_checkbox_meta_box' );

/**
 * Render the checkbox in the meta box.
 */
function awm_render_featured_blog_checkbox_meta_box( $post ) {
	wp_nonce_field( 'save_featured_blog_checkbox_meta_box_data', 'featured_blog_checkbox_meta_box_nonce' );

	$is_featured = get_post_meta( $post->ID, '_is_featured_blog_post', true );

	echo '<label for="featured_blog_checkbox">';
	echo '<input type="checkbox" id="featured_blog_checkbox" name="featured_blog_checkbox" value="1" ' . checked( 1, $is_featured, false ) . ' />';
	echo ' Feature this post in the Features Blog section';
	echo '</label>';
}

/**
 * Save the meta box data when the post is saved.
 */
function awm_save_featured_blog_checkbox_meta_box_data( $post_id ) {

	if ( ! isset( $_POST['featured_blog_checkbox_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['featured_blog_checkbox_meta_box_nonce'], 'save_featured_blog_checkbox_meta_box_data' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	$is_featured = isset( $_POST['featured_blog_checkbox'] ) ? 1 : 0;
	update_post_meta( $post_id, '_is_featured_blog_post', $is_featured );
}
add_action( 'save_post', 'awm_save_featured_blog_checkbox_meta_box_data' );

/**
 * This code is used to fetch dynamically section titles and descriptions in category and tag pages.
 * Retrieves dynamic content (title or description) based on the current tag.
 * If a custom field value exists for the tag, it is used; otherwise, a default field value is retrieved from the options page.
 *
 * @param object $current_tag   The current tag object (like category or tag).
 * @param string $custom_field  The ACF field name for the custom content (title or description).
 * @param string $default_field The ACF field name for the default content (title or description) from the options page.
 *
 * @return string The processed content (custom or default) with the {{current_tag}} placeholder replaced.
 */
function awm_get_dynamic_content( $current_tag, $custom_field, $default_field ) {

	$custom_content  = get_field( $custom_field, $current_tag );
	$default_content = get_field( $default_field, 'option' );
	$content         = ! empty( $custom_content ) ? $custom_content : $default_content;
	$content         = str_replace( '{{current_tag}}', $current_tag->name, $content );

	return $content;
}

/**
 * Inserts shortcode content before a specified heading number within the main content.
 *
 * @param string $shortcode   The shortcode or HTML to insert.
 * @param int    $heading_num The heading number (1, 2, 3, etc.) before which the content should be inserted.
 * @param string $content     The main content of the post.
 *
 * @return string The modified content with the shortcode added before the specified heading.
 */
function awm_insert_before_heading( $shortcode, $heading_num, $content ) {

	if ( empty( $shortcode ) ) {
		return $content;
	}

	$pattern = '/(<h[1-6][^>]*>.*?<\/h[1-6]>)/is';
	$parts   = preg_split( $pattern, $content, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );

	$new_content = '';
	$found       = 0;

	if ( preg_match( '/\[[^\]]*\]/', $shortcode ) ) {
		$related_code = do_shortcode( $shortcode );
	} else {
		$related_code = $shortcode;
	}

	foreach ( $parts as $part ) {

		if ( preg_match( '/<h[1-6][^>]*>.*?<\/h[1-6]>/is', $part ) ) {
			$found++;

			if ( $found == $heading_num ) {
				$new_content .= $related_code;
			}
			$new_content .= $part;
		} else {
			$new_content .= $part;
		}
	}

	return $new_content;
}

add_action( 'the_content', 'awm_blog_heading_modify', 10, 2 );

/**
 * Modifies the main content of a post by inserting CTA shortcodes before specific headings.
 *
 * @param string $content The main content of the post.
 *
 * @return string The modified content with shortcodes added.
 */
function awm_blog_heading_modify( $content ) {

	if ( is_singular( 'blog' ) ) {
		$post_id = get_the_ID();

		$single_blog_cta_one_shortcode = get_field( 'single_blog_cta_one_shortcode', 'option' );
		$single_blog_cta_two_shortcode = get_field( 'single_blog_cta_two_shortcode', 'option' );

		$default_single_blog_cta_one_head_num = get_field( 'single_blog_cta_one_heading_number', 'option' );
		$single_blog_cta_one_head_num         = get_field( 'single_blog_cta_one_post_field_heading_number', $post_id );

		$default_single_blog_cta_two_head_num = get_field( 'single_blog_cta_two_heading_number', 'option' );
		$single_blog_cta_two_head_num         = get_field( 'single_blog_cta_two_post_field_heading_number', $post_id );

		$blog_cta_one_head_num = ! empty( $single_blog_cta_one_head_num ) ? $single_blog_cta_one_head_num : $default_single_blog_cta_one_head_num;
		$blog_cta_two_head_num = ! empty( $single_blog_cta_two_head_num ) ? $single_blog_cta_two_head_num : $default_single_blog_cta_two_head_num;

		if ( ! empty( $single_blog_cta_two_shortcode ) && ! empty( $blog_cta_two_head_num ) ) {
			$content = awm_insert_before_heading( $single_blog_cta_two_shortcode, $blog_cta_two_head_num, $content );
		}

		if ( ! empty( $single_blog_cta_one_shortcode ) && ! empty( $blog_cta_one_head_num ) ) {
			$content = awm_insert_before_heading( $single_blog_cta_one_shortcode, $blog_cta_one_head_num, $content );
		}
	}

	return $content;
}

/**
 * Register theme support for Rank Math breadcrumbs
 */
add_theme_support( 'rank-math-breadcrumbs' );

/**
 * Define the function to add WooCommerce support to the theme.
 */
function awm_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'awm_woocommerce_support' );

add_action( 'wp_ajax_get_plan_price', 'get_plan_price' );
add_action( 'wp_ajax_nopriv_get_plan_price', 'get_plan_price' );

function get_plan_price() {
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'get_plan_price_nonce' ) ) {
		wp_send_json_error( 'Invalid nonce' );
	}

	if ( isset( $_POST['plan_name'] ) ) {
		$plan_name = sanitize_text_field( $_POST['plan_name'] );

		if ( empty( trim( $plan_name ) ) ) {
			wp_send_json_error( 'No plan name provided' );
		}

		$pricing_details = get_field( 'plan_pricing_details', 'option' );

		if ( empty( $pricing_details ) ) {
			wp_send_json_error( 'No pricing details available' );
		}

		$price = false;
		foreach ( $pricing_details as $detail ) {
			if ( $plan_name === $detail['plan_name'] ) {
				$price = $detail['plan_ammount'];
				break;
			}
		}

		if ( false !== $price ) {
			wp_send_json_success( $price );
		} else {
			wp_send_json_error( 'Plan not found' );
		}
	} else {
		wp_send_json_error( 'No plan name provided' );
	}

	wp_die();
}
