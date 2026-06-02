<?php
/**
 * Homepage template.
 *
 * @package OutpostMedia
 */
get_header();

$lead_query = new WP_Query(
	array(
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => false,
	)
);
$latest_query = new WP_Query(
	array(
		'posts_per_page'      => 4,
		'offset'              => 1,
		'ignore_sticky_posts' => true,
	)
);
$featured_query = new WP_Query(
	array(
		'posts_per_page'      => 3,
		'offset'              => 5,
		'ignore_sticky_posts' => true,
	)
);
?>
<main id="primary" class="site-main">
	<section class="home-intro section-shell" aria-labelledby="home-intro-title">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Independent newsroom', 'outpost-media' ); ?></p>
			<h1 id="home-intro-title"><?php esc_html_e( 'Outpost Media', 'outpost-media' ); ?></h1>
		</div>
		<p><?php esc_html_e( 'Reporting, analysis, dispatches, opinion, policy writing, and documentary work from a sharp independent editorial desk.', 'outpost-media' ); ?></p>
	</section>

	<section class="section-shell newsroom-section" aria-labelledby="latest-title">
		<header class="section-heading section-heading--ruled">
			<h2 id="latest-title"><?php esc_html_e( 'Newest Articles', 'outpost-media' ); ?></h2>
		</header>

		<?php if ( $lead_query->have_posts() ) : ?>
			<div class="lead-layout">
				<?php
				while ( $lead_query->have_posts() ) :
					$lead_query->the_post();
					?>
					<article <?php post_class( 'lead-card' ); ?>>
						<a class="lead-card__image" href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php else : ?>
								<span><?php esc_html_e( 'Outpost Media', 'outpost-media' ); ?></span>
							<?php endif; ?>
						</a>
						<div class="lead-card__body">
							<?php get_template_part( 'template-parts/post-meta' ); ?>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="lead-card__excerpt"><?php the_excerpt(); ?></div>
						</div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
				?>

				<?php if ( $latest_query->have_posts() ) : ?>
					<div class="compact-grid">
						<?php
						while ( $latest_query->have_posts() ) :
							$latest_query->the_post();
							get_template_part( 'template-parts/content-card', null, array( 'variant' => 'compact' ) );
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'Publish posts to populate the homepage automatically.', 'outpost-media' ); ?></p>
		<?php endif; ?>
	</section>

	<section class="section-shell featured-section" aria-labelledby="featured-title">
		<header class="section-heading section-heading--ruled">
			<h2 id="featured-title"><?php esc_html_e( 'Featured Articles', 'outpost-media' ); ?></h2>
			<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>"><?php esc_html_e( 'View all', 'outpost-media' ); ?></a>
		</header>
		<?php if ( $featured_query->have_posts() ) : ?>
			<div class="featured-grid">
				<?php
				while ( $featured_query->have_posts() ) :
					$featured_query->the_post();
					get_template_part( 'template-parts/content-card', null, array( 'variant' => 'feature' ) );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'More featured stories will appear here as the archive grows.', 'outpost-media' ); ?></p>
		<?php endif; ?>
	</section>
</main>
<?php
get_footer();
