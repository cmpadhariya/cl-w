<?php
/**
 *
 * This is a custom template for the "about" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="about-us">
	<div class="about-us <?php echo esc_attr( get_field( 'about_padding_class' ) ); ?>">
		<div class="container p-0">
			<div class="about-us__inner">
				<div class="row">
					<div class="col col-lg-6">
						<div class="about-us__inner_subtitle section-subtitle">
							<div class="about-us__inner_subtitle-icon">
								<i class="<?php echo esc_html( get_field( 'about_subtitle_icon' ) ); ?>"></i>
							</div>
							<div class="about-us__inner_subtitle-text">
								<p class="description-secondary">
									<?php echo esc_html( get_field( 'about_subtitle_text' ) ); ?></p>
							</div>
						</div>
						<div class="about-us__inner_heading">
							<h2><?php echo esc_html( get_field( 'about_heading' ) ); ?></h2>
						</div>
						<div class="about-us__inner_description">
							<p class="description-primary">
								<?php echo esc_html( get_field( 'about_description' ) ); ?>
							</p>
						</div>
						<div class="about-us__inner_button">
							<a href="<?php echo esc_url( get_field( 'about_button_link' ) ); ?>" class="global-button"
								target="_self">
								<i class="<?php echo esc_attr( get_field( 'about_button_icon' ) ); ?>"></i>
								<?php echo esc_html( get_field( 'about_button_text' ) ); ?>
							</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-us__inner_box">
							<div class="about-us__inner_box-logo">
								<img src="<?php echo esc_url( get_field( 'about_logo' ) ); ?>" alt="Qrolic" width="123"
									height="40" loading="lazy" />
								<p class="description-primary">
									<?php echo esc_html( the_field( 'about_box_heading' ) ); ?></p>
							</div>
							<div class="about-us__inner_box-list">
								<?php if ( have_rows( 'about_list' ) ) : ?>
									<?php while ( have_rows( 'about_list' ) ) : ?> 
										<?php the_row(); ?>
										<div class="about-us__inner_box-list-content">
											<img src="<?php echo esc_url( get_sub_field( 'about_list_icon' ) ); ?>"
												alt="Qrolic Information" width="54" height="55" loading="lazy" />
											<p class="description-secondary">
												<?php echo esc_html( get_sub_field( 'about_list_description' ) ); ?>
											</p>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
