<?php
/**
 *
 * This is a custom template for the "Our Solution home" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="our-solution">
	<div class="why-choose-solution our-solution-home <?php echo esc_attr( get_field( 'home_our_solution_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="why-choose-solution__inner">
				<div class="why-choose-solution__inner_heading">
					<div class="why-choose-solution__inner_heading--subtitle">
						<i class="<?php echo esc_html( get_field( 'home_our_solution_section_subtitle_icon_class' ) ); ?>"></i>
						<p class="description-secondary"><?php echo esc_html( get_field( 'home_our_solution_section_subtitle_text' ) ); ?></p>
					</div>
					<div class="why-choose-solution__inner_heading--title">
						<h2><?php echo wp_kses_post( get_field( 'home_our_solution_section_title' ) ); ?></h2>
						<div class="inner-title_container">
							<span class="description-secondary inner-title"><?php echo esc_html( get_field( 'home_our_solution_section_title_inner_title' ) ); ?></span>
						</div>
					</div>
					<p class="why-choose-solution__inner_heading--description description-primary">
						<?php echo wp_kses_post( get_field( 'home_our_solution_section_description' ) ); ?>
					</p>
				</div>
				<div class="row">
					<?php if ( have_rows( 'home_our_solution_section_box' ) ) : ?>
						<?php while ( have_rows( 'home_our_solution_section_box' ) ) : ?>
							<?php the_row(); ?>
							<div class="col-lg-2 col-md-3 col-sm-4 col-12">
								<div class="why-choose-solution__inner_box">
									<div class="why-choose-solution__inner_box--heading">
										<i
											class="<?php echo esc_html( get_sub_field( 'home_our_solution_section_box_icon_class' ) ); ?>"></i>
										<h3><?php echo esc_html( get_sub_field( 'home_our_solution_section_box_title' ) ); ?>
										</h3>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="why-choose-solution__inner_btn">
					<a href="<?php echo esc_url( get_field( 'home_our_solution_section_button_url' ) ); ?>"
						class="global-button">
						<?php echo esc_html( get_field( 'home_our_solution_section_button_text' ) ); ?>
						<img src="<?php echo esc_url( get_field( 'home_our_solution_section_button_gif' ) ); ?>"
							alt="Why Choose Solution Arrow Image" width="15" height="15" loading="lazy" />
					</a>
					<p class="description-primary">
						<?php echo wp_kses_post( get_field( 'home_our_solution_section_bottom_text_with_span' ) ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
