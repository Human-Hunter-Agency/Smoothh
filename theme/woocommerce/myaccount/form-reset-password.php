<?php

/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit; ?>


<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20 container">
	<div class="z-[-1] w-[100%] h-[80%] absolute top-0 left-0 bg-gradient-to-r from-[rgba(129,23,238,0)] to-[rgba(129,23,238,0.102)] rounded-r-[45px]"></div>
	
	<?php do_action('woocommerce_before_reset_password_form');?>

	<form method="post" class="woocommerce-ResetPassword lost_reset_password mx-auto max-w-[800px] !px-5 md:!px-8 !pt-9 !pb-6 !my-0 !border-primary border-[1px] shadow-2xl bg-white !rounded-[15px] flex flex-col items-center">

		<p class="mb-5 text-[20px] font-semibold"><?php echo apply_filters('woocommerce_reset_password_message', esc_html__('Enter a new password below.', 'woocommerce')); ?></p><?php  ?>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row p-0 mb-5 w-full max-w-80">
			<input type="password" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition-all duration-200 hover:border-secondary accent-primary w-full !outline-1 !-outline-offset-2 !outline-transparent ![outline-style:solid] focus:!outline-1 focus:border-secondary focus:!outline-secondary " name="password_1" id="password_1" autocomplete="new-password" placeholder="<?php esc_html_e('New password', 'woocommerce'); ?> *" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row p-0 mb-5 w-full max-w-80">
			<input type="password" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition-all duration-200 hover:border-secondary accent-primary w-full !outline-1 !-outline-offset-2 !outline-transparent ![outline-style:solid] focus:!outline-1 focus:border-secondary focus:!outline-secondary " name="password_2" id="password_2" autocomplete="new-password" placeholder="<?php esc_html_e('Re-enter new password', 'woocommerce'); ?> *" />
		</p>

		<input type="hidden" name="reset_key" value="<?php echo esc_attr($args['key']); ?>" />
		<input type="hidden" name="reset_login" value="<?php echo esc_attr($args['login']); ?>" />

		<?php do_action('woocommerce_resetpassword_form'); ?>

		<p class="woocommerce-form-row form-row">
			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="woocommerce-Button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> h-[55px] w-max !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !via-secondary !to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100 disabled:!bg-[#C9C9C9] disabled:!bg-none disabled:!opacity-100 transition-all duration-200 !cursor-pointer !py-2 !px-5 xl:!px-[50px]" value="<?php esc_attr_e('Save', 'woocommerce'); ?>">
				<?php esc_html_e('Save', 'woocommerce'); ?>
				<svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
					<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
				</svg>

			</button>
		</p>

		<?php wp_nonce_field('reset_password', 'woocommerce-reset-password-nonce'); ?>

	</form>

	<?php do_action('woocommerce_after_reset_password_form'); ?>

</div>

<?php
