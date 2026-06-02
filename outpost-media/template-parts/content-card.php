<?php
/**
 * Post card template part.
 *
 * @package OutpostMedia
 */
$variant = $args['variant'] ?? '';
$classes = trim( 'post-card ' . ( $variant ? 'post-card--' . sanitize_html_class( $variant ) : '' ) );
?>
<article <?php post_class( $classes ); ?>>
	<a class="post-card__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php else : ?>
			<span class="post-card__image-placeholder"><?php esc_html_e( 'Outpost Media', 'outpost-media' ); ?></span>
		<?php endif; ?>
	</a>
	<div class="post-card__body">
		<?php get_template_part( 'template-parts/post-meta' ); ?>
		<h3 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php if ( 'feature-side' !== $variant && 'latest' !== $variant ) : ?>
			<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
		<?php endif; ?>
	</div>
</article>
