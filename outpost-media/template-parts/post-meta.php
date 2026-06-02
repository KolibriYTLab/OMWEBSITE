<?php
/**
 * Shared post metadata.
 *
 * @package OutpostMedia
 */
?>
<div class="post-meta">
	<?php if ( outpost_media_get_category_list() ) : ?>
		<span class="post-meta__categories"><?php echo wp_kses_post( outpost_media_get_category_list() ); ?></span>
	<?php endif; ?>
	<span><?php esc_html_e( 'By', 'outpost-media' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
	<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
</div>
