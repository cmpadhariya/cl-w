<?php
/**
 *
 * This is a custom template for the "testimonials" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="testimonials">
	<div class="testimonials <?php echo esc_attr( get_field( 'testimonials_section_padding_class' ) ); ?>">
		<div class="testimonials__inner">
			<div class="container p-0">
				<div class="testimonials__top">
					<span
						class="description-secondary"><?php echo esc_html( get_field( 'testimonials_section_subtitle' ) ); ?></span>
					<h2><?php echo wp_kses( get_field( 'testimonials_section_title' ), array( 'span' => array() ) ); ?></h2>
				</div>
				<div class="testimonials__content">
					<?php
					$args = array(
						'post_type'      => 'testimonial',
						'posts_per_page' => 20,
						'order'          => 'ASC',
					);

					$testimonial = new WP_Query( $args );
					?>

					<?php if ( $testimonial->have_posts() ) : ?>
						<?php while ( $testimonial->have_posts() ) : ?>
							<?php
							$testimonial->the_post();
							$fields = (object) get_fields();
							?>

							<div class="testimonials__content_post post-id-<?php echo esc_attr( get_the_ID() ); ?>">
								<p class="description-secondary testimonial-excerpt">
									<?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?>
								</p>
								<div class="post_meta">
									<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
									<div class="post_meta-content">
										<h3><?php the_title(); ?></h3>
										<p class="custom-meta">
											<?php echo esc_html( get_post_meta( get_the_ID(), 'client_position', true ) ); ?>
										</p>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
