<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
  echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
  return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

  <?php if ($checkout->get_checkout_fields()) : ?>

    <div class="flex flex-col md:flex-row justify-between gap-6 xl:gap-12 [&_.form-row]:!p-0 mb-20 mt-10">
      <div id="customer_details" class="flex-1 smoothh-inputs-validation">
        <?php do_action('woocommerce_checkout_before_customer_details'); ?>
        <div class="p-5 xl:p-8 border border-[#888] rounded-[15px] mb-6">
          <?php do_action('woocommerce_checkout_billing'); ?>
        </div>

        <div class="hidden p-5 xl:p-8 border border-[#888] rounded-[15px] mb-6">
          <?php do_action('woocommerce_checkout_shipping'); ?>
        </div>

        <div class="p-5 xl:p-8 border border-[#888] rounded-[15px]">
          <?php do_action('woocommerce_checkout_after_customer_details'); ?>
        </div>
      </div>

    <?php endif; ?>

    <div class="md:w-1/2 xl:w-1/3 relative shrink-0">
      <div class="md:sticky md:top-[115px]">
        <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
        <?php do_action('woocommerce_checkout_before_order_review'); ?>
        <div id="order_review" class="woocommerce-checkout-review-order p-5 xl:p-8 border border-primary shadow-2xl rounded-[15px] mb-8 md:mb-10">
          <h3 id="order_review_heading" class="!mt-0 mb-9 text-2xl text-primary"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>
          <?php do_action('woocommerce_checkout_order_review'); ?>
        </div>
        <?php do_action('woocommerce_checkout_after_order_review'); ?>
        <?php 
          $additional_content = get_field('content');
          $display_number_form = get_field('display_number_form');
          if(isset($additional_content) && $additional_content): 
          ?>
          <div class="link-phone px-8 xl:px-11 prose prose-smoothh prose-headings:text-lg prose-headings:lg:text-xl prose-headings:text-primary prose-headings:font-bold prose-headings:mb-2.5 prose-p:text-sm prose-p:lg:text-base prose-p:font-bold prose-p:text-foreground mb-5">
            <?php echo $additional_content ?>
          </div>
        <?php endif;
          if ($display_number_form):
        ?>
          <div class="px-8 xl:px-11 w-fit">
            <div class="group bg-gradient-to-b p-px from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100 disabled:!bg-[#C9C9C9] disabled:!bg-none disabled:!opacity-100 transition-all duration-200 !rounded-[15px]">
              <button data-js-popup-toggle="leave-number-form" type="button" class="!min-h-[55px] !px-5 xl:!px-10 text-foreground font-bold bg-white group-hover:bg-secondary group-hover:text-white transition duration-200 !rounded-[14px]"><?php esc_html_e('Leave your number','smoothh')?></button>
            </div>
          </div>
        <?php endif;?>
      </div>
    </div>
  </div>

</form>

<?php if ($display_number_form): ?>
  <div data-js-popup-container="leave-number-form" class="popup-container popup-hidden not-prose">
    <div class="popup-inner">
      <div class="flex justify-end p-1">
        <button data-js-popup-toggle="leave-number-form" class="p-1 md:p-2 group">				
          <svg class="fill-black transition duration-200 group-hover:fill-primary" height="18px" width="18px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 460.775 460.775" xml:space="preserve">
          <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55
            c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55
            c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505
            c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55
            l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719
            c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"/>
          </svg>
        </button>
      </div>
      <div class="form-leave-numer-wrapper form-with-confirm-wrapper pt-5 md:pt-10">
        <?php 
          $shortcode = '[contact-form-7 id="fd3ecea" title="Zostaw numer"]';
          echo do_shortcode($shortcode); ?>
        <div class="form-confirmation pointer-events-none opacity-0 absolute inset-0 bg-white flex flex-col items-center justify-center transition duration-300">
          <svg class="max-w-full mb-4" width="125" height="125" viewBox="0 0 125 125" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="62.5" cy="62.5" r="60.5" stroke="url(#paint1_linear_560_1182)" stroke-width="4"></circle>
            <path d="M38.5713 62.5L54.2856 77.8571L85.7141 47.1428" stroke="url(#paint1_linear_560_1182)" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"></path>
            <defs>
            <linearGradient id="paint1_linear_560_1182" x1="2.357" y1="1.8214" x2="94.357" y2="90.8214" gradientUnits="userSpaceOnUse">
            <stop stop-color="#8117EE"></stop><stop offset="1" stop-color="#1F97D4"></stop>
            </linearGradient>
            </defs>
          </svg>
          <h4 class="text-center text-lg md:text-[20px] max-w-[460px] font-bold mb-5 md:mb-2.5"><?php esc_html_e( 'Thank you for sending your message', 'smoothh' ); ?></h4>
          <p class="text-center text-base max-w-[460px] mb-5"><?php esc_html_e( 'Our experts are already verifying your message, we will get back to you soon with the information you need', 'smoothh' ); ?></p>
          <button data-js-form-reset="form-leave-numer-wrapper" class="shrink-0 w-full max-w-[520px] border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  transition-all duration-200 !text-white h-[55px] !px-5 xl:!px-12 !rounded-[15px] font-semibold !flex items-center justify-center">
            <?php esc_html_e( 'Go back to form', 'smoothh' ); ?>
          </button>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>