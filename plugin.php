<?php
/**
 * Plugin Name:     (WP-EXT) ShortCode
 * Plugin URI:      https://metastore.pro/
 *
 * Description:     ShortCodes collection.
 *
 * Author:          Kitsune Solar
 * Author URI:      https://kitsune.solar/
 *
 * Version:         1.0.0
 *
 * Text Domain:     wp-ext-shortcode
 * Domain Path:     /languages
 *
 * License:         GPLv3
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Loading `WP_EXT_ShortCode`.
 * ------------------------------------------------------------------------------------------------------------------ */

function run_wp_ext_shortcode() {
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_ShortCode.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_ShortCode_CodeAddress.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_ShortCode_CodeEmail.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_ShortCode_CodeFax.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_ShortCode_CodeIcon.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_ShortCode_CodeTel.class.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/WP_EXT_ShortCode_Theme.class.php' );
}

run_wp_ext_shortcode();
