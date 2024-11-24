<?php
/**
 *
 * This is a custom template for the "our process" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="how-it-works">
	<div class="our-process <?php echo esc_attr( get_field( 'our_process_section_padding_class' ) ); ?>">
		<div class="container p-0">
			<div class="our-process__inner">
				<div class="our-process__inner_subtitle">
					<div class="our-process__inner_subtitle-icon">
						<i class="<?php echo esc_html( get_field( 'our_process_subtitle_icon_class' ) ); ?>"></i>
					</div>
					<div class="our-process__inner_subtitle-text">
						<p class="description-secondary"><?php echo esc_html( get_field( 'our_process_subtitle' ) ); ?>
						</p>
					</div>
				</div>
				<div class="our-process__inner_heading">
					<h2><?php echo wp_kses_post( get_field( 'our_process_heading' ) ); ?></h2>
					<p class="description-primary"><?php echo wp_kses_post( get_field( 'our_process_description' ) ); ?>
					</p>
				</div>
				<div class="our-process__inner_box">
					<div class="row">
						<?php if ( have_rows( 'our_process_lists' ) ) : ?>
							<?php while ( have_rows( 'our_process_lists' ) ) : ?>
								<?php the_row(); ?>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="our-process__inner_box-list">
										<div class="process-list-number">
											<p>
												<?php echo esc_html( get_sub_field( 'process_number' ) ); ?>
											</p>
										</div>
										<div class="process-list-icon">
											<i class="<?php echo esc_html( get_sub_field( 'process_icon_class_name' ) ); ?>"></i>
										</div>
										<h3 class="description-secondary process-list-heading">
											<?php echo esc_html( get_sub_field( 'process_heading' ) ); ?>
										</h3>
										<p class="description-secondary process-list-description">
											<?php echo esc_html( get_sub_field( 'process_description' ) ); ?>
										</p>
									</div>
									<div class="line"></div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="our-process__inner_button">
					<a href="<?php echo esc_url( get_field( 'our_process_button_link' ) ); ?>" class="global-button">
						<?php echo esc_html( get_field( 'our_process_button_text' ) ); ?>
						<img src="<?php echo esc_url( get_field( 'our_process_section_button_gif' ) ); ?>"
							alt="Secure Your Spot Now to Get Started arrow gif" width="25" height="25" loading="lazy">
					</a>
				</div>
				<div class="our-process__inner_last-text">
					<p class="description-primary">
						<?php echo esc_html( get_field( 'our_process_last_text' ) ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
