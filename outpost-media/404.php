<?php
/**
 * 404 template.
 *
 * @package OutpostMedia
 */
get_header();
?>
<main id="primary" class="site-main section-shell error-404">
	<section class="not-found" aria-labelledby="not-found-title">
		<p class="eyebrow"><?php esc_html_e( '404', 'outpost-media' ); ?></p>
		<h1 id="not-found-title"><?php esc_html_e( 'This page is off the map.', 'outpost-media' ); ?></h1>
		<p><?php esc_html_e( 'The story, archive, or resource you requested could not be found. Search the newsroom or return to the latest articles.', 'outpost-media' ); ?></p>
		<?php get_search_form(); ?>
		<div class="content-none__actions">
			<a class="button-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'outpost-media' ); ?></a>
		</div>
	</section>
</main>
<?php
get_footer();
