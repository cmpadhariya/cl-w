<?php
/**
 * Template Name: Thank You Template
 *
 * @package WordPress
 * @subpackage AWM
 *
 */
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<!-- Thank You section start -->
<section class="thank-you <?php echo esc_attr( get_field( 'thank_you_padding_class' ) ); ?>" id="thank-you">
	<div class="container p-0">
		<div class="thank-you__inner">
			<div class="thank-you__inner_heading">
				<div class="thank-you__inner_heading--subtitle description-secondary">
					<span class="description-secondary">
						<img src="<?php echo esc_url( get_field( 'thank_you_subtitle_img' ) ); ?>"
							alt="<?php echo esc_attr( get_field( 'thank_you_subtitle_image_alt' ) ); ?>"
							width="105" height="32" />
						<?php echo esc_html( get_field( 'thank_you_subtitle' ) ); ?>
					</span>
				</div>
				<h1><?php echo wp_kses_post( get_field( 'thank_you_heading' ) ); ?></h1>
			</div>
			<div class="row">
				<?php if ( have_rows( 'thank_you_box' ) ) : ?>
					<?php while ( have_rows( 'thank_you_box' ) ) : ?>
						<?php the_row(); ?>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="thank-you__boxes">
								<span><?php echo esc_html( get_sub_field( 'thank_you_box_step_text' ) ); ?></span>
								<i class="<?php echo esc_html( get_sub_field( 'thank_you_box_icon_class' ) ); ?>"></i>
								<p><?php echo wp_kses_post( get_sub_field( 'thank_you_box_heading_text' ) ); ?></p>
								<?php
									$step_link = get_sub_field( 'thank_you_box_button_url' );
									$step_link = ! empty( $step_link ) ? $step_link : '';
									$cal_link  = ! empty( $step_link ) ? 'active-website-management/book-a-demo' : '';
									$style     = empty( $cal_link ) ? 'pointer-events: none' : '';
								?>
									<a class="global-button" href="<?php echo esc_url( $step_link ); ?>" data-cal-link="<?php echo esc_attr( $cal_link ); ?>" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}' style="<?php echo esc_attr( $style ); ?>">
									<?php echo esc_html( get_sub_field( 'thank_you_box_button_text' ) ); ?>
									<?php
									$thank_you_box_button_gif = esc_html( get_sub_field( 'thank_you_box_button_gif' ) );
									if ( ! empty( $thank_you_box_button_gif ) ) :
										?>
										<img src="<?php echo esc_url( $thank_you_box_button_gif ); ?>" alt="Thank you page button image" width="25" height="25" loading="lazy">
									<?php endif; ?>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<!-- Thank You section end -->

<?php get_footer(); ?>
