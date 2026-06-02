<?php
/**
 * Single article content.
 *
 * @package OutpostMedia
 */
?>
<article <?php post_class( 'article' ); ?>>
	<header class="article-header">
		<?php get_template_part( 'template-parts/post-meta' ); ?>
		<h1 class="article-title"><?php the_title(); ?></h1>
		<?php if ( has_excerpt() ) : ?>
			<p class="article-standfirst"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="article-featured-image">
			<?php the_post_thumbnail( 'full' ); ?>
			<?php if ( get_the_post_thumbnail_caption() ) : ?>
				<figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
			<?php endif; ?>
		</figure>
	<?php endif; ?>

	<div class="article-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Article pages', 'outpost-media' ) . '">',
				'after'  => '</nav>',
			)
		);
		?>
	</div>

	<?php outpost_media_the_sources(); ?>
</article>
