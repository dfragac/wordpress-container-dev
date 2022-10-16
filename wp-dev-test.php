<?php
/**
 * WordPress Docker Xdebug plugin
 *
 * @package           WpDockerXdebug
 * @author            Mario Yepes
 * @copyright         2020 Mario Yepes
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Docker Xdebug plugin
 * Plugin URI:        https://marioyepes.com
 * Description:       A plugin that shows the status of Xdebug in Tools > Xdebug Info
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mario Yepes
 * Author URI:        https://marioyepes.com
 * Text Domain:       wordpress-docker-xdebug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://marioyepes.com
 */

add_action( 'admin_menu', 'add_php_info_page' );

/**
 * Add the Xdebug Info page to the Tools menu.
 */
function add_php_info_page() {
	add_submenu_page(
		'tools.php',           // Parent page.
		'Xdebug Info',         // Menu title.
		'Xdebug Info',         // Page title.
		'manage_options',      // user "role".
		'php-info-page',       // page slug.
		'php_info_page_body'
	);
}

/**
 * Display the Xdebug Info page.
 */
function php_info_page_body() {
	$message = '<h2>No Xdebug enabled</h2>';
	if ( function_exists( 'xdebug_info' ) ) {
		xdebug_info();
	} else {
		echo $message;
	}
}
