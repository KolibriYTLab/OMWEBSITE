<?php
/**
 * Outpost Media theme functions.
 *
 * @package OutpostMedia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'outpost_media_setup' ) ) {
	/**
	 * Register theme supports and navigation menus.
	 */
	function outpost_media_setup() {
		load_theme_textdomain( 'outpost-media', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/theme.css' );
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 240,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'outpost-media' ),
				'footer'  => __( 'Footer Menu', 'outpost-media' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'outpost_media_setup' );

/**
 * Enqueue public assets.
 */
function outpost_media_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'outpost-media-theme',
		get_template_directory_uri() . '/assets/css/theme.css',
		array(),
		$theme_version
	);

	wp_enqueue_script(
		'outpost-media-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'outpost_media_enqueue_assets' );

/**
 * Return a compact category list for post cards and metadata.
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function outpost_media_get_category_list( $post_id = null ) {
	$categories = get_the_category( $post_id );

	if ( empty( $categories ) || is_wp_error( $categories ) ) {
		return '';
	}

	$links = array();
	foreach ( $categories as $category ) {
		$links[] = sprintf(
			'<a href="%1$s">%2$s</a>',
			esc_url( get_category_link( $category ) ),
			esc_html( $category->name )
		);
	}

	return implode( '<span aria-hidden="true"> / </span>', $links );
}

/**
 * Print article sources stored in post meta.
 *
 * Editors can add one source per line in a custom field named `article_sources`.
 */
function outpost_media_the_sources() {
	$sources = get_post_meta( get_the_ID(), 'article_sources', true );

	if ( empty( $sources ) ) {
		return;
	}

	$items = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) $sources ) ) );

	if ( empty( $items ) ) {
		return;
	}
	?>
	<aside class="article-sources" aria-labelledby="article-sources-title">
		<h2 id="article-sources-title"><?php esc_html_e( 'Sources', 'outpost-media' ); ?></h2>
		<ul>
			<?php foreach ( $items as $item ) : ?>
				<li><?php echo wp_kses_post( make_clickable( esc_html( $item ) ) ); ?></li>
			<?php endforeach; ?>
		</ul>
	</aside>
	<?php
}

/**
 * Add a readable excerpt fallback for posts without manual excerpts.
 *
 * @param int $length Excerpt length.
 * @return int
 */
function outpost_media_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}

	return 28;
}
add_filter( 'excerpt_length', 'outpost_media_excerpt_length' );
