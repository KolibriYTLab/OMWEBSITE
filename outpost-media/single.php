<?php
/**
 * Single post template.
 *
 * @package OutpostMedia
 */
get_header();
?>
<main id="primary" class="site-main section-shell article-shell">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content-single' );
	endwhile;
	?>
</main>
<?php
get_footer();
