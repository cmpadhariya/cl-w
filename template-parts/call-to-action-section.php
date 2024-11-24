<?php
/**
 *
 * This is a custom template for the "call to action" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section class="call-to-action-section <?php echo esc_attr( get_field( 'section_padding_class_name' ) ); ?>"
	id="call-to-action">
	<div class="container p-0">
		<div class="call-to-action-section__inner">
			<div class="row">
				<div class="col-lg-2 col-md-3">
					<div class="call-to-action-section__inner_image">
						<img src="<?php echo esc_url( get_field( 'call_to_action_section_image' ) ); ?>"
							alt="<?php esc_attr_e( 'Call to Action section Image', 'awm' ); ?>" width="140" height="140"
							loading="lazy" />
					</div>
				</div>
				<div class="col-lg-10 col-md-9">
					<div class="call-to-action-section__inner_details">
						<div class="call-to-action-section__inner--heading">
							<h2>
								<?php
								$call_to_action_section_heading = get_field( 'call_to_action_section_heading' );
								$current_day                    = gmdate( 'j' );
								$month_to_display               = ( 15 >= $current_day ) ? gmdate( 'F' ) : gmdate( 'F', strtotime( '+1 month' ) );
								echo wp_kses(
									str_replace( '{{next_month}}', $month_to_display, $call_to_action_section_heading ),
									array( 'span' => array() )
								);
								?>
							</h2>
						</div>

						<div class="call-to-action-section__inner--description">
							<p class="description-primary">
								<?php echo esc_html( get_field( 'call_to_action_section__discription' ) ); ?>
							</p>
						</div>

						<div class="call-to-action-section__inner--button">
							<a href="<?php echo esc_url( get_field( 'call_to_action_section_button_url' ) ); ?> "
								class="description-primary">
								<?php echo esc_html( get_field( 'call_to_action_section_button_text' ) ); ?>
								<img src="<?php echo esc_url( get_field( 'call_to_action_section_button' ) ); ?>"
									alt="Secure Your Spot Now to Get Started arrow gif" width="25" height="25"
									loading="lazy">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
