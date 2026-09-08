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
			/* translators: %s: link to the CartRules PRO plugin page. */
			'desc'  => sprintf(
				__( 'Prevent customers from mixing products from different categories in the same cart. Need more control? %1$s puts every cart rule (category, tag, brand, shipping class, product type) in one place. Each rule can target specific categories instead of "any one at a time" (for example, only keep "Gift Cards" separate), and you get unlimited custom rules with full control over when each one applies. It also checks for other cart restrictions already running on your store, whether from another CartRules plugin or your own custom code, so nothing quietly conflicts.', 'cartrules-one-category-in-cart-for-woocommerce' ),
				'<a href="https://cartrules.com/product/cartrules-one-in-cart-pro/" target="_blank" rel="noopener noreferrer">CartRules One in Cart PRO</a>'
			),
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
