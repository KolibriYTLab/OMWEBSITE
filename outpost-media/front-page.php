<?php
/**
 * Homepage template.
 *
 * @package OutpostMedia
 */
get_header();
?>
<main id="primary" class="site-main">
	<section class="hero section-shell">
		<div class="hero__copy">
			<p class="eyebrow"><?php esc_html_e( 'Outpost Media', 'outpost-media' ); ?></p>
			<h1><?php esc_html_e( 'Dispatches from the edge of politics, culture, and public life.', 'outpost-media' ); ?></h1>
			<p><?php esc_html_e( 'A public newsroom theme built around native WordPress publishing: posts, categories, excerpts, authors, and featured images.', 'outpost-media' ); ?></p>
		</div>
		<?php
		$lead_query = new WP_Query(
			array(
				'posts_per_page'      => 1,
				'ignore_sticky_posts' => false,
			)
		);
		?>
		<?php if ( $lead_query->have_posts() ) : ?>
			<div class="hero__lead">
				<?php
				while ( $lead_query->have_posts() ) :
					$lead_query->the_post();
					get_template_part( 'template-parts/content-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php endif; ?>
	</section>

	<section class="section-shell latest-section">
		<div class="section-heading">
			<p class="eyebrow"><?php esc_html_e( 'Newsroom', 'outpost-media' ); ?></p>
			<h2><?php esc_html_e( 'Latest stories', 'outpost-media' ); ?></h2>
		</div>
		<?php
		$latest_query = new WP_Query(
			array(
				'posts_per_page'      => 6,
				'offset'              => 1,
				'ignore_sticky_posts' => true,
			)
		);
		?>
		<?php if ( $latest_query->have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( $latest_query->have_posts() ) :
					$latest_query->the_post();
					get_template_part( 'template-parts/content-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'Publish posts to populate the homepage automatically.', 'outpost-media' ); ?></p>
		<?php endif; ?>
	</section>
</main>
<?php
get_footer();
