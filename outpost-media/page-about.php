<?php
/**
 * Template Name: About Outpost Media
 * Template Post Type: page
 *
 * @package OutpostMedia
 */
get_header();
?>
<main id="primary" class="site-main about-page">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<section class="about-hero section-shell">
			<p class="eyebrow"><?php esc_html_e( 'About the newsroom', 'outpost-media' ); ?></p>
			<h1><?php the_title(); ?></h1>
			<p><?php esc_html_e( 'Outpost Media is an independent editorial project built for clear reporting, grounded analysis, and distinctive public-interest storytelling.', 'outpost-media' ); ?></p>
		</section>

		<section class="about-body section-shell">
			<div class="about-body__content article-content">
				<?php if ( trim( get_the_content() ) ) : ?>
					<?php the_content(); ?>
				<?php else : ?>
					<p><?php esc_html_e( 'We publish reporting, analysis, dispatches, opinion, policy papers, and documentary work with a focus on clarity, independence, and editorial discipline.', 'outpost-media' ); ?></p>
					<p><?php esc_html_e( 'The public website is powered by WordPress posts, categories, excerpts, featured images, and author archives so the newsroom can publish quickly without unnecessary complexity.', 'outpost-media' ); ?></p>
				<?php endif; ?>
			</div>
			<div class="about-values" aria-label="<?php esc_attr_e( 'Editorial values', 'outpost-media' ); ?>">
				<div><span><?php esc_html_e( '01', 'outpost-media' ); ?></span><strong><?php esc_html_e( 'Independence', 'outpost-media' ); ?></strong></div>
				<div><span><?php esc_html_e( '02', 'outpost-media' ); ?></span><strong><?php esc_html_e( 'Accountability', 'outpost-media' ); ?></strong></div>
				<div><span><?php esc_html_e( '03', 'outpost-media' ); ?></span><strong><?php esc_html_e( 'Depth', 'outpost-media' ); ?></strong></div>
				<div><span><?php esc_html_e( '04', 'outpost-media' ); ?></span><strong><?php esc_html_e( 'Clarity', 'outpost-media' ); ?></strong></div>
			</div>
		</section>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
