<?php
// phpcs:ignoreFile
/**
 *
 * @wordpress-plugin
 * Plugin Name:         Skt Practices
 * Plugin URI:          https://www.sktplugins.com/wordpress-plugins
 * Description:         plugin test
 * Version:             1.0.0
 * Author:              Shakhawat
 * Author URI:          https://www.shakhawat.com
 * Text Domain:         skt
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Protect direct access
 */
defined( 'ABSPATH' ) || exit;

/**
 * Defining constants
 */
if ( ! defined( 'SKT_PRAC_VERSION' ) ) define( 'SKT_PRAC_VERSION', '1.6.1' );
if ( ! defined( 'SKT_PRAC_PLUGIN_DIR' ) ) define( 'SKT_PRAC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if ( ! defined( 'SKT_PRAC_PLUGIN_URI' ) ) define( 'SKT_PRAC_PLUGIN_URI', plugins_url( '', __FILE__ ) );
if ( ! defined( 'SKT_PRAC_BASE_NAME' ) ) define( 'SKT_PRAC_BASE_NAME', plugin_basename( __FILE__ ) );

if ( ! class_exists( '\SKTPRAC\Autoloader' ) ) {
    require GS_WOO_PLUGIN_DIR . 'includes/autoloader.php';
    \SKTPRAC\Autoloader::init();
}

require_once GS_WOO_PLUGIN_DIR . 'includes/plugin.php';