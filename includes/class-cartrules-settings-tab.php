<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WC_Settings_Page' ) || class_exists( 'CartRules_Settings_Tab' ) ) {
	return;
}

/**
 * Shared "CartRules" tab under WooCommerce > Settings.
 *
 * Every CartRules plugin bundles this same file. The class_exists() guard above means
 * whichever CartRules plugin loads first defines the tab; the others just reuse it and
 * add their own section via the woocommerce_get_sections_cartrules /
 * woocommerce_get_settings_cartrules filters.
 */
class CartRules_Settings_Tab extends WC_Settings_Page {

	public function __construct() {
		$this->id    = 'cartrules';
		$this->label = __( 'CartRules', 'cartrules-one-category-in-cart-for-woocommerce' );

		parent::__construct();
	}

	protected function get_own_sections() {
		return array();
	}
}
