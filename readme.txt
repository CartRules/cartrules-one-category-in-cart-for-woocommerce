=== Allow Only 1 Category in Cart for WooCommerce ===
Contributors: businessbloomer
Tags: woocommerce, cart, product category, restrict cart, checkout
Requires at least: 6.5
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Restrict the WooCommerce cart to products from a single product category at a time.

== Description ==

Allow Only 1 Category in Cart for WooCommerce lets you stop customers from mixing products from different categories in the same order.

Once enabled, when a customer tries to add a product from a different category than what's already in their cart, you can choose to:

* **Block** the new product and show an error message, or
* **Replace** the cart contents automatically with the new product and show a notice explaining what happened

Both messages are fully customizable from WooCommerce > Settings > Only 1 Category.

This is useful for stores that need to keep certain product categories separate at checkout, for example due to different shipping methods, suppliers, or fulfillment processes.

= Features =

* Enable/disable the restriction with one checkbox
* Choose between "block" and "replace" behavior
* Customizable error/notice messages, with a `{category}` placeholder
* No settings bloat, no external services, no tracking

== Installation ==

1. Upload the plugin files to `/wp-content/plugins/allow-only-1-category-in-cart-for-woocommerce`, or install the plugin through the WordPress Plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to WooCommerce > Settings > Only 1 Category to configure.

== Frequently Asked Questions ==

= What happens if a product belongs to more than one category? =

If a product shares at least one category with what's already in the cart, it's allowed. It only blocks/replaces when there is no category overlap at all.

= Does this affect the checkout, or only the cart? =

It only runs when a product is added to the cart (`woocommerce_add_to_cart_validation`). It does not add any checks at checkout.

= Does this work with variable products? =

Yes. Categories are read from the parent product, since categories aren't assigned to individual variations.

== Screenshots ==

1. Plugin settings under WooCommerce > Settings > Only 1 Category

== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
Initial release.
