<?php
/**
 * @package MymeType Support
 * @author QS
 * @link https://qs.team
 * 
 * @wordpress-plugin
 * Plugin Name: MimeType Support
 * Plugin URI: https://qs.team
 * Description: Accceptation upload SVG et PDF
 * Version: 1.0
 * Author: QS
 * Author URI: https://qs.team
 * Text Domain: qs
 * License: MIT License
 */

defined('ABSPATH') || die();

/**
 * @param mixed $mime_types
 * 
 * @return [type]
 */
function mimeType_support($mime_types){
	$mime_types['svg'] = 'image/svg+xml';
	$mime_types['pdf'] = 'application/pdf';
	return $mime_types;
}
add_filter('upload_mimes', 'mimeType_support', 15, 1);
?>