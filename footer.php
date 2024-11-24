<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package AWM
 */
?>

<footer class="footer <?php echo esc_attr( get_field( 'footer_section_padding', 'option' ) ); ?>">
	<div class="container p-0">
		<div class="footer__inner">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-6">
					<div class="footer__inner_about">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<?php
							$footer_logo = get_field( 'footer_logo', 'option' );
							if ( $footer_logo ) :
								?>
								<img src="<?php echo esc_url( $footer_logo ); ?>" alt="Active Website Management"
									class="footer-logo" width="253" height="62" loading="lazy" />
							<?php endif; ?>
						</a>
						<?php
						$footer_content = get_field( 'footer_content_text', 'option' );
						if ( $footer_content ) :
							?>
							<p class="description-secondary">
								<?php
								echo wp_kses(
									$footer_content,
									array(
										'i'  => array( 'class' => array() ),
										'br' => array(),
									)
								);
								?>
							</p>
						<?php endif; ?>
						<div class="footer-ourcompany">
							<?php
							$footer_right_content = get_field( 'footer_right_site_content', 'option' );
							if ( $footer_right_content ):
								?>
								<p class="description-secondary">
									<?php
									echo wp_kses_post( $footer_right_content );
									?>
								</p>
							<?php endif; ?>
							<?php
							$footer_right_logo = get_field( 'footer_right_site_logo', 'option' );
							if ( $footer_right_logo ) :
								?>
								<div class="footer__inner_right-logo">
									<img src="<?php echo esc_url( $footer_right_logo ); ?>" alt="Qrolic Technologies Logo"
										width="122" height="33" />
								</div>
							<?php endif; ?>
						</div>
						<div class="footer-social">
							<?php if ( have_rows( 'footer_social_media', 'option' ) ) : ?>
								<?php while ( have_rows( 'footer_social_media', 'option' ) ) : ?>
									<?php the_row(); ?>
									<a href="<?php echo esc_url( get_sub_field( 'footer_social_media_url', 'option' ) ); ?>"
										aria-label="Go to social media" target="_blank">
										<i
											class="<?php echo esc_attr( get_sub_field( 'footer_social_media_class_name', 'option' ) ); ?>"></i>
									</a>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<?php if ( is_page_template( 'page-templates/landing-page.php' ) ) : ?>
						<div class="footer__inner_menus footer-menu">
							<h3><?php echo esc_html( get_field( 'footer_menu_title', 'option' ) ); ?></h3>
							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'active_website_management_footer_menu',
									'container'       => 'nav',
									'container_class' => 'footer-nav',
									'menu_class'      => 'footer-menu',
									'walker'          => new WP_Bootstrap_Navwalker(),
								)
							);
							?>
						</div>
					<?php else : ?>
						<div class="footer__inner_menus footer-menu-v2">
							<h3><?php echo esc_html( get_field( 'footer_menu_title', 'option' ) ); ?></h3>
							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'active_website_management_footer_v2_menu',
									'container'       => 'nav',
									'container_class' => 'footer-nav',
									'menu_class'      => 'footer-menu-v2',
									'walker'          => new WP_Bootstrap_Navwalker(),
								)
							);
							?>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-lg-4 col-md-12 col-12">
					<div class="footer__inner_right">
						<h3><?php echo esc_html( get_field( 'footer_contact_title', 'option' ) ); ?></h3>
						<div class="footer__inner_contact">
							<?php if ( have_rows( 'footer_contact_detail', 'option' ) ) : ?>
								<?php while ( have_rows( 'footer_contact_detail', 'option') ) : ?>
									<?php the_row(); ?>
									<div class="footer__inner_contact-field">
										<i
											class="<?php echo esc_attr( get_sub_field( 'footer_contact_icon_class_name', 'option' ) ); ?>"></i>
										<a href="<?php echo esc_url( get_sub_field( 'footer_contact_link', 'option' ) ); ?>"
											class="description-secondary"
											target="<?php echo esc_html( get_sub_field( 'footer_contact_link_target', 'option' ) ); ?>">
											<?php echo wp_kses_post( get_sub_field( 'footer_contact_name', 'option' ) ); ?>
										</a>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="footer__inner_bottom">
				<?php
				$footer_bottom_left_text = get_field( 'footer_bottom_left_text', 'option' );
				$footer_bottom_left_link = get_field( 'footer_bottom_left_text_link', 'option' );

				if ( $footer_bottom_left_text ) :
					if ( $footer_bottom_left_link ) :
						?>
						<a href="<?php echo esc_url( $footer_bottom_left_link ); ?>" class="description-secondary">
							<?php echo esc_html( $footer_bottom_left_text ); ?>
						</a>
						<?php
					else :
						?>
						<span class="description-secondary">
							<?php echo esc_html( $footer_bottom_left_text ); ?>
						</span>
						<?php
					endif;
				endif;
				$footer_bottom_center_text = get_field( 'footer_bottom_center_text', 'option' );
				$footer_bottom_center_link = get_field( 'footer_bottom_center_text_link', 'option' );

				if ( $footer_bottom_center_text ) :
					if ( $footer_bottom_center_link ) :
						?>
						<a href="<?php echo esc_url( $footer_bottom_center_link ); ?>" class="description-secondary">
							<?php echo esc_html( $footer_bottom_center_text ); ?>
						</a>
						<?php
					else :
						?>
						<span class="description-secondary">
							<?php echo esc_html( $footer_bottom_center_text ); ?>
						</span>
						<?php
					endif;
				endif;

				$footer_bottom_right_text = get_field( 'footer_bottom_right_text', 'option' );
				$footer_bottom_right_link = get_field( 'footer_bottom_right_text_link', 'option' );

				if ( $footer_bottom_right_text ) :
					if ( $footer_bottom_right_link ) :
						?>
						<a href="<?php echo esc_url( $footer_bottom_right_link ); ?>" class="description-secondary">
							<?php echo esc_html( $footer_bottom_right_text ); ?>
						</a>
						<?php
					else :
						?>
						<span class="description-secondary">
							<?php echo esc_html( $footer_bottom_right_text ); ?>
						</span>
						<?php
					endif;
				endif;
				?>
			</div>
		</div>
</footer>
<?php wp_footer(); ?>
<?php

$footer_script = get_field( 'footer_script', 'option' );

if ( $footer_script && ! empty( $footer_script ) ) {
	echo wp_kses(
		$footer_script,
		array(
			'script' => array(
				'src'   => array(),
				'async' => array(),
				'defer' => array(),
			),
		),
	);
}
?>
</body>
</html>
