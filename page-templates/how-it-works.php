<?php
/**
 * Template Name: How It Works Template
 *
 * @package WordPress
 * @subpackage AWM
 */
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- How It Works Banner Section Start -->
<section id="how-it-work-banner" class="<?php echo esc_attr( get_field( 'how_it_work_banner_section_padding' ) ); ?>">
	<div class="how-it-work-banner">
		<div class="container p-0">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-12">
					<div class="how-it-work-banner__inner">
						<div class="how-it-work-banner__inner_subtitle">
							<span>
								<?php echo esc_html( get_field( 'how_it_works_banner_subtitle' ) ); ?>
							</span>
						</div>
						<div class="how-it-work-banner__inner_heading">
							<h1>
								<?php echo wp_kses_post( get_field( 'how_it_works_heading' ) ); ?>
							</h1>
						</div>
						<div class="how-it-work-banner__inner_description">
							<p class="description-primary">
								<?php echo esc_html( get_field( 'how_it_works_content' ) ); ?>
							</p>
						</div>
						<div class="how-it-work-banner__inner_button">
							<?php
							$button_one_text = get_field( 'how_it_works_banner_button_one_text' );
							$button_one_url  = get_field( 'how_it_works_banner_button_one_url' );
							$button_two_text = get_field( 'how_it_works_banner_button_two_text' );
							$button_two_url  = get_field( 'how_it_works_banner_button_two_url' );

							if ( $button_one_text && $button_one_url ) :
								?>
								<a href="<?php echo esc_url( $button_one_url ); ?>">
									<?php echo esc_html( $button_one_text ); ?>
									<div class="how-it-work-banner-button">
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/image/left-side-arrow.gif"
											width="15" height="15" alt="Left arrow for Get Started Now button">
									</div>
								</a>
							<?php endif; ?>

							<?php if ( $button_two_text && $button_two_url ) : ?>
								<a href="<?php echo esc_url( $button_two_url ); ?>" data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
									<?php echo esc_html( $button_two_text ); ?>
									<div class="how-it-work-banner-button">
										<i class="icon-right-small"></i>
									</div>
								</a>
							<?php endif; ?>
						</div>
						<div class="how-it-work-banner__inner_bottom">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/image/how-it-work-banner-bottom.webp"
								width="144" height="32" loading="lazy"
								alt="Many Peoples Upgrading Their Websites to AWM!">
							<p><?php echo esc_html( get_field( 'how_it_works_banner_bottom_text' ) ); ?></p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-12 col-12 image-end">
					<?php
					$image_array = get_field( 'how_it_works_banner_image' );
					if ( $image_array ) :
						?>
						<img src="<?php echo esc_url( $image_array['url'] ); ?>"
							alt="<?php echo esc_attr( $image_array['alt'] ); ?>" loading="lazy" class="img-fluid" width="470"
							height="380">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- How It Works Banner Section End -->

<!-- Our Process section V2 start -->
<section id="how-it-works-v2">
	<div class="our-process-v2 <?php echo esc_attr( get_field( 'our_process_v2_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="our-process-v2__inner">
				<div class="our-process-v2__inner_heading">
					<div class="our-process-v2__inner_heading--title">
						<div class="our-process-v2__inner_heading--title-subtitle">
							<i class="<?php echo esc_html( get_field( 'our_process_v2_subtitle_class' ) ); ?>"></i>
							<p class="description-secondary">
								<?php echo esc_html( get_field( 'our_process_v2_subtitle_text' ) ); ?>
							</p>
						</div>
						<h2><?php echo wp_kses_post( get_field( 'our_process_v2_title' ) ); ?></h2>
					</div>
					<p class="description-primary">
						<?php echo wp_kses_post( get_field( 'our_process_v2_description' ) ); ?>
					</p>
				</div>
				<div class="our-process-v2__inner_row">
					<?php if ( have_rows( 'our_process_v2_box' ) ) : ?>
						<?php $i = 1; ?>
						<?php $d = 1; ?>
						<?php while ( have_rows( 'our_process_v2_box' ) ) : ?>
							<?php the_row(); ?>
							<div class="our-process-v2__inner_row--box our-process-box-<?php echo esc_attr( $i++ ); ?>">
								<div class="our-process-v2__inner_row--box-top">
									<h3><?php echo esc_html( get_sub_field( 'our_process_v2_box_number' ) ); ?></h3>
									<i class="<?php echo esc_html( get_sub_field( 'our_process_v2_box_icon_class' ) ); ?>"></i>
								</div>
								<span><?php echo esc_html( get_sub_field( 'our_process_v2_box_title' ) ); ?></span>
								<p
									class="description-secondary our-process-v2__inner_row--box-description desc-<?php echo esc_attr( $d++ ); ?>">
									<?php echo wp_kses_post( get_sub_field( 'our_process_v2_box_description' ) ); ?>
								</p>
								<p class="description-secondary our-process-v2__inner_row--box-hover-description">
									<?php echo wp_kses_post( get_sub_field( 'our_process_v2_box_hover_description' ) ); ?>
								</p>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Our Process section V2 End -->

