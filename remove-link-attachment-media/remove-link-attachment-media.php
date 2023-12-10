<?php
/**
 * @package MymeType Support
 * @author Alexandre Ferreira
 * @link https://alexandre-ferreira.fr
 * 
 * @wordpress-plugin
 * Plugin Name: Remove Link Attachment Media
 * Plugin URI: https://alexandre-ferreira.fr
 * Description: Surpprime les liens de page pour les medias
 * Version: 1.0
 * Author: Alexandre Ferreira
 * Author URI: https://alexandre-ferreira.fr
 * Text Domain: alexxandre
 * License: MIT License
 */

defined('ABSPATH') || die();

/**
 * @param mixed $data
 * @param mixed $postarr
 * 
 * @return [type]
 */
function disable_attachment_urls($data) {
	if (isset( $data['post_type']) && $data['post_type'] == 'attachment') {
		$data['guid'] = '';
	}
	return $data;
}

add_filter('wp_insert_attachment_data', 'disable_attachment_urls', 10, 1)
?>