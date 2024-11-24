<?php
/**
 * The template for displaying author details and author posts.
 *
 * @package AWM
 * @subpackage AWM
 */

get_header();
get_sidebar();
?>

<!-- Author details section start -->
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
		</div>
	</div>
</section>
<!-- Author details section start -->

<!-- Author posts section start -->
<section id="author-posts">
	<div class="blog-list author-posts common-padding">
		<div class="container p-0">
			<?php
			$current_author = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $_GET['author_name'] ) : get_userdata( intval( $author ) );
			?>
			<h2>Latest articles from <?php echo esc_html( $current_author->nickname ); ?></h2>
			<div class="row">
				<?php
				$page_num     = isset( $_GET['page'] ) ? intval( $_GET['page'] ) : 1;
				$args         = array(
					'author'         => $current_author->ID,
					'post_type'      => 'blog',
					'posts_per_page' => 6,
					'paged'          => $page_num,
				);
				$author_posts = new WP_Query( $args );
				?>
				<?php if ( $author_posts->have_posts() ) : ?>
					<?php
					while ( $author_posts->have_posts() ) :
						$author_posts->the_post();
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
										<a href="<?php the_permalink(); ?>" class="read-more-arrow">
											<i class="icon-right-small"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>

					<div class="custom-pagination">
						<?php
						echo wp_kses_post(
							paginate_links(
								array(
									'base'      => esc_url( add_query_arg( 'page', '%#%' ) ),
									'format'    => '?page=%#%',
									'current'   => $page_num,
									'total'     => $author_posts->max_num_pages,
									'prev_next' => true,
									'prev_text' => '',
									'next_text' => '',
									'type'      => 'plain',
								)
							)
						);
						?>
					</div>
				<?php else : ?>
					<p><?php esc_html_e( 'No posts by this author.' ); ?></p>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>
<!-- Author posts section end -->

<!-- Blog Call To Action Section Start -->
<?php echo do_shortcode( '[blog_call_to_action_section]' ); ?>
<!-- Blog Call To Action Section End -->

<?php
get_footer();
