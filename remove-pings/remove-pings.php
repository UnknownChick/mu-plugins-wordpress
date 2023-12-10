<?php
/**
 * @package Remove Pings
 * @author QS
 * @link https://qs.team
 * 
 * @wordpress-plugin
 * Plugin Name: Remove Pings
 * Plugin URI: https://qs.team
 * Description: Suppression des pings et des trackbacks
 * Version: 1.0
 * Author: QS
 * Author URI: https://qs.team
 * Text Domain: qs
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