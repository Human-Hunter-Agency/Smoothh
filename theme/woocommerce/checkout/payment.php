<?php

/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 */

defined('ABSPATH') || exit;

if (!wp_doing_ajax()) {
  do_action('woocommerce_review_order_before_payment');
}
?>
<div id="payment" class="woocommerce-checkout-payment bg-white">
  <?php if (WC()->cart->needs_payment()) : ?>
    <ul class="wc_payment_methods payment_methods methods">
      <?php
      if (!empty($available_gateways)) {
        foreach ($available_gateways as $gateway) {
          wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
        }
      } else {
        echo '<li class="[&>div]:!border-t-primary">';
        wc_print_notice(apply_filters('woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__('Sorry, it seems that there are no available payment methods. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce') : esc_html__('Please fill in your details above to see available payment methods.', 'woocommerce')), 'notice'); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment
        echo '</li>';
      }
      ?>
    </ul>
  <?php endif; ?>
  <div class="form-row place-order">
    <noscript>
      <?php
      /* translators: $1 and $2 opening and closing emphasis tags respectively */
      printf(esc_html__('Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce'), '<em>', '</em>');
      ?>
      <br />
      <button type="submit" class="button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> border-none !bg-gradient-to-b from-primary to-secondary text-white whitespace-nowrap min-h-[55px] !px-5 xl:!px-10 !rounded-[15px] font-bold !flex items-center justify-center gap-5" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e('Update totals', 'woocommerce'); ?>"><?php esc_html_e('Update totals', 'woocommerce'); ?>
        <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
          <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
        </svg>
      </button>
    </noscript>

    <?php wc_get_template('checkout/terms.php'); ?>

    <?php do_action('woocommerce_review_order_before_submit'); ?>

    <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="button alt' . esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '') . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine 
    ?>

    <?php do_action('woocommerce_review_order_after_submit'); ?>

    <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
  </div>
</div>
<?php
if (!wp_doing_ajax()) {
  do_action('woocommerce_review_order_after_payment');
}