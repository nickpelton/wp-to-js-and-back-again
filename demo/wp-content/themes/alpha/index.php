<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alpha
 */

get_header(); ?>

<div class="row">
	<article class="col-sm-12">
		<div class="row">
			<div id="primary" class="col-sm-12 entry-content">
				<?php // nope ?>
			</div><!-- #primary -->
		</div>
		
		<?php //get_sidebar(); ?>
		
	</article><!-- .row -->
</div>

<?php get_footer();