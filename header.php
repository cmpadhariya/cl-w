<?php
/**
 * Header
 *
 * Header file for the theme.
 *
 * @package WordPress
 * @subpackage AWM
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	$header_script = get_field( 'header_script', 'option' );
	if ( $header_script && ! empty( $header_script ) ) {
		echo wp_kses(
			get_field( 'header_script', 'option' ),
			array(
				'script'    => array(
					'src'   => array(),
					'async' => array(),
					'defer' => array(),
				),
			),
		);
	}
	?>
	<?php wp_head(); ?>
	<?php if ( have_rows( 'faq_questions' ) ) : ?>
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "FAQPage",
					"mainEntity": [
						<?php
						while ( have_rows( 'faq_questions' ) ) :
							the_row();
							?>
							{
								"@type": "Question",
								"name": "<?php echo esc_js( get_sub_field( 'faq_question' ) ); ?>",
								"acceptedAnswer": {
									"@type": "Answer",
									"text": "<?php echo esc_js( get_sub_field( 'faq_answer' ) ); ?>"
								}
							}
								<?php if ( get_row_index() !== count( get_field( 'faq_questions' ) ) ) : ?>
									,
										<?php
								endif;
								?>
					<?php endwhile; ?>
				]
			}
		</script>
	<?php endif; ?>
	<!--This code is used to display custom schema for particular page nand posts-->
	<?php
	if ( is_singular() && function_exists( 'get_field' ) ) {
		$custom_schema = get_field( 'custom_schema' );
		if ( $custom_schema ) {
			echo '<script type="application/ld+json">' . wp_json_encode( json_decode( $custom_schema ) ) . '</script>';
		}
	}
	?>
</head>

<body <?php body_class(); ?>>
	<!-- Header section start -->
	<div class="header-wrapper">
		<header class="header">
			<div class="container p-0">
				<div class="header__inner">

					<!-- Logo -->
					<div class="header__inner_logo">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<?php
							$header_logo = get_field( 'header_logo', 'option' );
							if ( $header_logo ) :
								?>
								<img src="<?php echo esc_url( $header_logo ); ?>"
									alt="<?php esc_attr_e( 'Active Website Management', 'amw' ); ?>" width="176"
									height="39">
							<?php endif; ?>
						</a>
					</div>

					<?php if ( is_page_template( 'page-templates/landing-page.php' ) ) : ?>
						<!-- Menu -->
						<div class="header__inner_menu header-menu">
							<div class="header__inner_menu--list">
								<div class="header__inner_menu--list-icon">
									<?php
									$menu_icon = get_field( 'header_menu_left_side_icon', 'option' );
									if ( $menu_icon ) :
										?>
										<img src="<?php echo esc_url( $menu_icon ); ?>"
											alt="<?php esc_attr_e( 'Header menu left side icon', 'awm' ); ?>" width="18"
											height="19" loading="lazy">
									<?php endif; ?>
								</div>

								<?php
								// Display the header menu if it exists.
								wp_nav_menu(
									array(
										'theme_location' => 'active_website_management_header_menu',
										'container'      => '',
										'menu_class'     => 'header__inner_menu--list-menus description-secondary',
										'fallback_cb'    => false,
									)
								);
								?>
							</div>
						</div>
					<?php else : ?>
						<!-- Menu v2 -->
						<div class="header__inner_menu header-menu-v2">
							<div class="header__inner_menu--list-icon">
								<?php
								$menu_icon = get_field( 'header_menu_left_side_icon', 'option' );
								if ( $menu_icon ) :
									?>
									<img src="<?php echo esc_url( $menu_icon ); ?>"
										alt="<?php esc_attr_e( 'Header menu left side icon', 'awm' ); ?>" width="18" height="19"
										loading="lazy">
								<?php endif; ?>
							</div>

							<div class="header__inner_menu--list">
								<?php
								// Display the header menu if it exists.
								wp_nav_menu(
									array(
										'theme_location' => 'active_website_management_header_v2_menu',
										'container'      => '',
										'menu_class'     => 'header__inner_menu--list-menus description-secondary',
										'fallback_cb'    => false,
									)
								);
								?>
							</div>
						</div>
					<?php endif; ?>
					<!-- Header Button -->
					<div class="header__inner_button">
						<?php
						$button_url   = get_field( 'header_button_url', 'option' );
						$button_name  = get_field( 'header_button_name', 'option' );
						$button_image = get_field( 'header_button_image', 'option' );

						if ( $button_url && $button_name ) :
							?>
						<a href="<?php echo esc_url( $button_url ); ?>" data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
							<?php echo esc_html( $button_name ); ?>
							<?php if ( $button_image ) : ?>
								<img src="<?php echo esc_url( $button_image ); ?>" alt="<?php esc_attr_e( 'Header button image', 'awm' ); ?>" width="26" height="26" loading="lazy">
							<?php endif; ?>
						</a>
					<?php endif; ?>
					<div class="header__inner_togle">
						<i class="fa-solid fa-bars"></i>
					</div>
				</div>
			</div>
		</div>
	</header>
</div>
<!-- Header section end -->