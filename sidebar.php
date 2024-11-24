<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage AWM
 */
?>

<!--sidebar section start -->
<nav class="sidebar">
	<div class="container p-0">
		<div class="sidebar__inner">
			<!-- Logo -->
			<div class="sidebar__inner_logo">
				<a href="<?php echo esc_url( home_url() ); ?>">
					<img src="<?php the_field( 'header_logo', 'option' ); ?>" alt="active website management" width="176"
						height="42" >
				</a>
				<div class="sidebar__togle">
					<i class="fa-solid fa-x"></i>
				</div>
			</div>
			<?php if ( is_page_template( 'page-templates/landing-page.php' ) ) : ?>
			<!-- Menu -->
			<div class="sidebar__inner_menu header-menu">
				<div class="sidebar__inner_menu--list">
					<div class="sidebar__inner_menu--list-icon">
						<img src="<?php the_field( 'header_menu_left_side_icon', 'option' ); ?>"
							alt="header menu left side icon" width="18" height="19" loading="lazy" />
					</div>
					<?php
					// Display the sidebar menu if it exists.
					wp_nav_menu(
						array(
							'theme_location' => 'active_website_management_header_menu',
							'container'      => '',
							'menu_class'     => 'header__inner_menu--list-menus',
						)
					);
					?>
				</div>
			</div>
			<?php else : ?>

			<!-- Menu -->
			<div class="sidebar__inner_menu header-menu-v2">
				<div class="sidebar__inner_menu--list">
					<div class="sidebar__inner_menu--list-icon">
						<img src="<?php the_field( 'header_menu_left_side_icon', 'option' ); ?>"
							alt="header menu left side icon" width="18" height="19" loading="lazy" />
					</div>
					<?php
					// Display the sidebar menu if it exists.
					wp_nav_menu(
						array(
							'theme_location' => 'active_website_management_header_v2_menu',
							'container'      => '',
							'menu_class'     => 'header__inner_menu--list-menus',
						)
					);
					?>
				</div>
			</div>
			<?php endif; ?>

			<!-- sidebar Button -->
			<div class="sidebar__inner_button">
				<a href="<?php the_field( 'header_button_url', 'option' ); ?>" data-cal-link="active-website-management/book-a-demo" data-cal-namespace="book-a-demo" data-cal-config='{"layout":"month_view"}'>
					<?php the_field( 'header_button_name', 'option' ); ?>
					<img src="<?php the_field( 'header_button_image', 'option' ); ?>" alt="header logo" width="26"
						height="26" loading="lazy">
				</a>
			</div>
		</div>
	</div>
</nav>

<!-- The overlay that closes the sidebar when clicked -->
<div class="close-sidebar"></div>

<!--sidebar section end -->