<?php
/**
 * The template for displaying search forms in times
 *
 * @package times
 */
?>
<form role="search" method="get" class="row search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-form-top">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'times' ); ?></span>
		<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search....', 'placeholder', 'times' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	</div>
</form>
