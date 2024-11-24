<?php
/**
 * Template Name: Front Page Template
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Home Hero section start -->
<section class="home-hero-section common-padding ">
	<div class="background"></div>
	<div class="container p-0">
		<div class="home-hero-section__inner">
			<div class="row">
				<div class="col-lg-10 col-md-12 mx-auto col-12 bottom-border">
					<div class="home-hero-section__inner_subtitle">
						<span class="description-secondary">
							<img src="<?php echo esc_url( get_field( 'home_hero_section__sebtitle_image' ) ); ?>"
								alt="<?php echo esc_attr( get_field( 'home_hero_section_sebtitle_image_alt' ) ); ?>"
								width="59" height="28" />
							<?php echo esc_html( get_field( 'home_hero_section__sebtitle_text' ) ); ?>
						</span>
					</div>
					<div class="home-hero-section__inner_heading">
						<h1>
							<?php echo wp_kses_post( get_field( 'home_hero_section__heading' ) ); ?>
						</h1>
					</div>
					<div class="home-hero-section__inner_description ">
						<p class="description-primary">
							<?php echo wp_kses( get_field( 'home_hero_section__discription' ), array( 'span' => array() ) ); ?>
						</p>
					</div>
					<div class="home-hero-section__inner_button">
						<?php
						$button_icon = get_field( 'home_hero_section__button_icon' );
						$button_text = get_field( 'home_hero_section__button_text' );
						$button_url  = get_field( 'home_hero_section__button_url' );
						?>
						<?php if ( $button_text ) : ?>
							<a class="global-button first-button" href="<?php echo esc_url( $button_url ); ?>">
							<?php echo esc_html( $button_text ); ?>
								<?php if ( $button_icon ) : ?>
									<i class="<?php echo esc_attr( $button_icon ); ?>"></i>
								<?php endif; ?>
							</a>
						<?php endif; ?>
						<?php
						$button_two_icon = get_field( 'home_hero_section_button_two_icon' );
						$button_two_text = get_field( 'home_hero_section_button_two_text' );
						$button_two_url  = get_field( 'home_hero_section_button_two_url' );
						?>
						<?php if ( $button_two_text ) : ?>
							<a class="global-button second-button" href="<?php echo esc_url( $button_two_url ); ?>">
								<?php echo esc_html( $button_two_text ); ?>
								<?php if ( $button_two_icon ) : ?>
									<i class="<?php echo esc_attr( $button_two_icon ); ?>"></i>
								<?php endif; ?>
							</a>
						<?php endif; ?>
					</div>
					<div class="home-hero-section__inner_bottom">
						<div class="home-hero-section__inner_bottom--box">
							<i class="<?php echo esc_html( get_field( 'home_hero_section__bottom_icon_one' ) ); ?>"></i>
							<p><?php echo esc_html( get_field( 'home_hero_section__bottom_text_one' ) ); ?></p>
						</div>
						<div class="home-hero-section__inner_bottom--box">
							<i class="<?php echo esc_html( get_field( 'home_hero_section__bottom_icon_two' ) ); ?>"></i>
							<p><?php echo esc_html( get_field( 'home_hero_section__bottom_text_two' ) ); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="home-hero-section__inner_image">
				<span><?php echo wp_kses_post( get_field( 'home_hero_section_bottom_image_quotes' ) ); ?></span>
				<div class="row">
					<div class="col-lg-10 col-md-12 mx-auto col-12">
					<img src="<?php echo esc_url( get_field( 'home_hero_section_bottom_image' ) ); ?>" srcset="<?php echo esc_url( get_field( 'home_hero_section_bottom_image_small' ) ); ?> 320w, <?php echo esc_url( get_field( 'home_hero_section_bottom_image' ) ); ?> 1024w"
						sizes="(max-width: 600px) 320px, (max-width: 1024px) 640px, 1024px"
						alt="<?php echo esc_html( get_field( 'home_hero_section_bottom_image_alt' ) ); ?>"
						width="946"
						height="617" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Home Hero section end -->

<!--Our Solution Home Section Start-->
<?php echo do_shortcode( '[our_solution_home_section]' ); ?>
<!--Our Solution Home Section End-->

<!--How we work Section Start-->
<?php echo do_shortcode( '[we_work_section]' ); ?>
<!--How we work Section End-->

<!-- Our Process section start -->
<?php echo do_shortcode( '[our_process_section]' ); ?>
<!-- Our Process section end -->

<!-- call to action section start -->
<?php echo do_shortcode( '[call_to_action_section]' ); ?>
<!-- call to action section end -->

<!-- Our Pricing section Start -->
<?php echo do_shortcode( '[our_pricing_section]' ); ?>
<!-- Our Pricing section End -->

<!-- Pricing call to action section Start -->
<?php echo do_shortcode( '[pricing_call_to_action]' ); ?>
<!-- Pricing call to action section End -->

<!-- Improvement section start -->
<?php echo do_shortcode( '[improvement_section]' ); ?>
<!-- Improvement section End -->

<!--Testimonials Section Start-->
<?php echo do_shortcode( '[testimonials_section]' ); ?>
<!--Testimonials Section End-->

<!-- contact section Start -->
<?php echo do_shortcode( '[contact_section]' ); ?>
<!-- contact section End -->

<!-- about section start -->
<?php echo do_shortcode( '[about_section]' ); ?>
<!-- about section end -->

<!-- FAQS Section Start -->
<?php echo do_shortcode( '[faq_section]' ); ?>
<!-- FaQS Section End -->

<!-- Call To Action Section V2 Start -->
<?php echo do_shortcode( '[call_to_action_v2_section]' ); ?>
<!-- Call To Action Section V2 End -->

<!-- Popup start -->
<section class="popup" id="popup">
	<div class="container p-0">
		<div class="popup__inner">
			<div class="row">
				<div class="col-lg-5 col-12">
					<div class="popup__img">
						<img src="<?php echo esc_url( get_field( 'popup_img' ) ); ?>"
							alt="<?php echo esc_attr( get_field( 'popup_img_alt' ) ); ?>" width="360" height="542" />
					</div>
				</div>
				<div class="col-lg-7 col-12">
					<div class="popup__content">
						<i class="fa-solid fa-x" id="popup-close"></i>
						<h3>
							<?php echo wp_kses_post( get_field( 'popup_heading' ) ); ?>
						</h3>
						<p class="description-primary">
							<?php echo wp_kses_post( get_field( 'popup_description' ) ); ?>
						</p>
					</div>
					<div class="popup_form-input">
						<?php echo do_shortcode( get_field( 'popup_form_shortcode' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Popup End -->

<?php get_footer(); ?>
