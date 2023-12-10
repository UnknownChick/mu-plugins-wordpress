<?php
/**
 * @package Remove Version
 * @author QS
 * @link https://qs.team
 * 
 * @wordpress-plugin
 * Plugin Name: Remove Version
 * Plugin URI: https://qs.team
 * Description: Suppression de la version de WordPress, CSS et JS
 * Version: 1.0
 * Author: QS
 * Author URI: https://qs.team
 * Text Domain: qs
 * License: MIT License
 */

defined('ABSPATH') || die();

/**
 * Suppresion de la verison de WordPress
 * 
 * @return [type]
 */
function wp_version_remove() {
	return '';
}
add_filter('the_generator', 'wp_version_remove');

/**
 * Suppresion des versions des fichiers CSS et JS
 * 
 * @param mixed $src
 * 
 * @return [type]
 */
function remove_wp_version_strings($src) {
	global $wp_version;
	parse_str(parse_url($src, PHP_URL_QUERY), $query);
	if (!empty($query['ver']) && $query['ver'] === $wp_version) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter('script_loader_src', 'remove_wp_version_strings', 15, 1);
add_filter('style_loader_src', 'remove_wp_version_strings', 15, 1);
remove_action('wp_head', 'wp_generator');
?>