<?php
/**
 * @package MymeType Support
 * @author QS
 * @link https://qs.team
 * 
 * @wordpress-plugin
 * Plugin Name: Remove Link Attachment Media
 * Plugin URI: https://qs.team
 * Description: Surpprime les liens de page pour les medias
 * Version: 1.0
 * Author: QS
 * Author URI: https://qs.team
 * Text Domain: qs
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