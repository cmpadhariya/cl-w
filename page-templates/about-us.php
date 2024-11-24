<?php
/**
 * Template Name: About Us Template
 *
 * @package WordPress
 * @subpackage AWM
 *
 */
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Abour hero section start -->
<section id="about-hero">
	<div class="why-choose-banner about-hero <?php echo esc_attr( get_field( 'why_choose_banner_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="why-choose-banner__inner">
				<div  class="row">
					<div class="col-lg-10 col-md-12 col-12 custom-gap">
						<div class="why-choose-banner__inner_heading">
							<h1><?php echo wp_kses_post( get_field( 'why_choose_banner_title' ) ); ?></h1>
							<p class="why-choose-banner__inner_heading--description description-primary">
								<?php echo wp_kses_post( get_field( 'why_choose_banner_description' ) ); ?>
							</p>
						</div>
						<div class="why-choose-banner__inner_img">
							<img
								srcset="<?php echo esc_url( get_field( 'why_choose_banner_bottom_image' ) ); ?> 320w, <?php echo esc_url( get_field( 'why_choose_banner_bottom_image' ) ); ?> 1024w"
								sizes="(max-width: 600px) 320px, (max-width: 1024px) 640px, 1024px"
								alt="<?php echo esc_html( get_field( 'why_choose_banner_bottom_image_alt' ) ); ?>"
								width="950"
								height="628"
								loading="lazy"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Abour hero section end -->

