<?php
/**
 *
 * This is a custom template for the "Single blog page call to action" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<div id="single-blog-cta-one">
	<div
		class="single-blog-cta <?php echo esc_html( get_field( 'single_blog_cta_one_section_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="single-blog-cta__inner">
				<?php
					/**
					 * Fetches default and post-specific fields for the Call to Action one (CTA) section.
					 * If a post-specific field (title, description, button text, or button link) is set,
					 * it overrides the default option field.
					 */
					$default_option_title       = get_field( 'single_blog_cta_one_title', 'option' );
					$post_title                 = get_field( 'single_blog_cta_one_post_field_title' );
					$default_option_description = get_field( 'single_blog_cta_one_description', 'option' );
					$post_description           = get_field( 'single_blog_cta_one_post_field_description' );
					$default_option_btn_text    = get_field( 'single_blog_cta_one_button_text', 'option' );
					$post_btn_text              = get_field( 'single_blog_cta_one_post_field_button_text' );
					$default_option_btn_link    = get_field( 'single_blog_cta_one_button_link', 'option' );
					$post_btn_link              = get_field( 'single_blog_cta_one_post_field_button_link' );
				?>
				<div class="single-blog-cta__inner_content">
					<span>
						<?php echo wp_kses_post( $post_title ? $post_title : $default_option_title ); ?>
					</span>
					<p class="description-secondary">
						<?php echo wp_kses_post( $post_description ? $post_description : $default_option_description ); ?>
					</p>
				</div>
				<div class="single-blog-cta__inner_button">
					<a href="<?php echo esc_url( $post_btn_link ? $post_btn_link : $default_option_btn_link ); ?>">
						<?php echo esc_html( $post_btn_text ? $post_btn_text : $default_option_btn_text ); ?>
						<i class="<?php echo esc_html( get_field( 'single_blog_cta_one_button_icon_class', 'option' ) ); ?>"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
