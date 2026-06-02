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
	<div class="site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-branding__name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
			<p class="site-branding__tagline"><?php bloginfo( 'description' ); ?></p>
		</div>

		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
			<span><?php esc_html_e( 'Menu', 'outpost-media' ); ?></span>
		</button>

		<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'outpost-media' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>

		<a class="staff-access" href="<?php echo esc_url( home_url( '/staff-portal/' ) ); ?>"><?php esc_html_e( 'Staff Portal', 'outpost-media' ); ?></a>
	</div>
</header>
