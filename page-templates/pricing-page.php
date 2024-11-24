<?php
/**
 * Template Name: Pricing Page Template
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Our Pricing section Start -->
<?php echo do_shortcode( '[our_pricing_section]' ); ?>
<!-- Our Pricing section End -->

<!-- Pricing Content Section Start -->
<section id="pricing-content">
	<div class="pricing-content common-padding">
		<div class="container p-0">
			<div class="pricing-content__inner">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
<!-- Pricing Content Section End -->

<!-- Pricing Call To Action Section Start -->
<?php echo do_shortcode( '[pricing_call_to_action]' ); ?>
<!-- Pricing Call To Action Section End -->

<!-- FAQS Section Start -->
<?php echo do_shortcode( '[faq_section]' ); ?>
<!-- FAQS Section End -->

<!-- Call To Action Section V2 Start -->
<?php echo do_shortcode( '[call_to_action_v2_section]' ); ?>
<!-- Call To Action Section V2 End -->

<?php get_footer(); ?>