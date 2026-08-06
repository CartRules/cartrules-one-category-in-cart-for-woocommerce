=== Allow Only 1 Category in Cart for WooCommerce ===
Contributors: businessbloomer
Tags: woocommerce, cart, product category, restrict cart, checkout
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin ensures customers can only buy products from one category at a time.

== Description ==

This plugin stops customers from mixing products from different categories in the same order. If a product is already in the cart, adding a product from a different category will either be blocked, or the cart will be emptied first, depending on the option you choose.

This is useful for stores that need to keep certain product categories separate at checkout, for example because they need different shipping, come from different suppliers, or are fulfilled differently.

Once activated, go to WooCommerce > Settings > Only 1 Category to turn the restriction on and choose what should happen.

== Installation ==

Upload the plugin folder to `/wp-content/plugins/`, activate it through WordPress's Plugins menu, then go to WooCommerce > Settings > Only 1 Category to turn it on.

== Frequently Asked Questions ==

= What happens if a product belongs to more than one category? =

It's allowed, as long as it shares at least one category with what's already in the cart.

= Does this work with variable products? =

Yes, it works with all product types.

== Changelog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
Initial release.
