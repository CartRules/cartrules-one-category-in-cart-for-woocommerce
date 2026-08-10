<?php

defined( 'ABSPATH' ) || exit;

/**
 * Blocks or replaces cart contents when a product from a different category is added.
 */
class CartRules_OCIC_Cart_Restriction {

	public function __construct() {
		add_filter( 'woocommerce_add_to_cart_validation', array( $this, 'validate_add_to_cart' ), 10, 2 );
	}

	/**
	 * @param bool $passed
	 * @param int  $product_id
	 * @return bool
	 */
	public function validate_add_to_cart( $passed, $product_id ) {
		if ( ! $passed || 'yes' !== get_option( 'cartrules_ocic_enabled', 'no' ) || WC()->cart->is_empty() ) {
			return $passed;
		}

		$new_categories = $this->get_product_category_ids( $product_id );

		if ( empty( $new_categories ) ) {
			return $passed;
		}

		$cart_categories = array();

		foreach ( WC()->cart->get_cart() as $cart_item ) {
			$cart_categories = array_merge( $cart_categories, $this->get_product_category_ids( $cart_item['product_id'] ) );
		}

		$cart_categories = array_values( array_unique( $cart_categories ) );

		if ( empty( $cart_categories ) || array_intersect( $new_categories, $cart_categories ) ) {
			return $passed;
		}

		$existing_category_name = $this->get_category_name( $cart_categories[0] );

		if ( 'replace' === get_option( 'cartrules_ocic_mode', 'deny' ) ) {
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				WC()->cart->remove_cart_item( $cart_item_key );
			}

			wc_add_notice( $this->build_message( 'cartrules_ocic_replace_message', $existing_category_name ), 'notice' );

			return true;
		}

		wc_add_notice( $this->build_message( 'cartrules_ocic_deny_message', $existing_category_name ), 'error' );

		return false;
	}

	private function build_message( $option_id, $category_name ) {
		$message = get_option( $option_id );

		return str_replace( '{category}', $category_name, $message );
	}

	private function get_product_category_ids( $product_id ) {
		$terms = get_the_terms( $product_id, 'product_cat' );

		if ( ! $terms || is_wp_error( $terms ) ) {
			return array();
		}

		return wp_list_pluck( $terms, 'term_id' );
	}

	private function get_category_name( $term_id ) {
		$term = get_term( $term_id, 'product_cat' );

		return $term && ! is_wp_error( $term ) ? $term->name : '';
	}
}
