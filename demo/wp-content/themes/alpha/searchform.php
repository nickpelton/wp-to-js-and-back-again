<?php
/**
 * The template for displaying search forms in Starter
 *
 * @package Alpha
 */
?>
<form role="search" method="get" class="input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'starter' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'starter' ); ?>">
	<span class="input-group-btn">
		<input type="submit" class="btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button', 'starter' ); ?>">
	</span>
</form>
