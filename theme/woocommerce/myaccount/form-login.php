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

  <div class="py-20 flex flex-col md:flex-row gap-5" id="customer_login">

    <div class="_u-column1 _col-1 basis-1/3 2xl:basis-1/4">

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
          <div class="login-btns mb-5 md:flex gap-2 justify-between">
            <div class="fb-login mb-2 md:mb-0 flex items-center justify-center rounded-[15px] border border-primary px-6 py-2 transition duration-200 hover:border-secondary accent-primary cursor-pointer">
              <svg class="inline mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14" fill="none">
                <rect width="14" height="14" fill="url(#pattern0_71_3899)" />
                <defs>
                  <pattern id="pattern0_71_3899" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_71_3899" transform="scale(0.0555556)" />
                  </pattern>
                  <image id="image0_71_3899" width="18" height="18" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAABsElEQVR42qWUzy8DQRTHx1mkh/4i0fojSCTi5A9wEy4ukhKcsN1G+RMaR2cRWhdN2osEF8GBi3CQCBKNC4lqd7fd1u7OG/tiu0O3swle8i4z8z55v75DPCa9dIeT2kQkqeajslq23XK8HJHVQkjSpvAN8bPASn3QDnjqTanMz6OyUgpKyjAhrMsDCUrVsWhKNf0h3O23NLRcGfdkIoZoMJKp0Y3jJmyeNEHab9C+lAoOzAwsVYfcnojKwYDtC4NalAFzTDcYxNIafC+TyKyHYGNF6Y9maghoQeCtBnD3SqF/lYPQw8nKDMHpiEDTW7qbSfHGpPE0ltRy/i4iKwcExyoCJXbqrGWzWR18plhBkNV+EbNTH1jTYCHHM1rca1A8i7v94Y6MjqDitQFKg4Fu/Gwynl09WyKQt7SjW4OJ7OzRoh1Lw7Vvv1gv6Cx7+cFO700XcP5gAZ5J+QbPiDf7kKB2/t1sSU04C6mU/gqKytrXQqKhAFE7vwVhDMYSbqwLBcj15gfiEFsVkx1/ABQglikE8XL4NyIyrBe1g2s/t6tXbIaFPp/T33E62Fh80x72Cda6AWn+iqgRAAAAAElFTkSuQmCC" />
                </defs>
              </svg>
              Facebook
            </div>
            <div class="google-login flex items-center justify-center rounded-[15px] border border-primary px-6 py-2 transition duration-200 hover:border-secondary accent-primary cursor-pointer">
              <svg class="inline-block mr-2" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2314 7.40086C13.2317 6.93783 13.1905 6.47571 13.1084 6.02002L6.75098 6.02002V8.63093H10.3842C10.2315 9.46597 9.74368 10.2021 9.03412 10.6681V12.3617H11.216C12.5603 11.0683 13.2928 9.26532 13.2314 7.40086Z" fill="#4285F4" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.7504 14.0013C8.39363 14.0457 9.99172 13.4605 11.2177 12.3654L9.03579 10.6718C7.97823 11.3504 6.66666 11.5028 5.48168 11.0848C4.2967 10.6669 3.37099 9.72534 2.97316 8.53345H0.717773V10.2826C1.86398 12.5629 4.19823 14.0018 6.7504 14.0013Z" fill="#34A853" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.97349 8.53345C2.69122 7.70169 2.69122 6.80004 2.97349 5.96829L2.97349 4.21918H0.7181C-0.239367 6.12691 -0.239366 8.37483 0.7181 10.2826L2.97349 8.53345Z" fill="#FBBC05" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75098 3.1856C7.71061 3.16938 8.63796 3.53212 9.33189 4.19516L11.2678 2.25929C10.046 1.11142 8.42728 0.481082 6.75098 0.500433C4.19752 0.500433 1.86355 1.93979 0.717773 4.22032L2.97374 5.96827C3.50573 4.32662 5.02541 3.20708 6.75098 3.1856Z" fill="#EA4335" />
              </svg>
              Google
            </div>
          </div>

        </div>
      </div>

      <?php do_action('woocommerce_login_form_end'); ?>

    </form>

    <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

    </div>

    <div class="_u-column2 _col-2 basis-2/3 2xl:basis-3/4">
      <form method="post" class="woocommerce-form woocommerce-form-register register !px-8 !pt-9 !pb-6 !border-[#888] !rounded-[15px]" <?php do_action('woocommerce_register_form_tag'); ?>>

        <h2 class="mb-10 text-3xl font-semibold"><?php esc_html_e('Zarejestruj się', 'woocommerce'); ?></h2>

        <?php do_action('woocommerce_register_form_start'); ?>

        <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide p-0 mb-5">
            <!-- <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
          </p>

        <?php endif; ?>

        <div class="register-fields md:flex md:flex-wrap md:gap-x-12">
          <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
            <label for="account_first_name"><?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full md:min-w-[300px]" name="name" placeholder="Imię*" id="reg_name" autocomplete="name" value="<?php echo (!empty($_POST['name'])) ? esc_attr(wp_unslash($_POST['name'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full md:min-w-[300px]" name="lastname" placeholder="Nazwisko*" id="reg_lastname" autocomplete="lastname" value="<?php echo (!empty($_POST['lastname'])) ? esc_attr(wp_unslash($_POST['lastname'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full md:min-w-[300px]" name="company" placeholder="Nazwa Firmy*" id="reg_company" autocomplete="company" value="<?php echo (!empty($_POST['company'])) ? esc_attr(wp_unslash($_POST['company'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full md:min-w-[300px]" name="nip" placeholder="NIP*" id="reg_nip" autocomplete="nip" value="<?php echo (!empty($_POST['nip'])) ? esc_attr(wp_unslash($_POST['nip'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <!-- <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required hidden">*</span></label> -->
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary min-w-[300px]" name="email" placeholder="Adres e-mail*" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
          </p>
          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide !mb-5">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder:text-foreground h-[55px] rounded-[15px] border border-primary pl-5 pr-10 transition duration-200 hover:border-secondary accent-primary w-full md:min-w-[300px]" name="phone" placeholder="Numer telefonu*" id="reg_phone" autocomplete="phone" value="<?php echo (!empty($_POST['phone'])) ? esc_attr(wp_unslash($_POST['phone'])) : ''; ?>" />
          </p>
        </div>

        <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

          <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
          </p>

        <?php else : ?>

          <p class="mb-5"><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

        <?php endif; ?>

        <?php do_action('woocommerce_register_form'); ?>

        <div class="checkboxes my-5 flex flex-col gap-y-4">
          <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme flex items-start gap-x-2">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox mt-1" name="markall" type="checkbox" id="markall" value="forever" />
            <span class="text-primary font-semibold">Zaznacz wszystkie zgody</span>
          </label>
          <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme flex items-start justify-center gap-x-2">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox mt-1" name="checkbox2" type="checkbox" id="checkbox2" value="forever" />
            <span class="">Sed sit amet faucibus mi, et blandit lacus. Maecenas ipsum elit, hendrerit quis quam eu, finibus venenatis massa. Sed dapibus dui posuere ultricies viverra. Suspendisse nec dui sit amet urna efficitur hendrerit. Vivamus eu metus nec mauris gravida scelerisque vitae quis ex. </span>
          </label>
          <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme flex items-start justify-center gap-x-2">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox mt-1" name="checkbox3" type="checkbox" id="checkbox3" value="forever" />
            <span class="">Phasellus ut dictum augue. Sed velit risus, gravida eget iaculis et, ultricies non elit. Morbi nisi ipsum, ultrices condimentum urna efficitur, consectetur laoreet orci. Etiam pharetra dui vestibulum eros venenatis pretium. Proin feugiat ipsum ex, quis porta orci suscipit vel. Sed ultrices massa tortor, et lacinia magna vestibulum et. Nam luctus, nibh vel faucibus vestibulum, est elit malesuada lorem.</span>
          </label>
          <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme flex items-start gap-x-2">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox mt-1" name="checkbox4" type="checkbox" id="checkbox4" value="forever" />
            <span class="">Przeczytałem/am i akceptuję <span class="text-primary font-semibold">regulamin*</span></span>
          </label>
        </div>

        <div class="woocommerce-form-row form-row">
          <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
          <button type="submit" class="woocommerce-Button woocommerce-button button h-[55px] !mb-3 flex gap-4 !text-white !font-semibold !rounded-2xl !bg-gradient-to-b !from-primary !to-secondary !cursor-pointer !py-2 !px-5 xl:!px-[50px] <?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>">
            <?php esc_html_e('Zarejestruj konto', 'woocommerce'); ?>
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