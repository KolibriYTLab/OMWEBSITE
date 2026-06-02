<?php
/**
 * Staff portal link card.
 *
 * Expected args: title, description, url.
 *
 * @package OutpostMedia
 */
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$url         = $args['url'] ?? '#';
?>
<a class="staff-card" href="<?php echo esc_url( $url ); ?>">
	<span class="staff-card__title"><?php echo esc_html( $title ); ?></span>
	<span class="staff-card__description"><?php echo esc_html( $description ); ?></span>
</a>