<!-- Planning Section start -->
<section id="planning-section">
	<div class="planning-section <?php echo esc_attr( get_field( 'planning_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="planning-section__inner">
				<div class="planning-section__inner_heading">
					<div class="planning-section__inner_heading--subtitle">
						<i class="<?php echo esc_html( get_field( 'planning_section_subtitle_icon_class' ) ); ?>"></i>
						<p class="description-secondary"><?php echo esc_html( get_field( 'planning_section_subtitle_text' ) ); ?></p>
					</div>
					<h2><?php echo wp_kses_post( get_field( 'planning_section_title' ) ); ?></h2>
					<p class="description-primary"><?php echo wp_kses_post( get_field( 'planning_section_description' ) ); ?></p>
				</div>
				<div class="row">
					<?php if ( have_rows( 'planning_section_box' ) ) : ?>
						<?php while ( have_rows( 'planning_section_box' ) ) : ?> 
							<?php the_row(); ?>
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="planning-section__inner_box">
									<h3 class="description-secondary"><?php echo esc_html( get_sub_field( 'planning_section_box_heading' ) ); ?></h3>
									<ul>
										<?php if ( have_rows( 'planning_section_box_list' ) ) : ?>
											<?php while ( have_rows( 'planning_section_box_list' ) ) : ?> 
												<?php the_row(); ?>
												<li class="description-secondary"><?php echo esc_html( get_sub_field( 'planning_section_box_list_items' ) ); ?></li>
											<?php endwhile; ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="planning-section__inner_btn">
					<a href="<?php echo esc_url( get_field( 'planning_section_button_url' ) ); ?>" class="global-button">
						<i class="<?php echo esc_html( get_field( 'planning_section_button_icon_class' ) ); ?>"></i>	
						<?php echo esc_html( get_field( 'planning_section_button_text' ) ); ?>
					</a>
					<p class="description-secondary"><?php echo esc_html( get_field( 'planning_section_bottom_description' ) ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Planning Section End -->

<!-- Pricing Call To Action Section Start -->
<?php echo do_shortcode( '[pricing_call_to_action]' ); ?>
<!-- Pricing Call To Action Section End -->

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

<!-- FAQS Section Start -->
<?php echo do_shortcode( '[faq_section]' ); ?>
<!-- FaQS Section End -->

<!-- Call To Action Section V2 Start -->
<?php
$pricing_detail = array(
	'IN' => get_field( 'call_to_action_section_v2_subtitle_text', 'option' ),
	'US' => get_field( 'call_to_action_section_v2_subtitle_text_with_us_price', 'option' ),
);
?>
<section id="call-to-action-v2">
	<div class="call-to-action-v2 <?php echo esc_attr( get_field( 'call_to_action_v2_section_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="call-to-action-v2__inner">
				<div class="call-to-action-v2__inner_background">
					<img src="<?php echo esc_url( get_field( 'call_to_action_section_v2_background_image', 'option' ) ); ?>"
						alt="call to action v2 background Image" width="100" height="100" loading="lazy" 
					/>
				</div>
				<div class="call-to-action-v2__inner_content">
					<div class="call-to-action-v2__inner_content--subtitle" data-pricing="<?php echo esc_attr( wp_json_encode( $pricing_detail ) ); ?>">
						<p><?php echo esc_html( $pricing_detail['IN'] ); ?></p>
					</div>
					<h2><?php echo wp_kses_post( get_field( 'call_to_action_v2_title', 'option' ) ); ?></h2>
					<p class="call-to-action-v2__inner_content--description description-primary">
						<?php echo wp_kses_post( get_field( 'call_to_action_section_v2_description', 'option' ) ); ?>
					</p>
					<a class="global-button" href="<?php echo esc_url( get_field( 'call_to_action_section_v2_button_url', 'option' ) ); ?>" data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
						<?php echo esc_html( get_field( 'call_to_action_section_v2_button_text', 'option' ) ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Call To Action Section V2 End -->

<?php get_footer(); ?>
