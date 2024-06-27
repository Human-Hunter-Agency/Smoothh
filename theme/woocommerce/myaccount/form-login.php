<?php

/**
 * Login Form 
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<div class="py-20 flex flex-col md:flex-row gap-5 [&.disabled]:invisible [&.disabled]:opacity-0 transition duration-300" id="customer_login" data-js="tiles-wrapper">
  
  <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

    <div class="basis-1/2">
      <div class="px-5 md:px-8 pt-9 pb-6 border-[#888] !rounded-[15px]">
        <h2 class="mb-10 text-3xl font-semibold"><?php esc_html_e("I don't have an account", 'smoothh'); ?></h2>
        
        <?php
        $login_page_id = 848;
        if (get_the_ID() == $login_page_id) :
        ?>
          <a href="<?php echo get_permalink(wc_get_page_id('checkout')) . '?is_guest=true'; ?>" class="h-[55px] w-full !mb-5 flex items-center justify-center gap-4 !text-white !font-semibold rounded-2xl bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100 transition-all duration-200 py-2 px-5 xl:px-[50px] 2xl:px-8">
            <?php esc_html_e('Continue as a guest', 'smoothh'); ?>
            <svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
              <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
            </svg>
          </a>
        <?php endif; ?>
        <button data-js="register-toggle" class=" h-[55px] !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !via-secondary !to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100 disabled:!bg-[#C9C9C9] disabled:!bg-none disabled:!opacity-100 transition-all duration-200 !cursor-pointer !py-2 !px-5 xl:!px-[50px] ">
          <?php esc_html_e('Create an account', 'smoothh'); ?>
          <svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
            <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
          </svg>
        </button>
      </div> 
    </div>

  <?php endif; ?>

    <div class="basis-1/2">

      <form class="woocommerce-form woocommerce-form-login login !px-5 md:!px-8 !pt-9 !pb-6 !mt-0 !mb-5 !border-[#888] !rounded-[15px]" method="post">

        <h2 class="mb-10 text-3xl font-semibold"><?php esc_html_e('Log in', 'woocommerce'); ?></h2>

        <?php do_action('woocommerce_login_form_start'); ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide _form-row form-row-wide p-0 mb-5">
          <!-- <label for="username !hidden"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label> -->
          <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition-all duration-200 hover:border-secondary accent-primary w-full outline-1 -outline-offset-2 outline-transparent [outline-style:solid] focus:outline-1 focus:border-secondary focus:outline-secondary " name="username" id="username" placeholder="Login" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                                                                                                                                                                    ?>
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !p-0 !mb-5">
          <!-- <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
          <input class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition-all duration-200 hover:border-secondary accent-primary w-full !outline-1 !-outline-offset-2 !outline-transparent ![outline-style:solid] focus:!outline-1 focus:border-secondary focus:!outline-secondary " type="password" name="password" id="password" autocomplete="current-password" placeholder="Hasło" />
        </p>

        <?php do_action('woocommerce_login_form'); ?>

        <div class="_form-row">
          <div class="flex gap-5 mb-5">
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
              <input class="woocommerce-form__input woocommerce-form__input-checkbox !border-red-500 !border-[2px]" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
            </label>
            <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
            <p class="woocommerce-LostPassword lost_password text-primary">
              <a class="font-semibold hover:underline" href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
            </p>
          </div>

          <button type="submit" class="woocommerce-button button woocommerce-form-login__submit h-[55px] w-full !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !via-secondary !to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100 disabled:!bg-[#C9C9C9] disabled:!bg-none disabled:!opacity-100 transition-all duration-200 !cursor-pointer !py-2 !px-5 xl:!px-[50px] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>">
            <?php esc_html_e('Log in', 'woocommerce'); ?>
            <svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
              <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
            </svg>
          </button>

          <div class="login-with-socials w-full">
            <p class="mb-3 text-center"><?php esc_html_e('or continue with', 'smoothh'); ?></p>
            <div class="mb-5 [&_ul]:flex [&_ul]:gap-2 [&_ul]:justify-center [&_ul]:items-center">
              <?php echo do_shortcode('[TheChamp-Login]') ?>
            </div>

          </div>
        </div>

        <?php do_action('woocommerce_login_form_end'); ?>

      </form>

    </div>

    <?php do_action('woocommerce_after_customer_login_form'); ?>
    
</div>
<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
  <div class="invisible [&.active]:visible opacity-0 [&.active]:opacity-100 transition duration-300" data-js="register-wrapper">
    <span class="text-primary hover:underline cursor-pointer block mb-5"><?php esc_html_e("Back", 'smoothh'); ?></span>
    <form method="post" class="woocommerce-form woocommerce-form-register register !px-5 md:!px-8 !pt-9 !pb-6 !my-0 !border-[#888] !rounded-[15px] h-full" <?php do_action('woocommerce_register_form_tag'); ?>>

      <h2 class="mb-10 text-3xl font-semibold"><?php esc_html_e('Register', 'woocommerce'); ?></h2>

      <div class="register-fields smoothh-inputs-basic smoothh-inputs-validation">
        <div class="w-full mb-5" data-priority="5">
          <p class="mb-2">
            <?php esc_html_e('Account type:', 'smoothh'); ?>
          </p>
          <ul class="flex items-center gap-2">
            <li>
              <input type="radio" class="hidden peer" name="account_type" id="candidate" value="candidate" checked/>
              <label for="candidate" class="px-4 py-2 rounded-lg text-base border border-primary bg-transparent peer-checked:bg-primary/5 hover:bg-primary/[0.03] transition-all duration-200 cursor-pointer outline-1 -outline-offset-2 outline-transparent [outline-style:solid] peer-checked:outline-1 peer-checked:outline-primary">
                <?php esc_html_e('Candidate', 'smoothh'); ?>
              </label>
            </li>
            <li>
              <input type="radio" class="hidden peer" name="account_type" id="client" value="client"/>
              <label for="client" class="px-4 py-2 rounded-lg text-base border border-primary bg-transparent peer-checked:bg-primary/5 hover:bg-primary/[0.03] transition-all duration-200 cursor-pointer outline-1 -outline-offset-2 outline-transparent [outline-style:solid] peer-checked:outline-1 peer-checked:outline-primary">
                <?php esc_html_e('Client', 'smoothh'); ?>
              </label>
            </li>
          </ul>
        </div>

        <?php do_action('woocommerce_register_form_start'); ?>

        <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <!-- <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text " required name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
          </p>

        <?php endif; ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
          <!-- <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
          <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" class="woocommerce-Input woocommerce-Input--text input-text" required name="email" placeholder="Adres e-mail*" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
        </p>

        <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <!-- <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" required name="password" id="reg_password" autocomplete="new-password" placeholder="Hasło*" />
          </p>
        <?php else : ?>

          <p class="mb-5"><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

        <?php endif; ?>
      </div>


      <div class="[&_label_a]:text-primary [&_label_a]:font-semibold [&_label_a:hover]:underline">
        <?php do_action('woocommerce_register_form'); ?>
      </div>

      <div class="woocommerce-form-row form-row !mt-5">
        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
        <button type="submit" class="woocommerce-Button woocommerce-button button h-[55px] !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !via-secondary !to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100 disabled:!bg-[#C9C9C9] disabled:!bg-none disabled:!opacity-100 transition-all duration-200 !cursor-pointer !py-2 !px-5 xl:!px-[50px] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>">
          <?php esc_html_e('Register', 'woocommerce'); ?>
          <svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
            <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
          </svg>
        </button>
      </div>

      <?php do_action('woocommerce_register_form_end'); ?>

    </form>
    <div class="hidden" data-js="hidden-inputs"></div>
  </div>
<?php endif; ?>