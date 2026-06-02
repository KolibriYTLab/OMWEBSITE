<?php
/**
 * Search form template.
 *
 * @package OutpostMedia
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search-field"><?php esc_html_e( 'Search Outpost Media', 'outpost-media' ); ?></label>
	<div class="search-form__row">
		<input id="search-field" type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search articles, analysis, and dispatches', 'outpost-media' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		<button type="submit" class="search-submit"><?php esc_html_e( 'Search', 'outpost-media' ); ?></button>
	</div>
</form>
