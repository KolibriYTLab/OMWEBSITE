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
		'posts_per_page'      => 4,
		'offset'              => 5,
		'ignore_sticky_posts' => true,
	)
);
?>
<main id="primary" class="site-main site-main--home">
	<?php if ( $lead_query->have_posts() ) : ?>
		<?php
		while ( $lead_query->have_posts() ) :
			$lead_query->the_post();
			$lead_category = get_the_category();
			?>
			<section class="home-hero" aria-labelledby="home-hero-title">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'full', array( 'class' => 'home-hero__image' ) ); ?>
				<?php endif; ?>
				<div class="home-hero__overlay" aria-hidden="true"></div>
				<div class="home-hero__content section-shell">
					<?php if ( ! empty( $lead_category ) ) : ?>
						<a class="home-hero__category" href="<?php echo esc_url( get_category_link( $lead_category[0] ) ); ?>"><?php echo esc_html( $lead_category[0]->name ); ?></a>
					<?php endif; ?>
					<h1 id="home-hero-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="home-hero__excerpt"><?php the_excerpt(); ?></div>
					<div class="home-hero__meta">
						<span><?php the_author(); ?></span>
						<span aria-hidden="true">·</span>
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<a class="home-hero__read" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read →', 'outpost-media' ); ?></a>
					</div>
				</div>
			</section>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
	<?php else : ?>
		<section class="home-hero home-hero--empty" aria-labelledby="home-hero-title">
			<div class="home-hero__overlay" aria-hidden="true"></div>
			<div class="home-hero__content section-shell">
				<span class="home-hero__category"><?php esc_html_e( 'Outpost Media', 'outpost-media' ); ?></span>
				<h1 id="home-hero-title"><?php esc_html_e( 'Independent. Uncompromised.', 'outpost-media' ); ?></h1>
				<p><?php esc_html_e( 'Publish your first WordPress post with a featured image to populate this lead story area.', 'outpost-media' ); ?></p>
			</div>
		</section>
	<?php endif; ?>

	<section class="section-shell newsroom-section" aria-labelledby="latest-title">
		<header class="section-heading section-heading--make">
			<h2 id="latest-title"><?php esc_html_e( 'Latest', 'outpost-media' ); ?></h2>
		</header>
		<?php if ( $latest_query->have_posts() ) : ?>
			<div class="latest-grid">
				<?php
				while ( $latest_query->have_posts() ) :
					$latest_query->the_post();
					get_template_part( 'template-parts/content-card', null, array( 'variant' => 'latest' ) );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content-none' ); ?>
		<?php endif; ?>
	</section>

	<section class="section-shell featured-section" aria-labelledby="featured-title">
		<header class="section-heading section-heading--make">
			<h2 id="featured-title"><?php esc_html_e( 'Featured', 'outpost-media' ); ?></h2>
		</header>
		<div class="featured-layout">
			<?php if ( $featured_query->have_posts() ) : ?>
				<div class="featured-primary">
					<?php
					$featured_query->the_post();
					get_template_part( 'template-parts/content-card', null, array( 'variant' => 'feature-large' ) );
					?>
				</div>
				<div class="featured-side">
					<?php
					while ( $featured_query->have_posts() ) :
						$featured_query->the_post();
						get_template_part( 'template-parts/content-card', null, array( 'variant' => 'feature-side' ) );
					endwhile;
					wp_reset_postdata();
					?>
					<div class="newsletter-card" id="subscribe">
						<p><?php esc_html_e( 'Newsletter', 'outpost-media' ); ?></p>
						<h3><?php esc_html_e( 'The Outpost Dispatch', 'outpost-media' ); ?></h3>
						<span><?php esc_html_e( 'Weekly analysis and original reporting — no spin, no corporate backing.', 'outpost-media' ); ?></span>
					</div>
				</div>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content-none' ); ?>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
