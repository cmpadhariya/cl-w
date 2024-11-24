<?php
/**
 *
 * This is a custom template for the "our pricing" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="our-pricing">
	<div class="our-pricing <?php echo esc_attr( get_field( 'our_pricing_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="our-pricing__inner">
				<div class="our-pricing__inner_heading">
					<div class="our-pricing__inner_heading--subtitle">
						<i class="<?php echo esc_attr( get_field( 'our_pricing_subtitle_icon_class' ) ); ?>"></i>
						<p class="description-secondary"><?php echo esc_html( get_field( 'our_pricing_subtitle' ) ); ?></p>
					</div>
					<?php
					// Retrieve and sanitize the H1 and H2 title for the pricing section.
					$pricing_title_h1 = wp_kses_post( get_field( 'our_pricing_title_heading_h1' ) );
					$pricing_title_h2 = wp_kses_post( get_field( 'our_pricing_title_heading_h2' ) );
					?>
					<?php
					if ( ! empty( $pricing_title_h1 ) ) :
						?>
						<h1><?php echo wp_kses_post( $pricing_title_h1 ); ?></h1>
					<?php endif; ?>
					<?php
					if ( ! empty( $pricing_title_h2 ) ) :
						?>
						<h2><?php echo wp_kses_post( $pricing_title_h2 ); ?></h2>
					<?php endif; ?>
					<p class="description-primary">
						<?php echo wp_kses_post( get_field( 'our_pricing_description' ) ); ?>
					</p>
				</div>
				<div class="row pricing-card-row">
					<?php if ( have_rows( 'our_pricing_card' ) ) : ?>
						<?php while ( have_rows( 'our_pricing_card' ) ) : ?>
							<?php the_row(); ?>
							<?php
							$pricing_detail = array(
								'IN' => get_sub_field( 'pricing_card_price_numbers' ),
								'US' => get_sub_field( 'pricing_card_price_numbers_us' ),
							);
							$pricing_detail_del = array(
								'IN' => get_sub_field( 'pricing_card_price_strick-number' ),
								'US' => get_sub_field( 'pricing_card_price_strick-number_us' ),
							);
							?>
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
								<div class="our-pricing__inner_column">
								<?php
								$pricing_card_discount_label = esc_html( get_sub_field( 'pricing_card_discount_label' ) );
								if ( ! empty( $pricing_card_discount_label ) ) :
									?>
									<div class="pricing-card__discount-label">
									<img src="<?php echo esc_url( get_sub_field( 'pricing_card_discount_label_gif' ) ); ?>"
										alt="<?php esc_attr_e( 'pricing card discount label', 'awm' ); ?>" width="25" height="25"
										loading="lazy" />
										<p><?php echo esc_html( $pricing_card_discount_label ); ?></p>
									</div>
								<?php endif; ?>
								<?php
								$pricing_card_label = esc_html( get_sub_field( 'pricing_card_label' ) );
								if ( ! empty( $pricing_card_label ) ) :
									?>
									<p class="pricing-card__label"><?php echo esc_html( $pricing_card_label ); ?></p>
								<?php endif; ?>
									<div class="pricing-card__heading">
										<img src="<?php echo esc_url( get_sub_field( 'pricing_card_heading_image' ) ); ?>" alt="Our Prising Card Related Gif" width="50" height="50" loading="lazy"/>
										<div class="pricing-card__heading_title">
											<span class="description-primary"><?php echo esc_html( get_sub_field( 'pricing_card_heading_title' ) ); ?></span>
										<?php
										$pricing_card_heading_label = esc_html( get_sub_field( 'pricing_card_heading_label' ) );
										if ( ! empty( $pricing_card_heading_label ) ) :
											?>
											<span class="label"><?php echo esc_html( $pricing_card_heading_label ); ?></span>
										<?php endif; ?>
										</div>
										<p class="description-secondary">
											<?php echo esc_html( get_sub_field( 'pricing_card_heading_description' ) ); ?>
										</p>
									</div>
									<div class="pricing-card__price">
										<p class="description-primary pricing-card__price_del" data-pricing-del="<?php echo esc_attr( wp_json_encode( $pricing_detail_del ) ); ?>">
										</p>
										<h3 class="pricing-card__price_numbers" data-pricing="<?php echo esc_attr( wp_json_encode( $pricing_detail ) ); ?>"></h3>
											<span class="pricing-card__price_number-text">
												<?php echo wp_kses_post( get_sub_field( 'pricing_card_price_numbers_text' ) ); ?>
											</span>
										<hr/>
									</div>
									<a class="global-button pricing-card__btn" href="<?php echo esc_url( get_sub_field( 'pricing_card_button_url' ) . '?plan=' . urlencode( get_sub_field( 'pricing_card_heading_title' ) ) ); ?>">
										<?php echo esc_html( get_sub_field( 'pricing_card_button_text' ) ); ?>
									</a>
									<p class="description-secondary pricing-card__bottom-text">
										<?php
										$pricing_card_bottom_text = get_sub_field( 'pricing_card_bottom_text' );
										$current_day              = gmdate( 'j' );
										$month_to_display         = ( 15 >= $current_day ) ? gmdate( 'F' ) : gmdate( 'F', strtotime( '+1 month' ) );
										echo wp_kses(
											str_replace( '{{next_month}}', $month_to_display, $pricing_card_bottom_text ),
											array( 'span' => array() )
										);
										?>
									</p>
									<ul class="pricing-card__services">
										<?php if ( have_rows( 'pricing_card_services' ) ) : ?>
											<?php while ( have_rows( 'pricing_card_services' ) ) : ?>
												<?php the_row(); ?>
												<li>
													<i class="<?php echo esc_attr( get_sub_field( 'pricing_card_services_icon_class' ) ); ?>"></i>
													<span class="description-secondary">
														<?php echo esc_html( get_sub_field( 'pricing_card_services_item_text' ) ); ?>
													</span>
												</li>
											<?php endwhile; ?>
										<?php endif; ?>
									</ul>
									<div class="pricing-card__highlight-services">
										<i class="<?php echo esc_attr( get_sub_field( 'pricing_card_highlight_services_icon_class' ) ); ?>"></i>
										<p class="description-secondary"><?php echo esc_html( get_sub_field( 'pricing_card_highlight_services' ) ); ?></p>
									</div>
									<div class="pricing-card__details-btn">
										<p class="description-secondary"><?php echo esc_html( get_sub_field( 'pricing_card_more_services_show_button_text' ) ); ?></p>
										<img src="<?php echo esc_url( get_sub_field( 'pricing_card_more_services_show_button_gif' ) ); ?>" alt="Our Prising Card Show More Services Gif" width="20" height="20" loading="lazy"/>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
