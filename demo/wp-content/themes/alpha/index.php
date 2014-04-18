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
	<div class="col-sm-12">
		<p>We're going to do some demos here.</p>
	</div>
</div>
<div class="row">
	<article class="col-sm-12">
		<div class="row">
			<div id="primary" class="col-sm-12 entry-content">
				<div class="row">
					<div id="interaction" class="col-sm-4">
						<button class="btn js-get-name">Get Name</button>

					</div>
					<div id="displayData" class="col-sm-8"></div>
				</div>
			</div><!-- #primary -->
		</div>
		
		<?php //get_sidebar(); ?>
		
	</article><!-- .row -->
</div>

<?php get_footer();