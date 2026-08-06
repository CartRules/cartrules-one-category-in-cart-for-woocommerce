<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WC_Settings_Page' ) ) {
	return;
}

/**
 * Adds a "Only 1 Category" tab under WooCommerce > Settings.
 */
class AOC_Settings_Tab extends WC_Settings_Page {

	public function __construct() {
		$this->id    = 'aoc_only_1_category';
		$this->label = __( 'Only 1 Category', 'allow-only-1-category-in-cart-for-woocommerce' );

		parent::__construct();
	}

	public function get_settings( $current_section = '' ) {
		$settings = array(
			array(
				'title' => __( 'Allow Only 1 Category in Cart', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'type'  => 'title',
				'desc'  => __( 'Prevent customers from mixing products from different categories in the same cart.', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'id'    => 'aoc_settings_title',
			),
			array(
				'title'   => __( 'Enable restriction', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'desc'    => __( 'Only allow products from one product category in the cart at a time', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'id'      => 'aoc_enabled',
				'default' => 'no',
				'type'    => 'checkbox',
			),
			array(
				'title'   => __( 'When a different category is added', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'desc'    => __( 'Choose what happens when a customer tries to add a product from a different category', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'id'      => 'aoc_mode',
				'default' => 'deny',
				'type'    => 'select',
				'class'   => 'wc-enhanced-select',
				'options' => array(
					'deny'    => __( 'Block the new product and show an error', 'allow-only-1-category-in-cart-for-woocommerce' ),
					'replace' => __( 'Empty the cart first, then add the new product', 'allow-only-1-category-in-cart-for-woocommerce' ),
				),
			),
			array(
				'title'    => __( 'Blocked message', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'desc_tip' => __( 'Shown when a product is blocked. Use {category} for the category already in the cart.', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'id'       => 'aoc_deny_message',
				'default'  => __( 'You already have products from "{category}" in your cart. Please remove them first, or complete that order separately.', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'type'     => 'textarea',
				'css'      => 'width:100%; height: 75px;',
			),
			array(
				'title'    => __( 'Replaced message', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'desc_tip' => __( 'Shown when the cart is emptied and replaced. Use {category} for the category that was removed.', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'id'       => 'aoc_replace_message',
				'default'  => __( 'Your cart contained products from "{category}", so we replaced them with your new selection.', 'allow-only-1-category-in-cart-for-woocommerce' ),
				'type'     => 'textarea',
				'css'      => 'width:100%; height: 75px;',
			),
			array(
				'type' => 'sectionend',
				'id'   => 'aoc_settings_end',
			),
		);

		return apply_filters( 'aoc_settings', $settings );
	}
}
