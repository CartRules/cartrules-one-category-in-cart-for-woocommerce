<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WC_Settings_Page' ) || class_exists( 'CartRules_Settings_Tab' ) ) {
	return;
}

/**
 * Shared "Cart Rules" tab under WooCommerce > Settings.
 *
 * Every Cart Rules plugin bundles this same file. The class_exists() guard above means
 * whichever Cart Rules plugin loads first defines the tab; the others just reuse it and
 * add their own section via the woocommerce_get_sections_cartrules /
 * woocommerce_get_settings_cartrules filters.
 */
class CartRules_Settings_Tab extends WC_Settings_Page {

	public function __construct() {
		$this->id    = 'cartrules';
		$this->label = __( 'Cart Rules', 'cart-rules-one-category-in-cart' );

		parent::__construct();
	}

	protected function get_own_sections() {
		return array();
	}
}
