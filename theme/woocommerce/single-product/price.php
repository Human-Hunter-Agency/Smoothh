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
<?php if (is_user_logged_in() || is_prod_guest_available($product)) : ?>
    <div class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-2 flex items-end shrink-0 [&_.woocommerce-Price-currencySymbol]:hidden text-primary [&_bdi]:text-4xl [&_bdi]:!font-normal [&_bdi]:text-primary [&_ins]:no-underline [&_del_bdi]:!text-xl [&_del_bdi]:!text-black [&_del]:h-8 [&_del]:!decoration-black [&_del_bdi]:mr-1.5">
        <p class="flex flex-col"><?php echo $product->get_price_html(); ?> </p>
        <span class="net-label text-primary font-normal text-xl md:text-2xl"><?php esc_html_e('net','smoothh') ?></span>
    </div>
<?php endif; ?>