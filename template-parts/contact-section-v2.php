<?php
/**
 *
 * This is a custom template for the "contact-v2" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="contact-v2">
	<div class="contact-v2 <?php echo esc_attr( get_field( 'contact_form_v2_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="contact-v2__inner">
				<div class="row contact-v2__inner-row">
					<div class="col-xl-6 col-lg-5">
						<div class="contact-v2__inner_content">
							<div class="contact-v2__inner_heading">
								<div class="contact-v2__inner_heading--subtitle">
									<i class="<?php echo esc_html( get_field( 'contact_form_v2_section_subtitle_icon_class' ) ); ?>"></i>
									<p class="description-secondary"><?php echo esc_html( get_field( 'contact_form_v2_section_subtitle_text' ) ); ?></p>
								</div>
								<h1><?php echo wp_kses_post( get_field( 'contact_form_v2_section_title_text' ) ); ?></h1>
								<p class="contact-v2__inner_heading--description description-primary">
									<?php echo wp_kses_post( get_field( 'contact_form_v2_section_description_text' ) ); ?>
								</p>
							</div>
							<div class="contact-v2__inner_steps <?php echo esc_attr( get_field( 'contact_form_v2_section_steps_remove_class' ) ); ?>">
								<?php if ( have_rows( 'contact_form_v2_section_steps' ) ) : ?>
									<?php while ( have_rows( 'contact_form_v2_section_steps' ) ) : ?> 
										<?php the_row(); ?>
										<div class="contact-v2__inner_steps--box">
											<span class="description-secondary"><?php echo esc_html( get_sub_field( 'contact_form_v2_section_steps_number' ) ); ?></span>
											<p class="description-secondary"><?php echo wp_kses_post( get_sub_field( 'contact_form_v2_section_steps_heading' ) ); ?></p>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7">
						<div class="contact-v2__inner_form">
							<?php
							$contact_form_v2_subtitle = esc_html( get_field( 'contact_form_v2_section_form_subtitle_text' ) );
							if ( ! empty( $contact_form_v2_subtitle ) ) :
								?>
							<div class="contact-v2__inner_form--subtitle">
								<p><?php echo esc_html( $contact_form_v2_subtitle ); ?></p>
							</div>
							<?php endif; ?>
							<?php echo do_shortcode( get_field( 'contact_form_v2_section_form_shortcode' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>