<?php
/**
 * Empty state template part.
 *
 * @package OutpostMedia
 */
?>
<section class="content-none" aria-labelledby="content-none-title">
	<p class="eyebrow"><?php esc_html_e( 'No results', 'outpost-media' ); ?></p>
	<h2 id="content-none-title"><?php esc_html_e( 'Nothing has been published here yet.', 'outpost-media' ); ?></h2>
	<p><?php esc_html_e( 'Try a different search, browse the latest articles, or check back once the newsroom has published more stories.', 'outpost-media' ); ?></p>
	<div class="content-none__actions">
		<a class="button-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'outpost-media' ); ?></a>
		<a class="button-link button-link--ghost" href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/' ) ); ?>"><?php esc_html_e( 'Browse articles', 'outpost-media' ); ?></a>
	</div>
</section>
