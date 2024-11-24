<?php
/**
 * Template Name: Contact Us Template
 *
 * @package WordPress
 * @subpackage AWM
 *
 */
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Contact Form V2 Section start -->
<?php echo do_shortcode( '[contact_section_v2]' ); ?>
<!-- Contact Form V2 Section end -->

<!-- Contact Page Call To Action Section Start -->
<section id="contact-call-to-action">
	<div class="contact-call-to-action <?php echo esc_attr( get_field( 'contact_page_call_to_action_section_class' ) ); ?>">
		<div class="container p-0">
			<div class="contact-call-to-action__inner">
				<img src="<?php echo esc_url( get_field( 'contact_page_call_to_action_section_image' ) ); ?>"
					alt="call to action v2 background Image" width="128" height="45" loading="lazy" 
				/>
				<h2><?php echo wp_kses_post( get_field( 'contact_page_call_to_action_section_title' ) ); ?></h2>
				<p class="contact-call-to-action__inner_description description-primary">
					<?php echo wp_kses_post( get_field( 'contact_page_call_to_action_section_description' ) ); ?>
				</p>
				<a class="global-button" href="<?php echo esc_url( get_field( 'contact_page_call_to_action_section_button_url' ) ); ?>" data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
					<?php echo esc_html( get_field( 'contact_page_call_to_action_section_button_text' ) ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- Contact Page Call To Action Section V2 End -->

<?php get_footer(); ?>
