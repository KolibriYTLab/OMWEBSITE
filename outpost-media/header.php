<?php
/**
 * Site header.
 *
 * @package OutpostMedia
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'outpost-media' ); ?></a>
<header class="site-header">
	<div class="masthead section-shell">
		<div class="site-branding">
			<a class="site-branding__lockup" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<img class="site-branding__mark" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/outpost-knot.svg' ); ?>" alt="" width="56" height="56">
				<?php endif; ?>
				<span class="site-branding__name"><?php bloginfo( 'name' ); ?></span>
			</a>
			<p class="site-branding__tagline"><?php bloginfo( 'description' ); ?></p>
		</div>

		<a class="staff-access" href="<?php echo esc_url( home_url( '/staff-portal/' ) ); ?>"><?php esc_html_e( 'Staff Portal', 'outpost-media' ); ?></a>
		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
			<span><?php esc_html_e( 'Menu', 'outpost-media' ); ?></span>
		</button>
	</div>

	<nav class="primary-navigation section-shell" aria-label="<?php esc_attr_e( 'Primary navigation', 'outpost-media' ); ?>">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
				)
			);
		} else {
			?>
			<ul id="primary-menu">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'outpost-media' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'outpost-media' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/category/news/' ) ); ?>"><?php esc_html_e( 'News', 'outpost-media' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/category/analysis/' ) ); ?>"><?php esc_html_e( 'Analysis', 'outpost-media' ); ?></a></li>
			</ul>
			<?php
		}
		?>
	</nav>
</header>
