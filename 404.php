<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package AWM
 * @subpackage AWM
 */

get_header();
get_sidebar();
?>

<!-- Error page section Start -->
<section id="error-page">
	<div class="error-page section-padding">
		<div class="container p-0">
			<div class="row">
				<div class="col-lg-6 col-md-10 col-12">
					<div class="error-page__content">
						<h1><?php esc_html_e( 'Oops! Page Not Found ', 'awm' ); ?></h1>
						<p class="description-primary"><?php esc_html_e( 'Looks like the page you’re hunting for has gone off on an adventure… or maybe it never existed!', 'awm' ); ?></p>
						<a href="<?php echo esc_url( home_url() ); ?>" class="global-button">
							<i class="icon-back"></i><?php esc_html_e( 'Take Me Home!', 'awm' ); ?>
						</a>
						<span class="description-primary"><?php esc_html_e( 'Get back to where things make sense!', 'awm' ); ?></span>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-12">
					<div class="error-page__image">
						<img srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/image/error-page-image-small.webp' ); ?> 320w, <?php echo esc_url( get_template_directory_uri() . '/assets/image/error-page-image.webp' ); ?> 1024w" 
						sizes="(max-width: 600px) 320px, (max-width: 1024px) 640px, 1024px" alt="error-page-image" loading="lazy" width="614" height="360" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Error page section end -->

<?php
get_footer();
