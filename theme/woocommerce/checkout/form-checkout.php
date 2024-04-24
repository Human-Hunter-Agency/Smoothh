<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
  echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
  return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout flex justify-between gap-6 [&_.form-row]:!p-0" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

  <?php if ($checkout->get_checkout_fields()) : ?>

    <?php do_action('woocommerce_checkout_before_customer_details'); ?>

    <div id="customer_details flex-1">
      <div class="px-5 md:px-8 py-9 border border-[#888] rounded-[15px] mb-5">
        <?php do_action('woocommerce_checkout_billing'); ?>
      </div>

      <div class="px-5 md:px-8 py-9 border border-[#888] rounded-[15px]">
        <?php do_action('woocommerce_checkout_shipping'); ?>
      </div>
    </div>

    <?php do_action('woocommerce_checkout_after_customer_details'); ?>

  <?php endif; ?>

  <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

  <?php do_action('woocommerce_checkout_before_order_review'); ?>

  <div class="md:w-1/2 xl:w-1/3 relative ">
    <div id="order_review" class="woocommerce-checkout-review-order md:sticky md:top-[115px] px-5 md:px-8 py-9 border border-[#888] rounded-[15px]">
      <h3 id="order_review_heading" class="!mt-0 mb-9 text-2xl text-primary"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>
  
      <?php do_action('woocommerce_checkout_order_review'); ?>
    </div>
  </div>

  <?php do_action('woocommerce_checkout_after_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>