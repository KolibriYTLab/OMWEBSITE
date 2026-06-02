<?php
/**
 * Author archive template.
 *
 * @package OutpostMedia
 */
get_header();
$author_id = get_queried_object_id();
?>
<main id="primary" class="site-main section-shell">
	<header class="author-header">
		<p class="eyebrow"><?php esc_html_e( 'Author', 'outpost-media' ); ?></p>
		<h1><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></h1>
		<?php if ( get_the_author_meta( 'description', $author_id ) ) : ?>
			<p><?php echo esc_html( get_the_author_meta( 'description', $author_id ) ); ?></p>
		<?php endif; ?>
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
