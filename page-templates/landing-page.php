<?php
/**
 * Template Name: Landing Template
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Home Hero section start -->
<section class="home-hero-v2 common-padding">
	<div class="background"></div>
	<div class="container p-0">
		<div class="home-hero-v2__inner">
			<div class="row">
				<div class="col-lg-6 col-md-9 col-12 bottom-border">
					<div class="home-hero-v2__inner_subtitle description-secondary">
						<?php echo wp_kses_post( get_field( 'home_hero_v2_subtitle_text' ) ); ?>
					</div>
					<div class="home-hero-v2__inner_heading">
						<h1>
							<?php echo esc_html( get_field( 'home_hero_v2__heading' ) ); ?>
						</h1>
					</div>
					<div class="home-hero-v2__inner_description">
						<p class="description-primary">
							<?php echo wp_kses( get_field( 'home_hero_v2__description' ), array( 'span' => array() ) ); ?>
						</p>
					</div>
					<div class="home-hero-v2__inner_reviewer">
						<img src="<?php echo esc_url( get_field( 'home_hero_v2_reviewer_image' ) ); ?>"
							alt="<?php echo esc_attr( get_field( 'home_hero_v2_reviewer_image_alt' ) ); ?>" width="232"
							height="37" />
					</div>
					<div class="home-hero-v2__inner_bottom">
						<p><?php echo esc_html( get_field( 'home_hero_section__bottom_text' ) ); ?></p>
					</div>
				</div>
				<div class="col-1 p-0"></div>
				<div class="col-lg-5 col-md-9 col-12 bottom-border">
					<div class="home-hero-v2__inner_form">
						<h3><?php echo esc_html( get_field( 'home_hero_form_heading' ) ); ?></h3>
						<p class="description-secondary form-description">
							<?php echo wp_kses_post( get_field( 'hom_hero_form_description' ) ); ?>
						</p>
						<p><?php echo do_shortcode( get_field( 'home_hero_form_shortcode' ) ); ?></p>
						<p class="form-last-description">
							<?php echo esc_html( get_field( 'home_hero_form_last_description' ) ); ?>
						</p>
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

<?php get_footer(); ?>
