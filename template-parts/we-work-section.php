<?php
/**
 *
 * This is a custom template for the "we work" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="how-we-can-help-you">
	<div class="we-work <?php esc_attr( the_field( 'we_work_section_padding_class' ) ); ?>">
		<div class="we-work__inner">
			<div class="container p-0">
				<div class="we-work__top">
					<h2><?php echo wp_kses_post( get_field( 'we_work_section_title' ) ); ?></h2>
					<p class="description-primary">
						<?php echo wp_kses( get_field( 'we_work_section_description' ), array( 'br' => array() ) ); ?></p>
				</div>
				<div class="we-work__content">
					<div class="row parent-row">
						<div class="col-lg-8 col-md-10 col-12">
							<div class="row">
								<?php if ( have_rows( 'work_box' ) ) : ?>
									<?php while ( have_rows( 'work_box' ) ) : ?> 
										<?php the_row(); ?>
											<div class="we-work__content_box">
												<i class="<?php echo esc_html( get_sub_field( 'work_box_icon' ) ); ?>"></i>
												<span><?php echo esc_html( get_sub_field( 'work_box_title' ) ); ?></span>
											</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="we-work__content_button">
						<a href="<?php echo esc_html( get_field( 'we_work_section_button_link' ) ); ?>" class="global-button" id="work-open-popup" target="_blank">
							<?php echo esc_html( get_field( 'we_work_section_button_text' ) ); ?>
							<img src="<?php echo esc_url( get_field( 'we_work_section_button_icon' ) ); ?>" alt="we work arrow gif" width="25" height="25" loading="lazy">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
