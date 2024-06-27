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

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
$has_variable_price = get_field('variable_price');
$is_hourly = get_field('product_hourly');

?>
<?php if (!$product->is_type('variable')) : // if (is_user_logged_in() || is_prod_guest_available($product)) : 
?>
    <div class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?> pb-5 flex flex-col gap-1 border-b-[1px] border-[#D6D6D6]">
        <?php
        woocommerce_quantity_input(
            array(
                'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
            )
        );
        ?>

        <p class="flex items-end shrink-0 [&_.woocommerce-Price-currencySymbol]:hidden [&_bdi]:text-[26px] [&_del_bdi]:!text-xl [&_bdi]:!font-bold [&_ins]:no-underline [&_del_bdi]:!text-foreground [&_del]:h-8 [&_del]:!decoration-foreground [&_del_bdi]:mr-1.5">
            <?php if (isset($has_variable_price) && $has_variable_price) : ?>
                <span class="text-foreground font-normal text-xl md:text-2xl mr-2"><?php esc_html_e('From', 'smoothh') ?></span>
            <?php endif ?>
            <span class="flex flex-col items-end [&_del]:opacity-50"><?php echo $product->get_price_html(); ?> </span>
            <span class="net-label font-bold text-[26px] md:text-2xl whitespace-nowrap"><?php echo get_woocommerce_currency_symbol() ?> <?php esc_html_e('net', 'smoothh') ?><?php if ($is_hourly) {
                                                                                                                                                                                    echo '/h';
                                                                                                                                                                                } ?></span>
        </p>
        <span class="text-[#A7A7A7] text-lg md:text-base text-right"><?php echo get_product_tax_formatted($product); ?></span>
    </div>
<?php endif; ?>