<?php
/**
 * Fallback template.
 *
 * @package OutpostMedia
 */
get_header();
?>
<main id="primary" class="site-main section-shell">
	<header class="archive-header">
		<h1><?php esc_html_e( 'Latest from Outpost Media', 'outpost-media' ); ?></h1>
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
		<p><?php esc_html_e( 'No stories have been published yet.', 'outpost-media' ); ?></p>
	<?php endif; ?>
</main>
<?php
get_footer();
