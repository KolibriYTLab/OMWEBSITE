<?php
/**
 * Post card template part.
 *
 * @package OutpostMedia
 */
?>
<article <?php post_class( 'post-card' ); ?>>
	<a class="post-card__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php else : ?>
			<span class="post-card__image-placeholder"><?php esc_html_e( 'Outpost Media', 'outpost-media' ); ?></span>
		<?php endif; ?>
	</a>
	<div class="post-card__body">
		<?php get_template_part( 'template-parts/post-meta' ); ?>
		<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
	</div>
</article>
