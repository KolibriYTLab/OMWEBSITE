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

$quick_links = array(
	'Publication Log' => 'https://staff.outpostmedia.uk/publication-log',
	'Situation Room'  => 'https://staff.outpostmedia.uk/situation-room',
	'WordPress'       => admin_url(),
	'Google Drive'    => 'https://drive.google.com/',
	'Discord'         => 'https://discord.com/',
);

$sections = array(
	'Newsroom'       => array(
		'purpose' => __( 'Editorial workflow and story management.', 'outpost-media' ),
		'links'   => array( 'Publication Log', 'Story Templates', 'Writing Style Guide', 'Investigation Log Template', 'Right of Reply Template', 'Discord Command Guide' ),
	),
	'Production'     => array(
		'purpose' => __( 'Publishing and media production.', 'outpost-media' ),
		'links'   => array( 'WordPress Admin', 'Draft Posts', 'Media Library', 'Categories', 'X Account', 'YouTube Studio', 'Brand Assets', 'Logo Downloads', 'Fonts', 'X Card Templates' ),
	),
	'Intelligence'   => array(
		'purpose' => __( 'Monitoring and information gathering.', 'outpost-media' ),
		'links'   => array( 'Situation Room', 'Real-Time Monitoring Platform', 'Newswire Intake System', 'Geotagging Globe', 'RSS Monitoring', 'OSINT Resources' ),
	),
	'Documents'      => array(
		'purpose' => __( 'Access to important organisational documents.', 'outpost-media' ),
		'links'   => array( 'Publication Log', 'Editorial Handbook', 'Style Guide', 'Staff Directory', 'Research Dossiers', 'Background Briefings', 'Policy Papers', 'Training Materials' ),
	),
	'Meetings'       => array(
		'purpose' => __( 'Internal organisational planning.', 'outpost-media' ),
		'links'   => array( 'Committee Agendas', 'Meeting Minutes', 'Action Items', 'Editorial Calendar', 'Weekly Planning Documents' ),
	),
	'Administration' => array(
		'purpose' => __( 'Internal systems and organisational management.', 'outpost-media' ),
		'links'   => array( 'Staff Directory', 'Contact Information', 'Role Descriptions', 'Google Workspace' ),
	),
);
?>
<main id="primary" class="site-main staff-portal">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<header class="staff-portal__hero section-shell">
			<p class="eyebrow"><?php esc_html_e( 'Protected resources', 'outpost-media' ); ?></p>
			<h1><?php esc_html_e( 'Outpost Staff Portal', 'outpost-media' ); ?></h1>
			<p><?php esc_html_e( 'A simple launchpad for newsroom tools, systems, documents, and resources. No analytics dashboard, no project management bloat.', 'outpost-media' ); ?></p>
		</header>

		<?php if ( post_password_required() ) : ?>
			<div class="section-shell article-content staff-portal__content">
				<?php echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		<?php else : ?>
			<nav class="quick-access section-shell" aria-label="<?php esc_attr_e( 'Staff quick access', 'outpost-media' ); ?>">
				<?php foreach ( $quick_links as $label => $url ) : ?>
					<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
				<?php endforeach; ?>
			</nav>

			<section class="section-shell staff-section-grid" aria-label="<?php esc_attr_e( 'Staff portal sections', 'outpost-media' ); ?>">
				<?php foreach ( $sections as $section_title => $section ) : ?>
					<a class="staff-section-card" href="#<?php echo esc_attr( sanitize_title( $section_title ) ); ?>">
						<span><?php echo esc_html( $section_title ); ?></span>
						<small><?php echo esc_html( $section['purpose'] ); ?></small>
					</a>
				<?php endforeach; ?>
			</section>

			<section class="section-shell staff-directory" aria-label="<?php esc_attr_e( 'Staff portal link directory', 'outpost-media' ); ?>">
				<?php foreach ( $sections as $section_title => $section ) : ?>
					<div class="staff-directory__section" id="<?php echo esc_attr( sanitize_title( $section_title ) ); ?>">
						<h2><?php echo esc_html( $section_title ); ?></h2>
						<p><?php echo esc_html( $section['purpose'] ); ?></p>
						<div class="staff-link-list">
							<?php foreach ( $section['links'] as $link_label ) : ?>
								<a href="<?php echo esc_url( 'https://staff.outpostmedia.uk/' . sanitize_title( $link_label ) ); ?>"><?php echo esc_html( $link_label ); ?></a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</section>

			<?php if ( trim( get_the_content() ) ) : ?>
				<div class="section-shell article-content staff-portal__content">
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
