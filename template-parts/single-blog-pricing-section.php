<?php
/**
 *
 * This is a custom template for the "single blog pricing" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<div id="single-blog-pricing" class="single-blog-pricing">
	<div class="container p-0">
		<div class="single-blog-pricing__inner">
			<div class="row pricing-card-row">
				<?php if ( have_rows( 'small_pricing_card', 'option' ) ) : ?>
					<?php while ( have_rows( 'small_pricing_card', 'option' ) ) : ?>
						<?php the_row(); ?>
						<?php
						$pricing_detail = array(
							'IN' => get_sub_field( 'small_pricing_card_price_numbers', 'option' ),
							'US' => get_sub_field( 'small_pricing_card_price_numbers_us', 'option' ),
						);
						$pricing_detail_del = array(
							'IN' => get_sub_field( 'small_pricing_card_price_strick-number', 'option' ),
							'US' => get_sub_field( 'small_pricing_card_price_strick-numbe_us', 'option' ),
						);
						?>
						<div class="col-xl-4 col-lg-6 col-md-4 col-sm-12">
							<div class="single-blog-pricing__inner_column">
							<?php
							$pricing_card_discount_label = esc_html( get_sub_field( 'small_pricing_card_discount_label', 'option' ) );
							if ( ! empty( $pricing_card_discount_label ) ) :
								?>
								<div class="pricing-card__discount-label">
								<img src="<?php echo esc_url( get_sub_field( 'small_pricing_card_discount_label_gif', 'option' ) ); ?>"
									alt="<?php esc_attr_e( 'small pricing card discount label', 'awm' ); ?>" width="25" height="25"
									loading="lazy" />
									<p><?php echo esc_html( $pricing_card_discount_label ); ?></p>
								</div>
							<?php endif; ?>
							<?php
							$pricing_card_label = esc_html( get_sub_field( 'small_pricing_card_label', 'option' ) );
							if ( ! empty( $pricing_card_label ) ) :
								?>
								<p class="pricing-card__label"><?php echo esc_html( $pricing_card_label ); ?></p>
							<?php endif; ?>
								<div class="pricing-card__heading">
									<img src="<?php echo esc_url( get_sub_field( 'small_pricing_card_heading_image', 'option' ) ); ?>" alt="Our Prising Card Related Gif" width="50" height="50" loading="lazy"/>
									<div class="pricing-card__heading_title">
										<span class="description-secondary"><?php echo wp_kses_post( get_sub_field( 'small_pricing_card_heading_title', 'option' ) ); ?></span>
									<?php
									$pricing_card_heading_label = esc_html( get_sub_field( 'small_pricing_card_heading_label', 'option' ) );
									if ( ! empty( $pricing_card_heading_label ) ) :
										?>
										<span class="label"><?php echo esc_html( $pricing_card_heading_label ); ?></span>
									<?php endif; ?>
									</div>
									<p class="pricing-description">
										<?php echo esc_html( get_sub_field( 'small_pricing_card_heading_description', 'option' ) ); ?>
									</p>
								</div>
								<div class="pricing-card__price">
									<div class="pricing-card__price_original">
										<h3 class="pricing-card__price_numbers" data-pricing="<?php echo esc_attr( wp_json_encode( $pricing_detail ) ); ?>"></h3>
										<span class="pricing-card__price_number-text">
											<?php echo wp_kses_post( get_sub_field( 'small_pricing_card_price_numbers_text', 'option' ) ); ?>
										</span>
									</div>
									<p class="description-primary pricing-card__price_del" data-pricing-del="<?php echo esc_attr( wp_json_encode( $pricing_detail_del ) ); ?>">
									</p>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="single-blog-pricing__inner_bottom">
				<a class="global-button single-blog-pricing__inner_btn" href="<?php echo esc_url( get_field( 'small_pricing_section_button_link', 'option' ) ); ?>">
					<?php echo esc_html( get_field( 'small_pricing_section_button_text', 'option' ) ); ?>
				</a>
				<p class="description-secondary single-blog-pricing__inner_bottom-text">
					<?php
					$pricing_card_bottom_text = get_field( 'small_pricing_section_bottom_text', 'option' );
					$current_day              = gmdate( 'j' );
					$month_to_display         = ( 15 >= $current_day ) ? gmdate( 'F' ) : gmdate( 'F', strtotime( '+1 month' ) );
					echo wp_kses(
						str_replace( '{{next_month}}', $month_to_display, $pricing_card_bottom_text ),
						array( 'span' => array() )
					);
					?>
				</p>
			</div>
		</div>
	</div>
</div>
