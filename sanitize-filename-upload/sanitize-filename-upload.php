<?php
/**
 * @package Sanitize Filename Upload
 * @author Alexandre Ferreira
 * @link https://alexandre-ferreira.fr
 * 
 * @wordpress-plugin
 * Plugin Name: Sanitize Filename Upload
 * Plugin URI: https://alexandre-ferreira.fr
 * Description: Lors d'un upload de ficher : supprime les accents, remplace '_' par '-' et met en minuscule
 * Version: 1.0
 * Author: Alexandre Ferreira
 * Author URI: https://alexandre-ferreira.fr
 * Text Domain: alexxandre
 * License: MIT License
 */

defined('ABSPATH') || die();

/**
 * Sanitize the filename
 *
 * @param string $filename The filename.
 * @return string Sanitized filename.
 */
function sanitize_filename($filename) {
	$sanitized_filename = remove_accents($filename);
	$sanitized_filename = str_replace('_', '-', $sanitized_filename);
	$sanitized_filename = strtolower($sanitized_filename);

	return $sanitized_filename;
}
add_filter('sanitize_file_name', 'sanitize_filename', 10, 1);