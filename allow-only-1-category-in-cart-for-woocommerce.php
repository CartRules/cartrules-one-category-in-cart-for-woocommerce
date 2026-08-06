<?php
/**
 * Plugin Name:          Allow Only 1 Category in Cart for WooCommerce
 * Plugin URI:           https://businessbloomer.com/
 * Description:          Restrict the WooCommerce cart to products from a single product category at a time.
 * Version:              1.0.0
 * Requires at least:    6.5
 * Requires PHP:         7.4
 * Requires Plugins:     woocommerce
 * WC requires at least: 8.0
 * WC tested up to:      9.9
 * Author:               Rodolfo Melogli
 * Author URI:           https://businessbloomer.com/
 * License:              GPL v2 or later
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:          allow-only-1-category-in-cart-for-woocommerce
 */

defined( 'ABSPATH' ) || exit;

define( 'AOC_PLUGIN_FILE', __FILE__ );
define( 'AOC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, true );
		}
	}
);

add_action( 'plugins_loaded', 'aoc_init' );

/**
 * Bail with an admin notice if WooCommerce isn't active, otherwise load the plugin.
 */
function aoc_init() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'aoc_missing_wc_notice' );
		return;
	}

	require_once AOC_PLUGIN_DIR . 'includes/class-aoc-cart-restriction.php';
	new AOC_Cart_Restriction();

	add_filter( 'woocommerce_get_settings_pages', 'aoc_add_settings_page' );
}

function aoc_add_settings_page( $settings ) {
	require_once AOC_PLUGIN_DIR . 'includes/class-aoc-settings.php';
	$settings[] = new AOC_Settings_Tab();

	return $settings;
}

function aoc_missing_wc_notice() {
	echo '<div class="notice notice-error"><p>';
	echo esc_html__( 'Allow Only 1 Category in Cart for WooCommerce requires WooCommerce to be installed and active.', 'allow-only-1-category-in-cart-for-woocommerce' );
	echo '</p></div>';
}
