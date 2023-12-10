<?php
/**
 * @package Remove Unnecessary Script
 * @author Alexandre Ferreira
 * @link https://alexandre-ferreira.fr
 * 
 * @wordpress-plugin
 * Plugin Name: Remove Unnecessary Script
 * Plugin URI: https://alexandre-ferreira.fr
 * Description: Suppression des scripts (CSS et JS) inutile a la conception et au bon fonctionnement du site
 * Version: 1.1
 * Author: Alexandre Ferreira
 * Author URI: https://alexandre-ferreira.fr
 * Text Domain: alexxandre
 * License: MIT License
 */

defined('ABSPATH') || die();

/**
 * Suppresion des scripts Gutenberg sur le frontend
 * 
 * @return [type]
 */
function apmu_remove_block_css() {
	if (!is_admin()) {
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
	}
}
add_action('wp_enqueue_scripts', 'apmu_remove_block_css');

// Supression des Emojis
function remove_emojis() {
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init','remove_emojis');

// Suppresion de Dashicon sur le front en non connecté
function remove_dashicons() {
	if (current_user_can('administrator')) {
		return;
	}
	wp_deregister_style('dashicons');
}
add_action('wp_enqueue_scripts', 'remove_dashicons');

// Suppresion de WLW Manifest link (Windows Live Writer)
remove_action('wp_head', 'wlwmanifest_link');

// Suppresion de RSD (Really Simple Discovery) link
remove_action('wp_head', 'rsd_link');
?>