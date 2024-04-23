<?php

/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_navigation'); ?>

<div class="woocommerce-MyAccount-content py-10">
  <div class="nav-container px-5 md:px-8 py-9 border border-[#888] rounded-[15px] text-base md:text-lg">
    <?php
    /**
     * My Account content.
     *
     * @since 2.6.0
     */
    do_action('woocommerce_account_content');
    ?>
  </div>
</div>