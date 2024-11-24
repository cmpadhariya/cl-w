<?php
/**
 * The template for displaying all custom blog post Content (Single blog post content).
 *
 * @package AWM
 * @subpackage AWM
 */

get_header();
get_sidebar(); ?>

<!-- Blog Single Page Post Content Section Start -->
<section id="blog-single">
	<div
		class="blog-single <?php echo esc_attr( get_field( 'blog_single_page_post_content_section_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="blog-single__inner">
				<?php echo do_shortcode( '[rank_math_breadcrumb]' ); ?>
				<div class="blog-single__inner_heading">
					<h1 class="post-title"> <?php echo esc_html( get_the_title() ); ?> </h1>
				</div>
				<div class="row">
					<div class="col-xl-8 col-lg-7">
						<div class="blog-single__inner_content ">
							<?php
							if ( has_post_thumbnail() ):
								echo '<div class="post-featured-image">';
								the_post_thumbnail( 'blog-single-image', array( 'alt' => esc_attr( get_the_title() ) ) );
								echo '</div>';
							endif;
							?>
							<div class="blog-single__post-meta">

								<?php
								$categories = wp_get_post_terms( get_the_ID(), 'blog-category' );
								if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
									echo '<ul>';
									foreach ( $categories as $category ) {
										echo '<li><a class="description-secondary" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
									}
									echo '</ul>';
								}
								?>
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
							</div>
							<?php the_content(); ?>
						</div>
					</div>
					<!-- Single Blog Sidebar Section Start -->
					<div class="col-xl-4 col-lg-5">
						<div class="blog-single__inner_sidebar">
							<div class="blog-single__inner_sidebar--calltoaction">
								<div class="blog-single__inner_sidebar--calltoaction-background">
									<img src="<?php echo esc_url( get_field( 'blog_sidebar_call_to_action_image', 'option' ) ); ?>"
										alt="call to action v2 background Image" width="402" height="415"
										loading="lazy" />
								</div>
								<div class="blog-single__inner_sidebar--calltoaction-text">
									<h3>
										<?php
										$call_to_action_section_heading = get_field( 'blog_sidebar_call_to_action_title', 'option' );
										$current_day = gmdate( 'j' );
										$month_to_display = ( 15 >= $current_day ) ? gmdate( 'F' ) : gmdate( 'F', strtotime( '+1 month' ) );
										echo wp_kses(
											str_replace( '{{next_month}}', $month_to_display, $call_to_action_section_heading ),
											array( 'span' => array() )
										);
										?>
									</h3>
									<p
										class="blog-single__inner_sidebar--calltoaction-text-description description-secondary">
										<?php echo wp_kses_post( get_field( 'blog_sidebar_call_to_action_description', 'option' ) ); ?>
									</p>
									<a class="global-button"
										href="<?php echo esc_url( get_field( 'blog_sidebar_call_to_action_button_url', 'option' ) ); ?>"
										aria-label="call to action">
										<?php echo esc_html( get_field( 'blog_sidebar_call_to_action_button_text', 'option' ) ); ?>
									</a>
									<p class="blog-single__inner_sidebar--calltoaction-text-bottom-description">
										<?php echo wp_kses_post( get_field( 'blog_sidebar_call_to_action_bottom_description', 'option' ) ); ?>
									</p>
								</div>
							</div>
							<div class="blog-single__social-icon">
								<p><?php echo wp_kses_post( get_field( 'blog_sidebar_share_heading_text', 'option' ) ); ?>
								</p>
								<ul>
									<?php if ( have_rows( 'blog_sidebar_share_icon', 'option' ) ) : ?>
										<?php while ( have_rows( 'blog_sidebar_share_icon', 'option' ) ) : ?>
											<?php the_row(); ?>
											<?php
											$icon_url        = get_sub_field( 'blog_sidebar_share_icon_url', 'option' );
											$current_url     = get_permalink();
											$icon_url        = str_replace( '{{current_url}}', esc_url( $current_url ), $icon_url );
											$stop_click_copy = ( $current_url === $icon_url ) ? true : false;
											?>
											<li>
												<p id="copy-message" class="copy-message">URL copied to clipboard!</p>
												<a href="<?php echo esc_url( $icon_url ); ?>" target="_blank"
													aria-label="Share Icon" 
													<?php
													if ( $stop_click_copy ) :
														?> onclick="event.preventDefault();
																navigator.clipboard.writeText('<?php echo esc_url( $icon_url ); ?>')
																.then(() => {
																	document.getElementById('copy-message').style.display = 'block';
																	setTimeout(() => {
																		document.getElementById('copy-message').style.display = 'none';
																	}, 2000);
																})
															" <?php endif; ?>>
													<i
														class="<?php echo esc_html( get_sub_field( 'blog_sidebar_share_icon_class', 'option' ) ); ?>"></i>
												</a>
											</li>
										<?php endwhile; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- Single Blog Sidebar Section End -->
				</div>
				<!-- Pagination for next and previous posts -->
				<div
					class="row blog-single-pagination <?php echo esc_attr( get_field( 'blog_single_page_post_pagination_section_class', 'option' ) ); ?>">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="blog-single__inner_pagination previous-post">
							<?php next_post_link( '%link', '<span>Previous</span> %title' ); ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="blog-single__inner_pagination next-post">
							<?php previous_post_link( '%link', '<span>Next</span> %title' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Single Page Post Content Section End -->

<!-- author section start -->
<section id="author-single">
	<div class="author-single <?php echo esc_attr( get_field( 'author_single_section_class', 'option' ) ); ?> ">
		<div class="container p-0">
			<div class="author-single__inner">
				<div class="author-avatar">
					<?php
					$author_id  = get_the_author_meta( 'ID' );
					$author_url = get_author_posts_url( $author_id );
					?>
					<a href="<?php echo esc_url( $author_url ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
						<?php echo get_avatar( $author_id, 180, '', esc_attr( get_the_author() ) ); ?>
					</a>
				</div>
				<div class="author-single__inner_deatils">
					<div class="author-info">
						<span class="description-secondary author-title">Author</span>
						<p class="author-post-count"><?php echo esc_html( count_user_posts( $author_id, 'blog' ) ); ?>
							Articles</p>
					</div>
					<h3><a href="<?php echo esc_url( $author_url ); ?>"><?php the_author(); ?></a></h3>
					<?php
					$author_description = get_the_author_meta( 'description' );
					preg_match_all( '/#\w+(\s+\w+)*/', $author_description, $hashtags );
					?>
					<p class="description-secondary author-description"><?php echo esc_html( $author_description ); ?>
					</p>
				</div>
			</div>
			<?php
			$tags = get_the_terms( get_the_ID(), 'blog-tag' );
			if ( $tags && ! is_wp_error( $tags ) ) {
				echo '<div class="author-single__hashtags">';
				echo '<ul class="blog-tags">';
				foreach ( $tags as $single_tag ) {
					$tag_link = get_term_link( $single_tag );
					if ( ! is_wp_error( $tag_link ) ) {
						echo '<li><a href="' . esc_url( $tag_link ) . '">' . esc_html( $single_tag->name ) . '</a></li>';
					}
				}
				echo '</ul>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</section>
<!-- author section end -->

<!-- Blog related posts start -->
<section id="related-blogpost">
	<div
		class="blog-list related-blogpost <?php echo esc_attr( get_field( 'related_post_section_pading_class', 'option' ) ); ?>">
		<div class="container p-0">
			<div class="blog-list__inner">
				<div class="blog-list__top">
					<h2><?php echo wp_kses_post( get_field( 'related_post_section_title', 'option' ) ); ?></h2>
				</div>
				<div class="row">
					<?php
					$current_post_id = get_the_ID();
					$categories      = wp_get_post_terms( $current_post_id, 'blog-category' );
					$category_ids    = wp_list_pluck( $categories, 'term_id' );
					$related_args = array(
						'post_type'      => 'blog',
						'posts_per_page' => 3,
						'post__not_in'   => array( $current_post_id ),
						'post_status'    => 'publish',
						'tax_query'      => array(
							array(
								'taxonomy' => 'blog-category',
								'field'    => 'term_id',
								'terms'    => $category_ids,
							),
						),
					);
					$related = new WP_Query( $related_args );

					if ( $related->have_posts() ) :
						while ( $related->have_posts() ) :
							$related->the_post();
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
												aria-label="Read more...">
												<i class="icon-icon-right-custom"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php
					else :
						echo '';
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog related posts end -->

<!-- Blog Call To Action Section Start -->
<?php echo do_shortcode( '[blog_call_to_action_section]' ); ?>
<!-- Blog Call To Action Section End -->

<?php get_footer(); ?>
