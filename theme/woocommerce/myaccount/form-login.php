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

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

  <div class="py-20 flex gap-5" id="customer_login">

    <div class="_u-column1 _col-1 basis-1/3">

    <?php endif; ?>

    <form class="woocommerce-form woocommerce-form-login login !px-8 !pt-9 !pb-6 !border-[#888] !rounded-[15px]" method="post">

      <h2 class="mb-10 text-3xl font-semibold"><?php esc_html_e('Zaloguj się', 'woocommerce'); ?></h2>

      <?php do_action('woocommerce_login_form_start'); ?>

      <p class="woocommerce-form-row woocommerce-form-row--wide _form-row form-row-wide p-0 mb-5">
        <!-- <label for="username !hidden"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label> -->
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full" name="username" id="username" placeholder="Login" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                                                                                                                                                                  ?>
      </p>
      <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
        <!-- <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
        <input class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full" type="password" name="password" id="password" autocomplete="current-password" placeholder="Hasło" />
      </p>

      <?php do_action('woocommerce_login_form'); ?>

      <div class="_form-row">
        <div class="flex gap-5 mb-5">
          <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox !border !border-red-500 !border-[2px]" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
          </label>
          <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
          <p class="woocommerce-LostPassword lost_password text-primary">
            <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
          </p>
        </div>

        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit h-[55px] w-full !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !to-secondary !cursor-pointer !py-2 !px-5 xl:!px-[50px] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>">
          <?php esc_html_e('Log in', 'woocommerce'); ?>
          <svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
            <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
          </svg>
        </button>

        <div class="login-with-socials w-full">
          <p class="mb-3 text-center">lub kontynuuj z</p>
          <div class="login-btns mb-5 flex justify-between">
            <div class="fb-login rounded-[15px] border border-primary px-6 py-2 transition duration-200 hover:border-secondary accent-primary cursor-pointer">Facebook</div>
            <div class="google-login rounded-[15px] border border-primary px-6 py-2 transition duration-200 hover:border-secondary accent-primary cursor-pointer">Google</div>
          </div>

        </div>
      </div>

      <?php do_action('woocommerce_login_form_end'); ?>

    </form>

    <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

    </div>

    <div class="_u-column2 _col-2 basis-2/3">
      <form method="post" class="woocommerce-form woocommerce-form-register register !px-8 !pt-9 !pb-6 !border-[#888] !rounded-[15px]" <?php do_action('woocommerce_register_form_tag'); ?>>

        <h2 class="mb-10 text-3xl font-semibold"><?php esc_html_e('Zarejestruj się', 'woocommerce'); ?></h2>

        <?php do_action('woocommerce_register_form_start'); ?>

        <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide p-0 mb-5">
            <!-- <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
          </p>

        <?php endif; ?>

        <div class="register-fields flex">
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary min-w-[300px]" name="name" placeholder="Imię*" id="reg_name" autocomplete="name" value="<?php echo (!empty($_POST['name'])) ? esc_attr(wp_unslash($_POST['name'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary min-w-[300px]" name="lastname" placeholder="Nazwisko*" id="reg_lastname" autocomplete="lastname" value="<?php echo (!empty($_POST['lastname'])) ? esc_attr(wp_unslash($_POST['lastname'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary min-w-[300px]" name="company" placeholder="Nazwa Firmy*" id="reg_company" autocomplete="company" value="<?php echo (!empty($_POST['company'])) ? esc_attr(wp_unslash($_POST['company'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary min-w-[300px]" name="nip" placeholder="NIP*" id="reg_nip" autocomplete="nip" value="<?php echo (!empty($_POST['nip'])) ? esc_attr(wp_unslash($_POST['nip'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <!-- <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary min-w-[300px]" name="email" placeholder="Adres e-mail*" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary min-w-[300px]" name="phone" placeholder="Numer telefonu*" id="reg_phone" autocomplete="phone" value="<?php echo (!empty($_POST['phone'])) ? esc_attr(wp_unslash($_POST['phone'])) : ''; ?>" />
          </p>
        </div>

        <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
          </p>

        <?php else : ?>

          <p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

        <?php endif; ?>

        <?php do_action('woocommerce_register_form'); ?>

        <div class="woocommerce-form-row form-row">
          <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
          <button type="submit" class="woocommerce-Button woocommerce-button button h-[55px] w-full !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !to-secondary !cursor-pointer !py-2 !px-5 xl:!px-[50px] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>">
            <?php esc_html_e('Register', 'woocommerce'); ?>
            <svg class="inline-block ml-3 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
              <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
            </svg>
          </button>
        </div>

        <?php do_action('woocommerce_register_form_end'); ?>

      </form>

    </div>

  </div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>