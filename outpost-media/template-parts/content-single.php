<?php
/**
 * Single article content.
 *
 * @package OutpostMedia
 */
$categories = get_the_category();
?>
<article <?php post_class( 'article' ); ?>>
	<header class="article-hero <?php echo has_post_thumbnail() ? 'article-hero--image' : 'article-hero--plain'; ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'full', array( 'class' => 'article-hero__image' ) ); ?>
			<div class="article-hero__overlay" aria-hidden="true"></div>
		<?php endif; ?>
		<div class="article-hero__content section-shell">
			<?php if ( ! empty( $categories ) ) : ?>
				<a class="article-hero__category" href="<?php echo esc_url( get_category_link( $categories[0] ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
			<?php endif; ?>
			<h1 class="article-title"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="article-standfirst"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<div class="article-body-shell section-shell">
		<div class="article-byline">
			<div class="article-byline__avatar" aria-hidden="true"><?php echo esc_html( strtoupper( substr( get_the_author_meta( 'display_name' ), 0, 1 ) ) ); ?></div>
			<div>
				<p><?php the_author_posts_link(); ?></p>
				<span><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
			</div>
		</div>

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
	</div>
</article>
