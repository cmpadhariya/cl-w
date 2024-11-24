<?php
/**
 * The template for displaying blog tag page.
 *
 * @package WordPress
 * @subpackage AWM
 */

get_header();
get_sidebar(); ?>

<!-- Blog tag Header section start -->
<section id="blog-header">
	<div class="blog-header <?php echo esc_attr( get_field( 'blog_header_section_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="blog-header__inner">
				<?php
				// Typically used to get information about the current taxonomy term (tag, category, etc.).
				$current_tag = get_queried_object();
				// This is likely used to display a custom subtitle specific to the current blog tag page and display default subtile.
				$blog_tag_header_subtitle         = get_field( 'blog_tag_header_subtitle', $current_tag );
				$default_blog_tag_header_subtitle = get_field( 'blog_tag_header_section_subtitle', 'option' );
				$awm_blog_tag_header_subtitle     = ! empty( $blog_tag_header_subtitle ) ? $blog_tag_header_subtitle : $default_blog_tag_header_subtitle;
				// This is used to display a custom description on the blog tag page.
				$blog_tag_header_description = get_field( 'blog_tag_header_section_description', $current_tag );
				?>
				<div class="blog-header__inner_subtitle">
					<p><?php echo esc_html( $awm_blog_tag_header_subtitle ); ?></p>
				</div>
				<h1 class="blog-header__inner_title">
					<?php
						$current = get_field( 'blog_tag_header_section_title_pretext', 'option' );
						$current = str_replace( '{{current_tag}}', $current_tag->name, $current );
						echo esc_html( $current );
					?>
				</h1>
				<p class="blog-header__inner_description description-primary">
					<?php
					remove_filter( 'term_description', 'wpautop' );
					$term_description = term_description();
					if ( $term_description ) {
						echo wp_kses_post( $term_description );
					} else {
						echo '';
					}
					?>
				</p>
			</div>
		</div>
	</div>
</section>
<!-- Blog tag Header section end -->

<!-- featured_posts get here-->
<?php $featured_posts = get_field( 'blog_tag_featured_article_post', $current_tag ); ?>

<!-- Features Blog section start -->
<?php if ( ! is_paged() && $featured_posts ) : ?>
	<section id="features-blog">
		<div
			class="features-blog blog-list <?php echo esc_attr( get_field( 'features_blog_section_class', 'option' ) ); ?>">
			<div class="container p-0">
				<div class="blog-list__inner">
					<div class="blog-list__top">
						<div class="blog-list__top_subtitle">
							<i class="<?php echo esc_html( get_field( 'features_blog_subtitle_icon_class_text', 'option' ) ); ?>"></i>
							<p class="description-secondary">
								<?php echo esc_html( get_field( 'features_blog_subtitle_text', 'option' ) ); ?>
							</p>
						</div>
						<?php
							/*
							* Fetch the featured article title dynamically.
							* The function 'awm_get_dynamic_content' retrieves the title for the current tag.
							*/
							$awm_feature_title = awm_get_dynamic_content( $current_tag, 'blog_featured_article_title', 'blog_featured_article_section_title' );

							/*
							* Fetch the featured article description dynamically.
							* The function 'awm_get_dynamic_content' retrieves the description for the current tag.
							*/
							$awm_feature_description = awm_get_dynamic_content( $current_tag, 'blog_featured_article_description', 'blog_featured_article_section_description' );
						?>
						<h2><?php echo wp_kses_post( $awm_feature_title ); ?></h2>
						<p class="description-primary"><?php echo esc_html( $awm_feature_description ); ?></p>
					</div>
					<div class="row">
						<?php
						if ( $featured_posts ) :
							foreach ( $featured_posts as $featured_post ) :
								setup_postdata( $featured_post );
								?>
								<div class="col-lg-4 col-md-6 col-12">
									<div class="blog-list__post">
										<div class="feature-image">
											<a href="<?php the_permalink( $featured_post->ID ); ?>">
												<?php
												if ( has_post_thumbnail( $featured_post->ID ) ) {
													echo get_the_post_thumbnail(
														$featured_post->ID,
														'blog-archive-image',
														array(
															'alt' => esc_attr( get_the_title( $featured_post->ID ) ),
															'title' => esc_attr( get_the_title( $featured_post->ID ) ),
														)
													);
												}
												?>
											</a>
										</div>
										<div class="description">
											<a href="<?php the_permalink( $featured_post->ID ); ?>" class="title">
												<h3><?php echo esc_html( get_the_title( $featured_post->ID ) ); ?></h3>
											</a>
											<div class="post-meta">
												<p class="post-meta__date description-secondary">
													<?php echo esc_html( get_the_date( 'F j, Y', $featured_post->ID ) ); ?>
												</p>
												<p class="post-meta__read-time description-secondary">
													<?php
													$read_time = awm_calculate_read_time( $featured_post->ID );
													echo esc_html( $read_time ) . ' min read';
													?>
												</p>
												<a href="<?php the_permalink( $featured_post->ID ); ?>" class="read-more-arrow"
													aria-label="Read more...">
													<i class="icon-icon-right-custom"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php
							endforeach;
							wp_reset_postdata();
						else :
							echo '';
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>
<!-- Features Blog section end -->

