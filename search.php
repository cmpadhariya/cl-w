<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage AWM
 */

get_header(); ?>

<div class="search-page common-padding">
	<div class="container p-0">
		<h1><?php printf( esc_html__( 'Search Results for: %s', 'amw' ), esc_html( get_search_query() ) ); ?></h1>
		<div class="search-form">
			<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" name="s" id="s" class="description-secondry"
					placeholder="<?php esc_attr_e( 'Search...', 'amw' ); ?>"
					value="<?php echo esc_attr( get_search_query() ); ?>" />
				<button type="submit" class="description-secondry"><?php esc_html_e( 'Search', 'amw' ); ?></button>
			</form>
		</div>

		<div class="search-results">
			<?php if ( have_posts() ) : ?>
				<ul class="search-results-list">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<li>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="post-meta">
								<span class="author"> <?php the_author(); ?></span>
								<span class="date"><?php echo get_the_date(); ?></span>
							</p>
							<p class="description-primary"><?php the_excerpt(); ?></p>
						</li>
					<?php endwhile; ?>
				</ul>

				<div class="pagination">
					<?php
					$pagination_links = paginate_links(
						array(
							'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999) ) ),
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
			<?php else : ?>
				<div class="no-results">
					<p class="description-primary">
						<?php esc_html_e( 'No results found. Please try a different search.', 'amw' ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>