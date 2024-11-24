<?php
/**
 *
 * This is a custom template for the "contact" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="contact">
	<div class="contact-section <?php echo esc_attr( get_field( 'contact_padding_class' ) ); ?>">
		<div class="container p-0">
			<div class="contact-section__inner">
				<div class="row">
					<div class="col-lg-7 col-12">
						<div class="contact-section__inner_heading">
							<img src="<?php echo esc_url( get_field( 'conatct_subtitle_icon' ) ); ?>"
							alt="<?php esc_attr_e( 'contact us', 'awm' ); ?>" width="47" height="47" loading="lazy" />
							<h2><?php echo esc_html( get_field( 'contact_heading' ) ); ?></h2>
						</div>
						<div class="contact-section__inner_description">
							<p class="description-primary"><?php echo wp_kses_post( get_field( 'contact_description' ) ); ?>
							</p>
						</div>
						<div class="contact-section__inner_form" id="contact-form">
							<div class="contact-section__inner_form-heading">
								<p><?php echo esc_html( get_field( 'contact_form_heading' ) ); ?></p>
								<img src="<?php echo esc_url( get_field( 'contact_form_heading_icon' ) ); ?>"
									alt="<?php esc_attr_e( 'contact form icon', 'awm' ); ?>" width="30" height="30" loading="lazy" />
							</div>
							<div class="contact-section__inner_form-description">
								<p class="description-primary">
									<?php echo esc_html( get_field( 'contact_form_description' ) ); ?></p>
							</div>
							<div class="contact-section__inner_form-input">
								<?php echo do_shortcode( get_field( 'contact_form_shortcode' ) ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="contact-section__inner_form-last--description">
					<p><?php echo wp_kses_post( get_field( 'contact_form_last_description' ) ); ?></p>
					<div class="row">
						<?php if ( have_rows( 'form_after_journey' ) ) : ?>
							<?php while ( have_rows( 'form_after_journey' ) ) : ?> 
								<?php the_row(); ?>
								<div class="col-lg-3 col-md-6 col-sm-6 col-12">
									<div class="contact-section__inner_journey">
										<i class="<?php echo esc_html( get_sub_field( 'form_after_journey_icon' ) ); ?>"></i>
										<h3 class="description-secondary"><?php echo esc_html( get_sub_field( 'form_after_journey_heading' ) ); ?></h3>
										<p class="description-secondary"><?php echo wp_kses_post( get_sub_field( 'form_after_journey_description' ) ); ?></p>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>