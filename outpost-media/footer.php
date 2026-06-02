<?php
/**
 * Site footer.
 *
 * @package OutpostMedia
 */
?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<div>
			<p class="site-footer__brand"><?php bloginfo( 'name' ); ?></p>
			<p><?php esc_html_e( 'Independent reporting, analysis, and culture from Outpost Media.', 'outpost-media' ); ?></p>
		</div>
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
		<p class="site-footer__copyright">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.</p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
