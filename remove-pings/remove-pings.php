<?php
/**
 * @package Remove Pings
 * @author Alexandre Ferreira
 * @link https://alexandre-ferreira.fr
 * 
 * @wordpress-plugin
 * Plugin Name: Remove Pings
 * Plugin URI: https://alexandre-ferreira.fr
 * Description: Suppression des pings et des trackbacks
 * Version: 1.0
 * Author: Alexandre Ferreira
 * Author URI: https://alexandre-ferreira.fr
 * Text Domain: alexxandre
 * License: MIT License
 */

defined('ABSPATH') || die();

/**
 * Supprime les pings et des trackbacks
 * 
 * @param mixed $links
 * 
 * @return [type]
 */
function disable_self_trackback(&$links) {
	foreach ($links as $l => $link)
		if (0 === strpos( $link, get_option('home')))
			unset($links[$l]);
}
add_action('pre_ping', 'disable_self_trackback');
?>