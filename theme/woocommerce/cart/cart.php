<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<form class="woocommerce-cart-form not-prose border border-[#888888] rounded-[15px] p-5 lg:p-[30px] mt-10 lg:mt-[100px]" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
    <?php do_action('woocommerce_before_cart_table'); ?>
    
    <h2 class="text-2xl md:text-3xl text-primary !mb-10 lg:!mb-12 !mt-0 font-semibold"><?php esc_html_e('Your order', 'woocommerce'); ?>:</h2>

    <div class="shop_table_responsive cart woocommerce-cart-form__contents w-full">
        <div class="flex gap-2.5 mb-8">
            <span class="product-name grow w-1/2 text-left text-base lg:text-xl font-semibold"><?php esc_html_e('Product', 'woocommerce'); ?>:</span>
            <span class="product-price grow-0 w-[10%] text-right text-base lg:text-xl font-semibold"><?php esc_html_e('Price', 'woocommerce'); ?>:</span>
            <span class="product-quantity grow-0 w-[10%] text-right text-base lg:text-xl font-semibold"><?php esc_html_e('Quantity', 'woocommerce'); ?>:</span>
            <span class="product-subtotal grow-0 w-[10%] text-right text-base lg:text-xl font-semibold"><?php esc_html_e('Subtotal', 'woocommerce'); ?>:</span>
            <?php if(WC()->cart->has_discount()) : ?>
                <span class="product-subtotal grow-0 w-[10%] text-right text-base lg:text-xl font-semibold"><?php esc_html_e('Discount', 'woocommerce'); ?>:</span>
            <?php endif; ?>
        </div>
        <?php do_action('woocommerce_before_cart_contents'); ?>
        
        <ul class="text-xl border-b border-[#F2F2F2]">
            <?php
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                /**
                 * Filter the product name.
                 *
                 * @since 2.1.0
                 * @param string $product_name Name of the product in the cart.
                 * @param array $cart_item The product in the cart.
                 * @param string $cart_item_key Key for the product in the cart.
                 */
                $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
            ?>
                    <li class="woocommerce-cart-form__cart-item cart_item flex gap-2.5 mb-5 lg:mb-8<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                        <div class="product-name grow w-1/2" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                            <?php
                            if (!$product_permalink) {
                                echo wp_kses_post($product_name . '&nbsp;');
                            } else {
                                /**
                                 * This filter is documented above.
                                 *
                                 * @since 2.1.0
                                 */
                                echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a class="hover:text-primary transition duration-200" href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                            }

                            do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                            // Meta data.
                            echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                            // Backorder notification.
                            if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                            }
                            ?>
                        </div>

                        <div class="product-price grow-0 w-[10%] text-right" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                            <?php
                            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            ?>

                            </div>

                        <div class="product-quantity grow-0 w-[10%] text-right" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                            <?php
                            if ($_product->is_sold_individually()) {
                                $min_quantity = 1;
                                $max_quantity = 1;
                            } else {
                                $min_quantity = 0;
                                $max_quantity = $_product->get_max_purchase_quantity();
                            }

                            $product_quantity = woocommerce_quantity_input(
                                array(
                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                    'input_value'  => $cart_item['quantity'],
                                    'max_value'    => $max_quantity,
                                    'min_value'    => $min_quantity,
                                    'product_name' => $product_name,
                                ),
                                $_product,
                                false
                            );

                            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
                            ?>
                        </div>

                        <div class="product-subtotal grow-0 w-[10%] text-right" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                            <?php
                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            ?>
                        </div>
                        <?php if(WC()->cart->has_discount()) : ?>
                            <div class="grow-0 w-[10%] text-right">
                                <span>
                                    <?php echo($cart_item['line_subtotal'] - $cart_item['line_total']); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </li>
            <?php
                }
            }
            ?>
        </ul>

            <?php do_action('woocommerce_cart_contents'); ?>

            <div>
                    <?php if (wc_coupons_enabled()) { ?>
                        <div class="coupon flex">
                            <label for="coupon_code" class="screen-reader-text"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label> 
                            <input type="text" name="coupon_code" class="input-text h-[55px] w-full max-w-80 pl-3 md:pl-[18px] pr-4 min-w-0 text-base bg-transparent placeholder:text-foreground border border-r-0 border-primary rounded-l-2xl" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
                            <button type="submit" class="!ml-[-15px] shrink-0 !relative z-10 h-auto !text-base !text-white !font-bold !text-center !rounded-2xl !bg-gradient-to-b hover:!bg-gradient-to-b from-primary to-secondary !py-2 !px-5 xl:!px-[50px] button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">
                                <?php esc_html_e('Apply coupon', 'woocommerce'); ?>
                            </button>
                            <?php do_action('woocommerce_cart_coupon'); ?>
                        </div>
                    <?php } ?>

                    <button type="submit" class="button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

                    <?php do_action('woocommerce_cart_actions'); ?>

                    <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
            </div>

            <?php do_action('woocommerce_after_cart_contents'); ?>
    </div>
    <?php do_action('woocommerce_after_cart_table'); ?>
</form>

<?php do_action('woocommerce_before_cart_collaterals'); ?>

<div class="cart-collaterals">
    <?php
    /**
     * Cart collaterals hook.
     *
     * @hooked woocommerce_cross_sell_display
     * @hooked woocommerce_cart_totals - 10
     */
    do_action('woocommerce_cart_collaterals');
    ?>
</div>

<?php do_action('woocommerce_after_cart'); ?>