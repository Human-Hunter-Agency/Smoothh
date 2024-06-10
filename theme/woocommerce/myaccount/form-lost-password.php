<?php

/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.0.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>

<div class="test py-24">
  <form method="post" class="woocommerce-ResetPassword lost_reset_password !px-5 md:!px-8 !pt-9 !pb-6 !my-0 !border-[#888] !rounded-[15px]">

    <p class="mb-10 text-3xl font-semibold"><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce')); ?></p><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                            ?>

    <div class="smoothh-inputs-basic">
      <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
        <label class="mb-10" for="user_login"><?php esc_html_e('Username or email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" aria-required="true" />
      </p>

      <div class="clear"></div>

      <?php do_action('woocommerce_lostpassword_form'); ?>

      <p class="woocommerce-form-row form-row">
        <input type="hidden" name="wc_reset_password" value="true" />
        <button type="submit" class="woocommerce-Button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('Reset password', 'woocommerce'); ?></button>
      </p>

      <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
    </div>
  </form>
</div>
<?php
do_action('woocommerce_after_lost_password_form');
