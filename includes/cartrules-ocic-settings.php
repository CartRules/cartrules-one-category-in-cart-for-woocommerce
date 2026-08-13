<?php

defined( 'ABSPATH' ) || exit;

/**
 * Adds this module's "One Category in Cart" section to the shared "CartRules" tab.
 */

add_filter( 'woocommerce_get_sections_cartrules', 'cartrules_ocic_add_settings_section' );
add_filter( 'woocommerce_get_settings_cartrules', 'cartrules_ocic_settings_fields', 10, 2 );

function cartrules_ocic_add_settings_section( $sections ) {
	$sections['ocic'] = __( 'One Category in Cart', 'cartrules-one-category-in-cart-for-woocommerce' );

	return $sections;
}

function cartrules_ocic_settings_fields( $settings, $section_id ) {
	if ( 'ocic' !== $section_id ) {
		return $settings;
	}

	return array(
		array(
			'title' => __( 'One Category in Cart', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'type'  => 'title',
			'desc'  => __( 'Prevent customers from mixing products from different categories in the same cart.', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'id'    => 'cartrules_ocic_settings_title',
		),
		array(
			'title'   => __( 'Enable restriction', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'desc'    => __( 'Only allow products from one product category in the cart at a time', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'id'      => 'cartrules_ocic_enabled',
			'default' => 'no',
			'type'    => 'checkbox',
		),
		array(
			'title'   => __( 'When a different category is added', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'desc'    => __( 'Choose what happens when a customer tries to add a product from a different category', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'id'      => 'cartrules_ocic_mode',
			'default' => 'deny',
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'options' => array(
				'deny'    => __( 'Block the new product and show an error', 'cartrules-one-category-in-cart-for-woocommerce' ),
				'replace' => __( 'Empty the cart first, then add the new product', 'cartrules-one-category-in-cart-for-woocommerce' ),
			),
		),
		array(
			'title'    => __( 'Blocked message', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'desc_tip' => __( 'Shown when a product is blocked. Use {category} for the category already in the cart.', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'id'       => 'cartrules_ocic_deny_message',
			'default'  => __( 'You already have products from "{category}" in your cart. Please remove them first, or complete that order separately.', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'type'     => 'textarea',
			'css'      => 'width:100%; height: 75px;',
		),
		array(
			'title'    => __( 'Replaced message', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'desc_tip' => __( 'Shown when the cart is emptied and replaced. Use {category} for the category that was removed.', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'id'       => 'cartrules_ocic_replace_message',
			'default'  => __( 'Your cart contained products from "{category}", so we replaced them with your new selection.', 'cartrules-one-category-in-cart-for-woocommerce' ),
			'type'     => 'textarea',
			'css'      => 'width:100%; height: 75px;',
		),
		array(
			'type' => 'sectionend',
			'id'   => 'cartrules_ocic_settings_end',
		),
	);
}
