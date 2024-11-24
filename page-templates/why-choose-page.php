<?php
/**
 * Template Name: Why Choose Template
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Why Choose Banner section start -->
<section id="why-choose-banner">
	<div class="why-choose-banner <?php echo esc_attr( get_field( 'why_choose_banner_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="why-choose-banner__inner">
				<div class="why-choose-banner__inner_heading">
					<div class="why-choose-banner__inner_heading--subtitle">
						<p><?php echo wp_kses_post( get_field( 'why_choose_banner_subtitle_text' ) ); ?></p>
					</div>
					<h1><?php echo wp_kses_post( get_field( 'why_choose_banner_title' ) ); ?></h1>
					<p class="why-choose-banner__inner_heading--description description-primary">
						<?php echo wp_kses_post( get_field( 'why_choose_banner_description' ) ); ?>
					</p>
					<div class="why-choose-banner__inner_heading--btn">
						<a class="global-button why-choose-banner__inner_heading--btn-first"
							href="<?php echo esc_url( get_field( 'why_choose_banner_first_button_url' ) ); ?>"
							data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
							<?php echo esc_html( get_field( 'why_choose_banner_first_button_text' ) ); ?>
						</a>
						<a class="global-button why-choose-banner__inner_heading--btn-second"
							href="<?php echo esc_url( get_field( 'why_choose_banner_second_button_url' ) ); ?>"
							target="_self">
							<?php echo esc_html( get_field( 'why_choose_banner_second_button_text' ) ); ?>
						</a>
					</div>
				</div>
				<div class="why-choose-banner__inner_img">
					<img
						srcset="<?php echo esc_url( get_field( 'why_choose_banner_bottom_image' ) ); ?> 320w, <?php echo esc_url( get_field( 'why_choose_banner_bottom_image' ) ); ?> 1024w"
						sizes="(max-width: 600px) 320px, (max-width: 1024px) 640px, 1024px"
						alt="Why Choose Banner Bottom Image"
						width="1140"
						height="336"
						loading="lazy"
					/>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Why Choose Banner section end -->

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

<!--Our Solution Home Section Start-->
<?php echo do_shortcode( '[our_solution_home_section]' ); ?>
<!--Our Solution Home Section End-->    

<!-- Website Maintenance section start -->
<section id="website-maintenance">
	<div class="website-maintenance <?php echo esc_attr( get_field( 'website-maintenance_padding_class' ) ); ?>">
		<div class="container p-0">
			<div class="website-maintenance__inner">
				<div class="website-maintenance__inner_subtitle">
					<div class="improvement-section__inner_subtitle-icon">
						<i class="<?php echo esc_html( get_field( 'website-maintenance_subtitle_icon' ) ); ?>"></i>
					</div>
					<div class="website-maintenance__inner_subtitle-text">
						<p class="description-secondary">
							<?php echo esc_html( get_field( 'website-maintenance_subtitle_text' ) ); ?>
						</p>
					</div>
				</div>
				<div class="website-maintenance__inner_heading">
					<h2><?php echo wp_kses_post( get_field( 'website_maintenance_heading' ) ); ?></h2>
				</div>
			</div>
			<div class="website-maintenance__bottom">
				<div class="row g-5">
					<div class="col-lg-6 col-md-6">
						<div class="website-maintenance__bottom_box">
							<h3>
								<?php echo esc_html( get_field( 'one_box_heading' ) ); ?>
							</h3>
							<ul>
								<?php
								if ( have_rows( 'one_box_lists' ) ) :
									while ( have_rows( 'one_box_lists' ) ) :
										the_row();
										$one_box_list_item = get_sub_field( 'one_box_list' );
										?>
										<li class="description-secondary">
											<i class="<?php echo esc_attr( get_field( 'first_box_icon_class_name' ) ); ?>"></i>
											<?php echo esc_html( $one_box_list_item ); ?>
										</li>
										<?php
									endwhile;
								endif;
								?>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="website-maintenance__bottom_box second-box">
							<?php
							$second_box_image = get_field( 'second_box_image' );
							$image_url        = esc_url( $second_box_image['url'] );
							$alt_text         = esc_attr( $second_box_image['alt'] );
							?>
							<div class="website-maintenance__bottom_box--image">
								<img src="<?php echo $image_url; ?>" alt="<?php echo $alt_text; ?>" width="195"
									height="42" loading="lazy">
							</div>
							<ul>
								<?php
								if ( have_rows( 'second_box_lists' ) ) :
									while ( have_rows( 'second_box_lists' ) ) :
										the_row();
										$second_box_list_item = get_sub_field( 'second_box_list' );
										?>
										<li class="description-secondary">
											<i class="<?php echo esc_attr( get_field( 'second_box_icon_class_name' ) ); ?>"></i>
											<?php echo esc_html( $second_box_list_item ); ?>
										</li>
										<?php
									endwhile;
								endif;
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Website Maintenance section end -->

<!-- Content Section start -->
<section id="content-section">
	<div class="content-section <?php echo esc_attr( get_field( 'content_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="content-section__inner">
				<div class="content-section__inner_heading">
					<h2>
						<?php echo wp_kses_post( get_field( 'content_section_heading' ) ); ?>
					</h2>
					<p class="description-secondary">
						<?php echo esc_html( get_field( 'content_section_content' ) ); ?>
					</p>
				</div>
				<div class="row">
					<?php if ( have_rows( 'content_section_box' ) ) : ?>
						<?php while ( have_rows( 'content_section_box' ) ) : ?>
							<?php the_row(); ?>
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="content-section__inner_box">
									<div class="content-section__inner_box--heading">
										<i class="icon-small-size <?php echo esc_attr( get_sub_field( 'content_section_box_icon_class' ) ); ?>"></i>
										<h3 class="description-primary"><?php echo esc_html( get_sub_field( 'content_section_box_heading' ) ); ?></h3>
									</div>
									<p>
										<?php echo wp_kses_post( get_sub_field( 'content_section_box_description' ) ); ?>
									</p>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="content-section__inner_button">
					<a href="<?php echo esc_url( get_field( 'content-section-button-url' ) ); ?>">
						<?php echo esc_html( get_field( 'content-section-button-text' ) ); ?>
						<i class="<?php echo esc_attr( get_field( 'content-section-button-icon' ) ); ?>"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Content Section End -->

<!-- Progress section V2 start -->
<section id="progress-section">
	<div class="progress-section <?php echo esc_attr( get_field( 'progress_section_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="progress-section__inner">
				<div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12 mx-auto">
						<div class="progress-section__inner_content">
							<div class="progress-section__inner_content--heading">
								<div class="progress-section__inner_content--heading-subtitle">
									<i class="<?php echo esc_html( get_field( 'progress_section_subtitle_icon_class' ) ); ?>"></i>
									<p class="description-secondary"><?php echo esc_html( get_field( 'progress_section_subtitle_text' ) ); ?></p>
								</div>
								<h2><?php echo wp_kses_post( get_field( 'progress_section_title' ) ); ?></h2>
								<p class="description-primary"><?php echo esc_html( get_field( 'progress_section_description' ) ); ?></p>
							</div>
							<div class="progress-section__inner_content--row">
								<?php if ( have_rows( 'progress_section_box' ) ) : ?>
									<?php while ( have_rows( 'progress_section_box' ) ) : ?> 
										<?php the_row(); ?>
										<div class="progress-section__inner_content--row-box">
											<i class="<?php echo esc_html( get_sub_field( 'progress_section_box_icon_class' ) ); ?>"></i>
											<p class="description-secondary"><?php echo esc_html( get_sub_field( 'progress_section_box_description' ) ); ?></p>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>	
							</div>
						</div>
					</div>
					<div class="progress-section__inner_img">
						<span><?php echo wp_kses_post( get_field( 'progress_section_image_quotes' ) ); ?></span>
						<div class="row">
							<div class="col-lg-10 col-md-12 mx-auto col-12">
								<?php
								$small_image = esc_url( get_field( 'progress_section_image_small' ) );
								$alt_text    = esc_html( get_field( 'progress_section_image_alt_text' ) );
								?>
								<img src="<?php echo $small_image; ?>" alt="<?php echo $alt_text; ?>" loading="lazy"
									width="946" height="617" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Progress section V2 End -->

<!-- Why Choose Key Benefits Section start -->
<section id="key-benefits">
	<div class="key-benefits <?php echo esc_attr( get_field( 'key_benefits_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="key-benefits__inner">
				<div class="row">
					<div class="col-lg-7">
						<div class="key-benefits__inner_content">
							<div class="key-benefits__inner_content--heading">
								<div class="key-benefits__inner_content--heading-subtitle">
									<i class="<?php echo esc_html( get_field( 'key_benefits_subtitle_icon_class' ) ); ?>"></i>
									<p class="description-secondary"><?php echo esc_html( get_field( 'key_benefits_subtitle_text' ) ); ?></p>
								</div>
								<h2><?php echo wp_kses_post( get_field( 'key_benefits_title' ) ); ?></h2>
							</div>
							<div class="key-benefits__inner_content--loop">
								<?php if ( have_rows( 'key_benefits_box' ) ) : ?>
									<?php while ( have_rows( 'key_benefits_box' ) ) : ?>
										<?php the_row(); ?>
										<div class="key-benefits__inner_content--loop-box">
											<div class="key-benefits__inner_content--loop-box-heading">
												<span><?php echo esc_html( get_sub_field( 'key_benefits_box_number' ) ); ?></span>
												<h3><?php echo esc_html( get_sub_field( 'key_benefits_box_heading_text' ) ); ?>
												</h3>
											</div>
											<p class="description-secondary">
												<?php echo esc_html( get_sub_field( 'key_benefits_box_description' ) ); ?>
											</p>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="key-benefits__inner_img">
							<img src="<?php echo esc_url( get_field( 'key_benefits_image' ) ); ?>"
								alt="Key Benefits section Image" width="445" height="415" loading="lazy" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Why Choose Key Benefits Section end -->

<!-- FAQS Section Start -->
<?php echo do_shortcode( '[faq_section]' ); ?>
<!-- FaQS Section End -->

<!-- Call To Action Section V2 Start -->
<?php echo do_shortcode( '[call_to_action_v2_section]' ); ?>
<!-- Call To Action Section V2 End -->


<?php get_footer(); ?>