<!-- Our Mission Section Start -->
<section id="our-mission">
	<div class="our-mission <?php echo esc_attr( get_field( 'our_mission_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="our-mission__inner">
				<div class="our-mission__top">
					<div class="our-mission__top_subtitle">
						<i class="<?php echo esc_html( get_field( 'our_mission_section_subtitle_icon_class' ) ); ?>"></i>
						<p class="description-secondary"><?php echo esc_html( get_field( 'our_mission_section_subtitle_text' ) ); ?></p>
					</div>
					<h2><?php echo wp_kses_post( get_field( 'our_mission_section_title' ) ); ?></h2>
				</div>
				<div class="our-mission__content">
					<span class="description-primary"><?php echo esc_html( get_field( 'our_mission_section_box_text' ) ); ?></span>
					<div class="row">
						<?php
						if ( have_rows( 'our_mission_section_box' ) ) :
							?>
							<?php
							while ( have_rows( 'our_mission_section_box' ) ) :
								?>
								<?php the_row(); ?>
								<div class="col-lg-5 col-md-6 col-10">
									<div class="our-mission__content_box">
										<h3><?php echo esc_html( get_sub_field( 'our_mission_section_box_percentage' ) ); ?></h3>
										<p class="description-primary"><?php echo esc_html( get_sub_field( 'our_mission_section_box_description' ) ); ?></p>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
				<hr />
				<div class="our-mission__bottom">
					<p><?php echo esc_html( get_field( 'our_mission_section_bottom_text' ) ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Our Mission Section End -->

<!-- Problem Section Start -->
<section id="problem">
	<div class="problem <?php echo esc_attr( get_field( 'problem_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="problem__inner">
				<div class="problem__top">
					<div class="problem__top_subtitle">
						<i class="<?php echo esc_html( get_field( 'problem_section_subtitle_icon_class' ) ); ?>"></i>
						<p class="description-secondary"><?php echo esc_html( get_field( 'problem_section_subtitle_text' ) ); ?></p>
					</div>
					<h2><?php echo wp_kses_post( get_field( 'problem_section_title' ) ); ?></h2>
				</div>
				<div class="problem__content">
					<span class="description-primary"><?php echo wp_kses_post( get_field( 'problem_section_box_text' ) ); ?></span>
					<div class="row">
						<div class="col-lg-9 col-md-12 col-12 custom-gap">
							<?php
							if ( have_rows( 'problem_section_box' ) ) :
								?>
								<?php
								while ( have_rows( 'problem_section_box' ) ) :
									?>
									<?php the_row(); ?>
										<div class="problem__content_box">
											<i class="<?php echo esc_html( get_sub_field( 'problem_section_box_icon_class' ) ); ?>"></i>
											<p><?php echo wp_kses_post( get_sub_field( 'problem_section_box_description' ) ); ?></p>
										</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Problem Section End -->

<!-- Our Solution About Section Start -->
<section id="our-solution-about">
	<div class="our-solution-about <?php echo esc_attr( get_field( 'our_solution_about_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="row">
				<div class="col-lg-9 col-md-12 col-12">
					<div class="our-solution-about__inner">
						<div class="our-solution-about__inner_top">
							<h2><?php echo wp_kses_post( get_field( 'our_solution_about_section_title' ) ); ?></h2>
							<p class="description-primary"><?php echo esc_html( get_field( 'our_solution_about_section_description' ) ); ?></p>
						</div>
						<img src="<?php echo esc_url( get_field( 'our_solution_about_section_image' ) ); ?>" alt="<?php echo esc_html( get_field( 'our_solution_about_section_image_alt' ) ); ?>" loading="lazy" width="244" height="73" />
						<div class="our-solution-about__inner_description description-primary">
							<?php echo wp_kses_post( get_field( 'our_solution_about_section_bottom_description' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Our Solution About Section End -->

<!-- Our Success Section Start -->
<section id="our-success">
	<div class="our-process our-success <?php echo esc_attr( get_field( 'our_process_section_padding_class' ) ); ?>">
		<div class="container p-0">
			<div class="our-process__inner our-success__inner">
				<div class="our-process__inner_heading our-success__inner_heading">
					<h2><?php echo wp_kses_post( get_field( 'our_process_heading' ) ); ?></h2>
					<p class="description-primary"><?php echo wp_kses_post( get_field( 'our_process_description' ) ); ?>
					</p>
				</div>
				<div class="our-process__inner_box our-success__inner_box">
					<div class="row">
						<?php if ( have_rows( 'our_process_lists' ) ) : ?>
							<?php while ( have_rows( 'our_process_lists' ) ) : ?>
								<?php the_row(); ?>
								<div class="col-lg-4 col-md-6 col-sm-6 col-12">
									<div class="our-process__inner_box-list our-success__inner_box-list">
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
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Our Success Section End -->

<!-- Our Company Section Start -->
<section id="our-company">
	<div class="our-company <?php echo esc_attr( get_field( 'our_company_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="our-company__inner">
				<div class="our-company__top">
					<div class="our-company__top_subtitle">
						<i class="<?php echo esc_html( get_field( 'our_company_section_subtitle_icon_class' ) ); ?>"></i>
						<p class="description-secondary"><?php echo esc_html( get_field( 'our_company_section_subtitle_text' ) ); ?></p>
					</div>
					<h2><?php echo wp_kses_post( get_field( 'our_company_section_title' ) ); ?></h2>
				</div>
				<div class="row">
					<div class="col-lg-9 col-md-12 col-12 custom-gap">
						<div class="our-company__content">
							<p  class="description-secondary"><?php echo wp_kses_post( get_field( 'our_company_section_content_description' ) ); ?></p>
							<div class="our-company__content_bottom">
								<img src="<?php echo esc_url( get_field( 'our_company_section_content_image' ) ); ?>" alt="<?php echo esc_html( get_field( 'our_company_section_content_image_alt' ) ); ?>" width="147" height="40" loading="lazy">
								<hr>
								<span class="description-secondary"><?php echo wp_kses_post( get_field( 'our_company_section_content_bottom_text' ) ); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Our Company Section End -->

<!-- FAQS Section Start -->
<?php echo do_shortcode( '[faq_section]' ); ?>
<!-- FaQS Section End -->

<!-- Call To Action Section V2 Start -->
<?php echo do_shortcode( '[call_to_action_v2_section]' ); ?>
<!-- Call To Action Section V2 End -->


<?php get_footer(); ?>
