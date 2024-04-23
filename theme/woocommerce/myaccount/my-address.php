<?php

/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined('ABSPATH') || exit;

$customer_id = get_current_user_id();

if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
  $get_addresses = apply_filters(
    'woocommerce_my_account_get_addresses',
    array(
      'billing'  => __('Billing address', 'woocommerce'),
      'shipping' => __('Shipping address', 'woocommerce'),
    ),
    $customer_id
  );
} else {
  $get_addresses = apply_filters(
    'woocommerce_my_account_get_addresses',
    array(
      'billing' => __('Billing address', 'woocommerce'),
    ),
    $customer_id
  );
}

$oldcol = 1;
$col    = 1;
?>

<p>
  <?php echo apply_filters('woocommerce_my_account_my_address_description', esc_html__('The following addresses will be used on the checkout page by default.', 'woocommerce')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
  ?>
</p>

<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
  <div class="u-columns woocommerce-Addresses col2-set addresses flex gap-10 flex-col-reverse">
  <?php endif; ?>

  <?php foreach ($get_addresses as $name => $address_title) : ?>
    <?php
    $address = wc_get_account_formatted_address($name);
    $col     = $col * -1;
    $oldcol  = $oldcol * -1;
    ?>

    <div class="woocommerce-Address md:w-[60%]">
      <div class="woocommerce-Address-title title flex justify-between md:justify-start items-center">
        <h3 class="font-semibold md:mr-20 w-1/2"><?php echo esc_html($address_title); ?></h3>
        <a href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="edit whitespace-nowrap border-2 border-[#F2F2F2] text-black min-h-[55px] px-5 rounded-[15px] font-semibold flex items-center justify-center gap-5"><?php echo $address ? esc_html__('Edit', 'woocommerce') : esc_html__('Add', 'woocommerce'); ?>
          <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="stroke-black" cx="9.5" cy="9.5" r="9"></circle>
            <path class="fill-black" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
          </svg>
        </a>
      </div>
      <address>
        <?php
        echo $address ? wp_kses_post($address) : esc_html_e('You have not set up this type of address yet.', 'woocommerce');

        /**
         * Used to output content after core address fields.
         *
         * @param string $name Address type.
         * @since 8.7.0
         */
        do_action('woocommerce_my_account_after_my_address', $name);
        ?>
      </address>
    </div>

  <?php endforeach; ?>

  <?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
  </div>
<?php
  endif;
