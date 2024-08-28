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


<nav class="woocommerce-MyAccount-navigation pt-10 lg:pb-10 !w-full float-none lg:float-left lg:!w-[30%] ">
  <div class="nav-container px-5 md:px-8 py-9 border border-[#888] rounded-[15px] ">
    <h2 class="mb-10 text-3xl font-semibold"><?php esc_html_e('Your account', 'smoothh'); ?></h2>
    <ul>
      <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
        <li class="py-1 <?php echo wc_get_account_menu_item_classes($endpoint); ?>">
          <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="text-lg transition duration-200 hover:text-primary"><?php echo esc_html($label); ?></a>
        </li>
      <?php endforeach; 
        $client_panel_page_id = 650;
        $candidate_panel_page_id = 2743;
        $account_type = get_user_meta(get_current_user_id(), 'account_type', true);
        $panel_page_id = $account_type === 'client' ? $client_panel_page_id : $candidate_panel_page_id;
      ?>
        <li class="py-1">
          <a href="<?php echo get_permalink($panel_page_id); ?>" class="text-lg transition duration-200 hover:text-primary"><?php echo get_the_title($panel_page_id); ?></a>
        </li>
    </ul>
  </div>
</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>