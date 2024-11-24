<?php
/**
 *
 * This is a custom template for the "blog call to action" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<?php
// Call To Action Section different price for India and out of india
$pricing_detail = array(
	'IN' => get_field( 'blog_call_to_action_section_subtitle_text', 'option' ),
	'US' => get_field( 'blog_call_to_action_section_subtitle_text_with_us_price', 'option' ),
);
?>
<section id="blog-call-to-action">
	<div
		class="blog-call-to-action <?php echo esc_attr( get_field( 'blog_call_to_action_section_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="blog-call-to-action__inner">
				<div class="row">
					<div class="col-lg-7">
						<div class="blog-call-to-action__inner_content">
							<div class="blog-call-to-action__inner_content--background">
								<img src="<?php echo esc_url( get_field( 'blog_call_to_action_section_background_image', 'option' ) ); ?>"
									alt="call to action v2 background Image" width="100" height="100" loading="lazy" />
							</div>
							<div class="blog-call-to-action__inner_content--text">
								<div class="blog-call-to-action__inner_content--text-subtitle"
									data-pricing="<?php echo esc_attr( wp_json_encode( $pricing_detail ) ); ?>">
									<p><?php echo esc_html( $pricing_detail['IN'] ); ?></p>
								</div>
								<h2><?php echo wp_kses_post( get_field( 'blog_call_to_action_title', 'option' ) ); ?>
								</h2>
								<p class="blog-call-to-action__inner_content--text-description description-primary">
									<?php echo wp_kses_post( get_field( 'blog_call_to_action_section_description', 'option' ) ); ?>
								</p>
								<a class="global-button"
									href="<?php echo esc_url( get_field( 'call_to_action_section_button_url', 'option' ) ); ?>"
									aria-label="please contact us">
									<?php echo esc_html( get_field( 'blog_call_to_action_section_button_text', 'option' ) ); ?>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="blog-call-to-action__inner_newslatter">
							<h3><?php echo wp_kses_post( get_field( 'blog_call_to_action_section_newslatter_heading', 'option' ) ); ?>
							</h3>
							<p class="description-secondry">
								<?php echo wp_kses_post( get_field( 'blog_call_to_action_section_newslatter_description', 'option' ) ); ?>
							</p>
							<div class="blog-call-to-action__inner_newslatter--content">
								<?php echo do_shortcode( get_field( 'blog_call_to_action_section_newslatter_form_shortcode', 'option' ) ); ?>
								<p class="blog-call-to-action__inner_newslatter--content-description">
									<?php echo wp_kses_post( get_field( 'blog_call_to_action_section_newslatter_description', 'option' ) ); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>