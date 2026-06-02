<?php
/**
 * Search results template.
 *
 * @package OutpostMedia
 */
get_header();
?>
<main id="primary" class="site-main section-shell">
	<header class="archive-header search-header">
		<p class="eyebrow"><?php esc_html_e( 'Search', 'outpost-media' ); ?></p>
		<h1>
			<?php
			printf(
				/* translators: %s: Search query. */
				esc_html__( 'Results for “%s”', 'outpost-media' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>
		<?php get_search_form(); ?>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="post-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content-card' );
			endwhile;
			?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content-none' ); ?>
	<?php endif; ?>
</main>
<?php
get_footer();
