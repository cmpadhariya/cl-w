<?php
/**
 *
 * This is a custom template for the "improvement" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="why-awm">
	<div class="improvement-section <?php echo esc_attr( get_field( 'improvement_padding_class' ) ); ?>">
		<div class="container p-0">
			<div class="improvement-section__inner">
				<div class="row">
					<div class="col-xl-5 col-lg-6 col-12">
						<div class="improvement-section__inner_sticky-content">
							<div class="improvement-section__inner_subtitle section-subtitle">
								<div class="improvement-section__inner_subtitle-icon">
									<i class="<?php echo esc_attr( get_field( 'improvement_subtitle_icon' ) ); ?>"></i>
								</div>
								<div class="improvement-section__inner_subtitle-text">
									<p class="description-secondary">
										<?php echo esc_html( get_field( 'improvement_subtitle_text' ) ); ?>
									</p>
								</div>
							</div>
							<div class="improvement-section__inner_heading">
								<h2><?php echo esc_html( get_field( 'improvement_heading' ) ); ?></h2>
							</div>
							<div class="improvement-section__inner_description">
								<p class="description-primary">
									<?php echo esc_html( get_field( 'improvement_description' ) ); ?>
								</p>
							</div>
							<div class="improvement-section__inner_list">
							<?php if ( have_rows( 'improvement_list' ) ) : ?>
								<?php while ( have_rows( 'improvement_list' ) ) : ?>
									<?php the_row(); ?>
									<div class="improvement-section__inner_list-content">
										<i class="<?php echo esc_html( get_sub_field( 'improvement_list_icon' ) ); ?>"></i>
										<p class="description-secondary">
											<?php echo esc_html( get_sub_field( 'improvement_list_text' ) ); ?>
										</p>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-1"></div>
					<div class="col-lg-6 col-12">
					<?php if ( have_rows( 'improvement_suggestion' ) ) : ?>
						<?php while ( have_rows( 'improvement_suggestion' ) ) : ?>
							<?php the_row(); ?>
							<div class="improvement-section__inner_suggestion">
								<div class="improvement-section__inner_suggestion-icon">
									<i class="<?php echo esc_html( get_sub_field( 'improvement_suggestion_icon' ) ); ?>"></i>
									<h3><?php echo esc_html( get_sub_field( 'improvement_suggestion_heading' ) ); ?></h3>
								</div>
								<div class="improvement-section__inner_suggestion-description">
									<p class="description-secondary">
										<?php echo esc_html( get_sub_field( 'improvement_suggestion_description' ) ); ?>
									</p>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
</section>

