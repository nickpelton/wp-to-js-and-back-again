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
		<p>Look, buttons!</p>
	</div>
</div>
<div class="row">
	<article class="col-sm-12">
		<div class="row">
			<div id="primary" class="col-sm-12 entry-content">
				<div class="row">
					<div id="interaction" class="col-sm-4">
						<button class="btn js-ajax-action-1">Ajax Action_1 - Get basic data</button>
						<button class="btn js-ajax-action-2">Ajax Action_2 - Get and Array of data</button>
						<button class="btn js-ajax-action-3">Ajax Action_3 - Get and Array of data (wp_send_json)</button>
						<button class="btn js-ajax-action-4">Ajax Action_4 - Get 10 latest posts</button>
						<button class="btn js-ajax-action-5">Ajax Action_5 - </button>
						<button class="btn js-ajax-action-6">Ajax Action_6</button>
						<button class="btn js-ajax-action-7">Ajax Action_7</button>

					</div>
					<div id="displayData" class="col-sm-8"></div>
				</div>
			</div><!-- #primary -->
		</div>
		
		<?php //get_sidebar(); ?>
		
	</article><!-- .row -->
</div>

<?php get_footer();