<?php
/**
 * The template for displaying all custom blog posts.
 *
 * @package WordPress
 * @subpackage AWM
 */

get_header();
get_sidebar(); ?>

<!-- Blog Header section start -->
<section id="blog-header">
	<div class="blog-header <?php echo esc_attr( get_field( 'blog_header_section_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="blog-header__inner">
				<div class="blog-header__inner_subtitle">
					<p><?php echo wp_kses_post( get_field( 'blog_header_section_subtitle_text', 'option' ) ); ?></p>
				</div>
				<h1 class="blog-header__inner_title">
					<?php echo wp_kses_post( get_field( 'blog_header_section_title', 'option' ) ); ?></h1>
				<p class="blog-header__inner_description description-primary">
					<?php echo wp_kses_post( get_field( 'blog_header_section_description', 'option' ) ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
<!-- Blog Header section end -->

<!-- Features Blog section start -->
<?php if ( ! is_paged() ) : ?>
	<section id="features-blog">
		<div
			class="features-blog blog-list <?php echo esc_attr( get_field( 'features_blog_section_class', 'option' ) ); ?>">
			<div class="container p-0">
				<div class="blog-list__inner">
					<div class="blog-list__top">
						<div class="blog-list__top_subtitle">
							<i
								class="<?php echo esc_html( get_field( 'features_blog_subtitle_icon_class_text', 'option' ) ); ?>"></i>
							<p class="description-secondary">
								<?php echo esc_html( get_field( 'features_blog_subtitle_text', 'option' ) ); ?></p>
						</div>
						<h2><?php echo wp_kses_post( get_field( 'features_blog_title_text', 'option' ) ); ?></h2>
					</div>
					<div class="row">
						<?php
						$args           = array(
							'post_type'      => 'blog',
							'meta_query'     => array(
								array(
									'key'     => '_is_featured_blog_post',
									'value'   => '1',
									'compare' => '=',
								),
							),
							'posts_per_page' => -1,
						);
						$featured_query = new WP_Query( $args );

						if ( $featured_query->have_posts() ) :
							while ( $featured_query->have_posts() ) :
								$featured_query->the_post();
								?>
								<div class="col-lg-4 col-md-6 col-12">
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
													<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
												</p>
												<p class="post-meta__read-time description-secondary">
													<?php
													$read_time = awm_calculate_read_time( get_the_ID() );
													echo esc_html( $read_time ) . ' min read';
													?>
												</p>
												<a href="<?php the_permalink(); ?>" class="read-more-arrow"
													aria-label="Read more...">
													<i class="icon-icon-right-custom"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							echo '<p>No featured blog post found.</p>';
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
<?php if ( ! is_paged() ) : ?>
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

<!-- Blog list section start -->
<section id="blog-list">
	<div class="blog-list <?php echo esc_attr( get_field( 'blog_section_padding_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="blog-list__inner">
				<div class="blog-list__top blog-list__archive_top">
					<h2>Latest <span>blog posts</span></h2>
					<?php
					$taxonomy           = 'blog-category';
					$terms              = get_terms( $taxonomy, array( 'hide_empty' => false ) );
					$current_term       = get_queried_object();
					$categories_to_show = 4;
					?>
					<div class="taxonomy-list">
						<ul id="category-list" class="category-list">
							<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
								<li>
									<a href="<?php echo esc_url( get_post_type_archive_link( 'blog' ) ); ?>" class="description-secondary current">All</a>
								</li>
								<?php
								$category = 0;
								foreach ( $terms as $index => $term ) :
									++$category;
									$show_hide_cat = ( $category <= $categories_to_show ) ? '' : ' awm-category-hidden';
									?>
									<li class="
									<?php
									echo ( $current_term && isset( $current_term->term_id ) && $current_term->term_id === $term->term_id ) ? 'awm-category-active' : '';
									echo $show_hide_cat;
									?>
									">
										<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="description-secondary">
											<?php echo esc_html( $term->name ); ?>
										</a>
									</li>
								<?php endforeach; ?>
								<a id="toggle-categories" class="description-secondary toggle-categories">Show more</a>
							<?php else : ?>
								<li></li>
							<?php endif; ?>
						</ul>
					</div>
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
						echo '<p>No posts found.</p>';
					endif;
					?>
			</div>
		</div>
	</div>
</section>
<!-- Blog list section end -->

<!-- Blog Call To Action Section Start -->
<?php echo do_shortcode( '[blog_call_to_action_section]' ); ?>
<!-- Blog Call To Action Section End -->

<?php
get_footer();
