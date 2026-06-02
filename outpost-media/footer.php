<?php
/**
 * Site footer.
 *
 * @package OutpostMedia
 */
?>
<footer class="site-footer">
	<div class="site-footer__inner section-shell">
		<div class="site-footer__brand-block">
			<span class="site-footer__mark-wrap"><img class="site-footer__mark" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/outpost-knot.svg' ); ?>" alt="" width="48" height="48"></span>
			<div>
				<p class="site-footer__brand"><?php bloginfo( 'name' ); ?></p>
				<p class="site-footer__tagline"><?php esc_html_e( 'Independent · Uncompromised', 'outpost-media' ); ?></p>
			</div>
		</div>
		<p class="site-footer__mission"><?php esc_html_e( 'Independent journalism from outside the mainstream. No agenda, no corporate backing — just the truth about what matters in Britain and beyond.', 'outpost-media' ); ?></p>
		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'outpost-media' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<div class="site-footer__bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'outpost-media' ); ?></p>
			<p><?php esc_html_e( 'Made in Britain', 'outpost-media' ); ?></p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