<!-- Blog Newslatter section start -->
<?php if ( ! is_paged() && $featured_posts ) : ?>
	<section id="blog-newslatter">
		<div class="blog-newslatter <?php echo esc_attr( get_field( 'blog_newslatter_section_class', 'option' ) ); ?>">
			<div class="container p-0">
				<div class="blog-newslatter__inner">
					<div class="row">
						<div class="col-lg-6">
							<div class="blog-newslatter__inner_heading">
								<h2><?php echo wp_kses_post( get_field( 'blog_newslatter_section_heading', 'option' ) ); ?>
								</h2>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="blog-newslatter__inner_content">
								<?php echo do_shortcode( get_field( 'blog_newslatter_section_form_shortcode', 'option' ) ); ?>
								<p class="blog-header__inner_description">
									<?php echo wp_kses_post( get_field( 'blog_newslatter_section_description', 'option' ) ); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>
<!-- Blog Newslatter section end -->

<!-- Blog Tag list section start -->
<section id="blog-list">
	<div class="blog-list blog-tag-list <?php echo esc_attr( get_field( 'blog_section_padding_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="blog-list__inner">
				<div class="blog-list__top">
					<?php
					$terms        = get_queried_object();
					$html_snippet = '<i class="icon-featured-bookmark"></i><p class="description-secondary">Latest Articles </p>';

					/*
					* Fetch the latest article title dynamically.
					* The function 'awm_get_dynamic_content' retrieves the title for the current tag.
					*/
					$awm_latest_title = awm_get_dynamic_content( $current_tag, 'blog_latest_article_title', 'blog_latest_article_section_title' );

					/*
					* Fetch the latest article description dynamically.
					* The function 'awm_get_dynamic_content' retrieves the description for the current tag.
					*/
					$awm_latest_blog = awm_get_dynamic_content( $current_tag, 'blog_latest_article_description', 'blog_latest_article_section_description' );
					?>

					<div class="blog-list__top_subtitle blog-tag-list__top_subtitle">
						<?php echo wp_kses_post( $html_snippet ); ?>
					</div>

					<h2><?php echo wp_kses_post( $awm_latest_title ); ?></h2>
					<p class="description-primary tag-description"><?php echo esc_html( $awm_latest_blog ); ?></p>
				</div>

				<div class="row">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
							<div class="col-lg-4 col-md-6 col-12 common-height">
								<div class="blog-list__post">
									<div class="feature-image">
										<a href="<?php the_permalink(); ?>">
											<?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail(
													'blog-archive-image',
													array(
														'alt' => esc_attr( get_the_title() ),
														'title' => esc_attr( get_the_title() ),
													)
												);
											}
											?>
										</a>
									</div>
									<div class="description">
										<a href="<?php the_permalink(); ?>" class="title">
											<h3><?php echo esc_html( get_the_title() ); ?></h3>
										</a>
										<div class="post-meta">
											<p class="post-meta__date description-secondary">
												<?php
												$post_date = get_the_date( 'F j, Y' );
												echo esc_html( $post_date );
												?>
											</p>
											<p class="post-meta__read-time description-secondary">
												<?php
												$read_time = awm_calculate_read_time( get_the_ID() );
												echo ' ' . esc_html( $read_time ) . ' min read';
												?>
											</p>

											<a href="<?php the_permalink(); ?>" class="read-more-arrow"
												aria-label="Read more..."><i class="icon-icon-right-custom"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="custom-pagination">
						<?php
							$pagination_links = paginate_links(
								array(
									'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
									'format'    => '?paged=%#%',
									'current'   => max( 1, get_query_var( 'paged' ) ),
									'show_all'  => false,
									'total'     => $wp_query->max_num_pages,
									'prev_next' => true,
									'prev_text' => '',
									'next_text' => '',
									'type'      => 'plain',
								)
							);
						if ( ! empty( $pagination_links ) ) {
								$pagination_links = preg_replace( '/\/page\/1\//', '/', $pagination_links );
								echo wp_kses_post( $pagination_links );
						} else {
							echo '';
						}
						?>
					</div>
						<?php
					else :
						echo '';
					endif;
					?>
			</div>
		</div>
	</div>
</section>
<!-- Blog Tag list section end -->

<!-- Blog Call To Action Section Start -->
<?php echo do_shortcode( '[blog_call_to_action_section]' ); ?>
<!-- Blog Call To Action Section End -->

<?php
get_footer();
