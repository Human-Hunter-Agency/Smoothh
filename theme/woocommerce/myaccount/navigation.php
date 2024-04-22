<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_account_navigation');
?>


<nav class="woocommerce-MyAccount-navigation py-10">
  <div class="nav-container p-10 border border-[#888] rounded-[15px] ">
    <h2 class="mb-10 text-3xl font-semibold">Twoje konto</h2>
    <ul>
      <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
        <li class="py-1 <?php echo wc_get_account_menu_item_classes($endpoint); ?>">
          <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="text-lg transition duration-200 hover:text-primary"><?php echo esc_html($label); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>