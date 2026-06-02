<?php
/**
 * Page template.
 *
 * @package OutpostMedia
 */
get_header();
?>
<main id="primary" class="site-main section-shell article-shell">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'article page-content' ); ?>>
			<header class="article-header">
				<h1 class="article-title"><?php the_title(); ?></h1>
			</header>
			<div class="article-content">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page sections', 'outpost-media' ) . '">',
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</article>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
