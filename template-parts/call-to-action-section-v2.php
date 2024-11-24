<?php
/**
 *
 * This is a custom template for the "call to action v2" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<?php
// This variable is use different price for India and out of india.
$pricing_detail = array(
	'IN' => get_field( 'call_to_action_section_v2_subtitle_text', 'option' ),
	'US' => get_field( 'call_to_action_section_v2_subtitle_text_with_us_price', 'option' ),
);
?>
<section id="call-to-action-v2">
	<div class="call-to-action-v2 <?php echo esc_attr( get_field( 'call_to_action_v2_section_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="call-to-action-v2__inner">
				<div class="call-to-action-v2__inner_background">
					<img src="<?php echo esc_url( get_field( 'call_to_action_section_v2_background_image', 'option' ) ); ?>"
						alt="call to action v2 background Image" width="100" height="100" loading="lazy" 
					/>
				</div>
				<div class="call-to-action-v2__inner_content">
					<div class="call-to-action-v2__inner_content--subtitle" data-pricing="<?php echo esc_attr( wp_json_encode( $pricing_detail ) ); ?>">
						<p><?php echo esc_html( $pricing_detail['IN'] ); ?></p>
					</div>
					<h2><?php echo wp_kses_post( get_field( 'call_to_action_v2_title', 'option' ) ); ?></h2>
					<p class="call-to-action-v2__inner_content--description description-primary">
						<?php echo wp_kses_post( get_field( 'call_to_action_section_v2_description', 'option' ) ); ?>
					</p>
					<a class="global-button" href="<?php echo esc_url( get_field( 'call_to_action_section_v2_button_url', 'option' ) ); ?>" data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
						<?php echo esc_html( get_field( 'call_to_action_section_v2_button_text', 'option' ) ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
