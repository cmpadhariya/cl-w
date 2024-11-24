<?php
/**
 *
 * This is a custom template for the "pricing call to action" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="pricing-call-to-action">
	<div class="pricing-call-to-action <?php echo esc_attr( get_field( 'pricing_call_to_action_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="pricing-call-to-action__inner">
				<div class="row bottom-row">
					<div class="col-lg-6">
						<div class="pricing__garanty">
							<div class="pricing__garanty_heading">
								<i class="<?php echo esc_html( get_field( 'pricing_garanty_heading_icon_class' ) ); ?>"></i>
								<h3><?php echo wp_kses_post( get_field( 'pricing_garanty_heading_text' ) ); ?></h3>
							</div>
							<p class="description-secondary"><?php echo wp_kses_post( get_field( 'pricing_garanty_description' ) ); ?></p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="pricing__calltoaction">
							<h3><?php echo wp_kses_post( get_field( 'pricing_call_to_action_heading' ) ); ?>
								<span class="after-heading description-primary">FREE</span>
							</h3>
							<div class="pricing__calltoaction_btn">
								<a href="<?php echo esc_url( get_field( 'pricing_call_to_action_first_button_url' ) ); ?>" class="global-button first-btn">
									<?php echo esc_html( get_field( 'pricing_call_to_action_first_button_text' ) ); ?>
									<i class="<?php echo esc_html( get_field( 'pricing_call_to_action_first_button_icon_class' ) ); ?>"></i>
								</a>
								<a href="<?php echo esc_url( get_field( 'pricing_call_to_action_second_button_url' ) ); ?>" class="global-button second-btn" data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
									<?php echo esc_html( get_field( 'pricing_call_to_action_second_button_text' ) ); ?>
									<i class="<?php echo esc_html( get_field( 'pricing_call_to_action_second_button_icon_class' ) ); ?>"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="pricing__bottom-text">
					<p class="description-secondary">
						<i class="<?php echo esc_attr( get_field( 'pricing_payment_icon_class' ) ); ?>"></i>
						<?php echo esc_html( get_field( 'pricing_payment_text' ) ); ?>
					</p>
					<hr/>
					<p class="description-secondary">
						<i class="<?php echo esc_attr( get_field( 'pricing_refund_icon_class' ) ); ?>"></i>
						<?php echo esc_html( get_field( 'pricing_refund_text' ) ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
