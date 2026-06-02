<?php
/**
 * Template Name: Staff Portal Launchpad
 * Template Post Type: page
 *
 * This is only a public-site launchpad. The staff application should live
 * separately on a protected subdomain such as staff.outpostmedia.uk.
 *
 * @package OutpostMedia
 */
get_header();

$staff_links = array(
	array(
		'title'       => __( 'Staff Portal', 'outpost-media' ),
		'description' => __( 'Open the protected staff workspace.', 'outpost-media' ),
		'url'         => 'https://staff.outpostmedia.uk/',
	),
	array(
		'title'       => __( 'Submit a Story', 'outpost-media' ),
		'description' => __( 'Send a pitch, draft, or editorial update.', 'outpost-media' ),
		'url'         => 'mailto:editorial@outpostmedia.uk',
	),
	array(
		'title'       => __( 'Editorial Calendar', 'outpost-media' ),
		'description' => __( 'Review upcoming assignments and publishing dates.', 'outpost-media' ),
		'url'         => 'https://staff.outpostmedia.uk/calendar',
	),
	array(
		'title'       => __( 'Brand Assets', 'outpost-media' ),
		'description' => __( 'Access logos, boilerplate, and style guidance.', 'outpost-media' ),
		'url'         => 'https://staff.outpostmedia.uk/brand',
	),
);
?>
<main id="primary" class="site-main section-shell staff-portal">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<header class="staff-portal__header">
			<p class="eyebrow"><?php esc_html_e( 'Protected resources', 'outpost-media' ); ?></p>
			<h1><?php esc_html_e( 'Staff portal launchpad', 'outpost-media' ); ?></h1>
			<p><?php esc_html_e( 'This WordPress page is a simple launchpad only. The staff portal itself is hosted separately on a protected subdomain.', 'outpost-media' ); ?></p>
		</header>

		<?php if ( post_password_required() ) : ?>
			<div class="article-content staff-portal__content">
				<?php echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		<?php else : ?>
			<div class="staff-grid">
				<?php
				foreach ( $staff_links as $staff_link ) {
					get_template_part( 'template-parts/staff-link-card', null, $staff_link );
				}
				?>
			</div>

			<?php if ( trim( get_the_content() ) ) : ?>
				<div class="article-content staff-portal__content">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
