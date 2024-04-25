<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> shrink-0 [&_.woocommerce-Price-currencySymbol]:hidden text-primary [&_bdi]:text-4xl [&_bdi]:!font-semibold [&_bdi]:text-primary [&_ins]:no-underline [&_del_bdi]:!text-xl [&_del_bdi]:!text-black [&_del]:!decoration-black [&_del_bdi]:mr-2.5"><?php echo $product->get_price_html(); ?> <span class="text-primary font-normal text-xl"><?php esc_html_e('net','smoothh') ?></span></p>