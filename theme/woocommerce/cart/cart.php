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
    
    <h2 class="text-2xl md:text-3xl text-primary !mb-5 !mt-0 font-semibold"><?php esc_html_e('Your order', 'woocommerce'); ?>:</h2>

    <div class="shop_table_responsive cart woocommerce-cart-form__contents w-full">
        <div class="hidden md:flex gap-2.5 lg:gap-5 items-end">
            <span class="product-name grow md:w-2/5 text-left text-base lg:text-xl font-semibold pb-5 lg:pb-8"><?php esc_html_e('Product', 'woocommerce'); ?>:</span>
            <span class="product-price grow-0 w-[15%] text-right text-base lg:text-xl font-semibold pb-5 lg:pb-8"><?php esc_html_e('Price', 'woocommerce'); ?>:</span>
            <span class="product-quantity grow-0 w-[15%] min-w-28 text-right text-base lg:text-xl font-semibold pb-5 lg:pb-8"><?php esc_html_e('Quantity', 'woocommerce'); ?>:</span>
            <span class="product-subtotal grow-0 w-[15%] text-right text-base lg:text-xl font-semibold pb-5 lg:pb-8"><?php esc_html_e('Subtotal', 'woocommerce'); ?>:</span>
            <?php if(WC()->cart->has_discount()) : ?>
                <span class="product-discount shrink-0 grow-0 w-[15%] 2xl:w-[10%] text-right text-base lg:text-xl font-semibold p-5 lg:p-7 lg:pb-8 min-w-32 lg:min-w-40 rounded-t-[15px] bg-primary text-white"><?php esc_html_e('Discount', 'woocommerce'); ?>:</span>
            <?php endif; ?>
        </div>
        <?php do_action('woocommerce_before_cart_contents'); ?>
        
        <ul class="text-xl">
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
                    <li class="woocommerce-cart-form__cart-item cart_item flex flex-col md:flex-row gap-2.5 lg:gap-5 mb-5 md:mb-0 <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                        <div class="product-name grow md:w-2/5 md:pb-5 lg:pb-8 overflow-hidden text-ellipsis" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
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

                        <div class="product-price flex justify-between md:justify-end grow-0 md:w-[15%] text-right" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                            <span class="md:hidden text-base"><?php esc_html_e('Price', 'woocommerce'); ?>:</span>
                            <?php
                            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            ?>

                            </div>

                        <div class="product-quantity flex justify-between md:justify-end grow-0 md:w-[15%] min-w-28 text-right" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                            <span class="md:hidden text-base"><?php esc_html_e('Quantity', 'woocommerce'); ?>:</span>
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

                        <div class="product-subtotal flex justify-between md:justify-end grow-0 md:w-[15%] text-right" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                            <span class="md:hidden text-base"><?php esc_html_e('Subtotal', 'woocommerce'); ?>:</span>
                            <?php
                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            ?>
                        </div>
                        <?php if(WC()->cart->has_discount()) : ?>
                            <div class="flex shrink-0 justify-between md:justify-end items-center md:items-start grow-0 md:w-[15%] 2xl:w-[10%] md:p-5 lg:pb-8 lg:px-7 md:!pt-0 text-right md:bg-primary min-w-32 lg:min-w-40">
                                <span class="md:hidden text-base"><?php esc_html_e('Discount', 'woocommerce'); ?>:</span>
                                <span class="bg-primary p-2 md:p-0 rounded-md text-white">
                                    <?php echo wc_price($cart_item['line_subtotal'] - $cart_item['line_total']); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
            <div class="flex flex-col gap-2.5 md:gap-0 md:flex-row justify-end text-xl mb-5">
                <div class="grow border-t border-[#F2F2F2]"></div>
                <div class="flex items-center md:items-start justify-between md:justify-end md:w-[calc(30%_+_20px)] lg:w-[calc(30%_+_40px)]">
                    <span class="lg:w-[calc(50%_+_20px)] lg:min-w-28 text-right md:pt-2.5 text-primary font-semibold md:border-t border-[#F2F2F2]"><?php esc_html_e( 'Total', 'woocommerce' ); ?>:</span>
                    <span class="lg:w-[calc(50%_+_20px)] pl-2.5 <?php if(WC()->cart->has_discount()) : ?> md:mr-2.5 lg:mr-5 <?php endif; ?> text-right md:pt-2.5 text-primary font-semibold md:border-t border-[#F2F2F2]" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></span>
                </div>
                <?php if(WC()->cart->has_discount()) : ?>
                    <div class="flex flex-row justify-between md:justify-end items-center grow-0 shrink-0 md:w-[15%] 2xl:w-[10%] md:px-5 lg:px-7 md:bg-primary rounded-b-[15px] min-w-32 lg:min-w-40 ">
                        <span class="md:hidden text-base"><?php esc_html_e('Discount sum', 'smoothh'); ?>:</span>
                        <div class="text-right p-2 md:pt-2.5 md:pb-5 lg:pb-7 text-white font-semibold md:border-t border-white md:px-0 rounded-md md:rounded-none bg-primary"><?php echo WC()->cart->get_total_discount(); ?></div>
                    </div>
                <?php endif; ?>
            </div>

            <?php do_action('woocommerce_cart_contents'); ?>

            <div class="flex flex-col lg:flex-row justify-between lg:items-end gap-5">
                <div>
                    <?php if(!(WC()->cart->has_discount( 'EXTRA10' ))):?>
                        <p class="max-w-80 mb-2.5"><?php __('For orders of at least 100USD, get a <b>10%</b> discount with the code <b>EXTRA10</b>.', 'smoothh'); ?></p>
                    <?php endif;?>
                    <?php if (wc_coupons_enabled()) { ?>
                        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                            <div class="mb-4 leading-tight">
                                <span class="block font-semibold"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
                                <span class="block [&_a]:text-primary"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
                            </div>
                        <?php endforeach; ?>

                        <div class="coupon flex">
                            <label for="coupon_code" class="screen-reader-text"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label> 
                            <input type="text" name="coupon_code" class="input-text h-[55px] w-full max-w-80 pl-3 md:pl-[18px] pr-4 min-w-0 text-base bg-transparent placeholder:text-foreground border border-r-0 border-primary rounded-l-2xl hover:border-secondary outline-1 -outline-offset-2 outline-transparent [outline-style:solid] focus:outline-1 focus:border-secondary focus:outline-secondary transition-all duration-200" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
                            <button type="submit" class="!ml-[-15px] shrink-0 !relative z-10 h-auto !text-base !text-white !font-bold !text-center !rounded-2xl hover:!bg-gradient-to-b !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 !p-2 !px-5 xl:!px-[50px] button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">
                                <?php esc_html_e('Apply coupon', 'woocommerce'); ?>
                            </button>
                            <?php do_action('woocommerce_cart_coupon'); ?>
                        </div>
                    <?php } ?>
    
                    <button type="submit" class="!hidden button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>
    
                    <?php do_action('woocommerce_cart_actions'); ?>
    
                    <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                </div>

                <div class="text-base flex flex-col md:flex-row gap-5">
                    <a href="/sklep" class="whitespace-nowrap w-full border-2 border-[#F2F2F2] hover:border-primary hover:text-primary transition duration-200 text-black min-h-[55px] px-5 xl:px-10 rounded-[15px] font-bold flex items-center justify-center gap-8">
                        <?php esc_attr_e('Continue shopping', 'woocommerce'); ?>
                        <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle class="stroke-black" cx="9.5" cy="9.5" r="9"></circle>
                            <path class="fill-black" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
                        </svg>
                    </a>
                    <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
                </div>
            </div>

            <?php do_action('woocommerce_after_cart_contents'); ?>
    </div>
    <?php do_action('woocommerce_after_cart_table'); ?>
</form>

<?php do_action('woocommerce_before_cart_collaterals'); ?>
<p class="text-sm md:text-base my-5 text-right w-full text-gray-500"><?php echo esc_html_e('* Prices displayed in net', 'smoothh'); ?></p>

<!-- <div class="cart-collaterals">
    <?php
    /**
     * Cart collaterals hook.
     *
     * @hooked woocommerce_cross_sell_display
     * @hooked woocommerce_cart_totals - 10
     */
    // do_action('woocommerce_cart_collaterals');
    // ?>
</div> -->

<?php do_action('woocommerce_after_cart'); ?>