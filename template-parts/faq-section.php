<?php
/**
 *
 * This is a custom template for the "faq" section.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<section id="faq">
	<div class="faq-section <?php echo esc_attr( get_field( 'faq_padding_class' ) ); ?>">
		<div class="container p-0">
			<div class="faq-section__inner">
				<div class="faq-section__inner_subtitle">
					<div class="improvement-section__inner_subtitle-icon">
						<i class="<?php echo esc_html( get_field( 'faq_subtitle_icon' ) ); ?>" ></i>
					</div>
					<div class="faq-section__inner_subtitle-text">
						<p class="description-secondary"><?php echo esc_html( get_field( 'faq_subtitle_text' ) ); ?></p>
					</div>
				</div>
				<div class="faq-section__inner_heading">
					<h2><?php echo wp_kses_post( get_field( 'faq_heading' ) ); ?></h2>
				</div>
				<?php if ( have_rows( 'faq_questions' ) ) : ?>
					<?php
					while ( have_rows( 'faq_questions' ) ) :
						the_row();
						?>
						<div class="faq-section__inner_list" itemscope itemprop="mainEntity"
							itemtype="https://schema.org/Question">
							<div class="faq-section__inner_list-question">
								<h3 class="description-primary" itemprop="name"><?php echo esc_html( get_sub_field( 'faq_question' ) ); ?>
								</h3>
								<i class="icon-plus click-button"></i>
								<i class="icon-minus close-button"></i>
							</div>
							<div class="faq-section__inner_list-answer" itemscope itemprop="acceptedAnswer"
								itemtype="https://schema.org/Answer">
								<p class=" description-secondary" itemprop="text"><?php echo wp_kses_post( get_sub_field( 'faq_answer' ) ); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
