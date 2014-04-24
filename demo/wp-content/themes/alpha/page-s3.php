<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Alpha
 */

get_header(); ?>

<div class="row">

	<div id="primary" class="col-sm-12">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				<div id="btn_events">
					<button class="js-ajax-get-data btn">Get Data</button>
				</div>
				<div id="displayData"></div>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->
	
	
	
</div><!-- .row -->

<?php get_footer(); ?>