<?php
/**
 * The post template file.
 */

?>
<?php get_header(); ?>

<!-- Common section for All post  Start -->
<section id="common">
	<div class="common-section common-padding">
		<div class="container p-0">
			<div class="common-section__content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
<!-- Common section for All post end -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
