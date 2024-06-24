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

<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20">
  <div class="z-[-1] w-[100%] h-[80%] absolute top-0 left-0 bg-gradient-to-r from-[rgba(129,23,238,0)] to-[rgba(129,23,238,0.102)] roudned-r-[45px]"></div>

  <form method="post" class="woocommerce-ResetPassword lost_reset_password max-w-[800px] !px-5 md:!px-8 !pt-9 !pb-6 !my-0 border !border-primary shadow-2xl bg-white !rounded-[15px]">

    <p class="mb-10 text-lg font-medium !max-w-[720px]"><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce')); ?></p><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                        ?>

    <div class="smoothh-inputs-basic flex-col">
      <p class="woocommerce-form-row">
        <label class="!w-full" for="user_login"><?php esc_html_e('Username or email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input class="input-text mt-5 !max-w-[480px] !h-[55px]" type="text" name="user_login" id="user_login" autocomplete="username" aria-required="true" />
      </p>

      <div class="clear"></div>

      <?php do_action('woocommerce_lostpassword_form'); ?>

      <p class="woocommerce-form-row form-row">
        <input type="hidden" name="wc_reset_password" value="true" />
        <button class="button h-[55px] w-max !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !via-secondary !to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100 disabled:!bg-[#C9C9C9] disabled:!bg-none disabled:!opacity-100 transition-all duration-200 !cursor-pointer !py-2 !px-5 xl:!px-[50px]" type="submit" class="woocommerce-Button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>">
          <?php esc_html_e('Reset password', 'woocommerce'); ?>
          <svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
            <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
          </svg>
        </button>
      </p>

      <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
    </div>
  </form>
</div>
<?php
do_action('woocommerce_after_lost_password_form');
