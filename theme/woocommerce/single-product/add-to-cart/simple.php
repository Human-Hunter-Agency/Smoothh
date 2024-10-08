<?php

/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

global $product;

if (!$product->is_purchasable()) {
	return;
}
$has_variable_price = get_field('variable_price');

echo wc_get_stock_html($product); // WPCS: XSS ok.

if ($product->is_in_stock() && $has_variable_price == false && !$product->is_downloadable()) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form class="cart !mb-0 mt-8 flex items-center" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action('woocommerce_before_add_to_cart_button'); ?>

		<?php
		do_action('woocommerce_before_add_to_cart_quantity');

		$is_hourly = get_field('product_hourly', $product->get_id());
		?>

		<div class="<?php if ((isset($is_hourly) && $is_hourly)) {
									echo 'max-[500px]:[&_button]:hidden';
								} else {
									echo 'hidden';
								} ?>">
			<?php
			woocommerce_quantity_input(
				array(
					'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
					'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
					'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				)
			);
			?>
		</div>

		<?php
		do_action('woocommerce_after_add_to_cart_quantity');
		?>

		<?php // if (is_user_logged_in() || is_prod_guest_available($product)) :
		if ($product->get_id() == 1186 || $product->get_id() == 1253) :
		?>

			<?php if ($product->get_id() == 1253) :?>
				<button data-js-calc-expand type="button" aria-expanded="false" class="group -mt-10 font-semibold hover:text-primary transition p-1 flex items-baseline gap-3">
					<span class="group-aria-expanded:hidden">
						<?= __('Expand fields', 'smoothh');  ?>
					</span>
					<span class="hidden group-aria-expanded:block">
						<?= __('Collapse fields', 'smoothh');  ?>                
					</span>
					<svg class="transition-transform duration-500 group-aria-expanded:rotate-180 stroke-current" width="14" height="10" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.774525 0.500055L5.50054 5.75635L10.2266 0.500055" stroke-linecap="round" stroke-linejoin="round"></path></svg>
				</button>
			<?php endif;?>
			

			<button data-js-calc-btn type="button" class=" button whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 !text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 !mt-10 !mb-14"><?php echo esc_html_e('calculate', 'smoothh'); ?>
				<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
					<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
				</svg>
			</button>

			<div data-js-calc-container class="hidden p-5 lg:px-8 rounded-2xl border-2 border-[#EFEFEF] bg-white w-full drop-shadow-2xl">
				<h4 class="text-2xl md:text-3xl font-semibold text-primary mb-4"><?php echo esc_html_e('Your calculation:', 'smoothh'); ?></h4>
				<div class="flex flex-col md:flex-row border-b border-b-secondary mb-2 gap-5 pb-3">
					<div class="grow flex flex-col gap-3">
						<span class="font-semibold text-xl hidden md:block">
							<?php echo esc_html_e('Service:', 'smoothh'); ?>
						</span>
						<p class="text-xl"><?php echo $product->get_title() ?> x<span class="font-semibold" data-js-calc-qty></span></p>
					</div>
					<div class="grow-0 flex justify-between md:flex-col gap-3 items-end">
						<span class="md:font-semibold text-base md:text-xl"><?php echo esc_html_e('Single price', 'smoothh'); ?>:</span>
						<div class="flex flex-col items-end">
							<p class="text-xl"><span data-js-calc-price></span> <span><?php echo get_woocommerce_currency_symbol() ?> <?php esc_html_e('net', 'smoothh') ?></span></p>
							<p class="text-sm md:text-base mt-1.5 md:mt-0.5">( <span data-js-calc-price-taxed></span> ) <span><?php echo get_woocommerce_currency_symbol() ?> <?php esc_html_e('gross', 'smoothh') ?></span></p>
						</div>
					</div>
				</div>
				<div class="flex justify-between md:justify-end mb-14 gap-5">
					<span class="font-semibold text-primary text-xl"><?php echo esc_html_e('Total', 'woocommerce'); ?>:</span>
					<div class="flex flex-col items-end">
						<p class="font-semibold text-primary text-xl"><span data-js-calc-total></span> <span><?php echo get_woocommerce_currency_symbol() ?> <?php echo esc_html_e('net', 'smoothh'); ?></span></p>
						<p class="text-sm md:text-base mt-1.5 md:mt-0.5">( <span data-js-calc-total-taxed></span> ) <span><?php echo get_woocommerce_currency_symbol() ?> <?php esc_html_e('gross', 'smoothh') ?></span></p>
					</div>
				</div>

				<div class="flex justify-center flex-wrap gap-5">
					<?php if ($product->get_id() == 1253) : ?>
						<div class="w-full md:w-[calc(50%_-_10px)] lg:w-[233px] xl:w-[273px] font-medium text-center">
							<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class=" single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> !mx-auto whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html_e('Complete the quote', 'smoothh'); ?>
								<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
									<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
								</svg>
							</button>
							<p class="block mt-5"><?php echo __('Pay now only a 10% advance payment for recruitment and place your order!', 'smoothh'); ?></p>
						</div>
						<button data-js-popup-toggle="negotiate-form" type="button" value="<?php echo esc_attr($product->get_id()); ?>" class="!hidden whitespace-nowrap border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold flex items-center justify-center gap-5">
							<?php echo esc_html_e('Negotiate price', 'smoothh'); ?>
							<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
								<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
							</svg>
						</button>
					<?php elseif(!is_user_logged_in()) :
						$panel_page_id = 650;
					?>

							<a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>?redirect_to=<?php echo get_permalink($panel_page_id) ?>" class="button mx-auto w-fit button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 !text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5">
								<?php echo esc_html_e('Sign in and order recruitment', 'smoothh'); ?>
								<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
									<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
								</svg>
							</a>
					<?php endif; ?>
				</div>
			</div>

		<?php else : ?>


			<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?>
				<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
					<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
				</svg>
			</button>
		<?php endif;
		?>
		<?php do_action('woocommerce_after_add_to_cart_button'); ?>
	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>
	<?php // if (is_user_logged_in() || is_prod_guest_available($product)) :
	if ($product->get_id() == 1253) :
	?>
		<div data-js-popup-container="negotiate-form" class="popup-container popup-hidden">
			<div class="popup-inner">
				<div class="flex justify-end p-1">
					<button data-js-popup-toggle="negotiate-form" class="p-1 md:p-2 group">
						<svg class="fill-black transition duration-200 group-hover:fill-primary" height="18px" width="18px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460.775 460.775" xml:space="preserve">
							<path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55
						c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55
						c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505
						c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55
						l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719
						c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z" />
						</svg>
					</button>
				</div>
				<div class="overflow-auto scrollbar-minimal -mx-4 px-4">
					<h3 class="mb-2 text-2xl md:text-3xl font-semibold"><?php esc_html_e('Negotiate price', 'smoothh'); ?></h3>
					<p class="mb-8 text-base"><?php echo $product->get_title() ?></p>
					<div class="form-negotiate-wrapper form-with-confirm-wrapper">
						<?php
						$shortcode = '[contact-form-7 id="16df6c7" title="Negocjacja"]';
						echo do_shortcode($shortcode); ?>
						<div class="form-confirmation pointer-events-none opacity-0 absolute inset-0 bg-white flex flex-col items-center justify-center transition duration-300">
							<svg class="max-w-full mb-4" width="125" height="125" viewBox="0 0 125 125" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="62.5" cy="62.5" r="60.5" stroke="url(#paint1_linear_560_1182)" stroke-width="4"></circle>
								<path d="M38.5713 62.5L54.2856 77.8571L85.7141 47.1428" stroke="url(#paint1_linear_560_1182)" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"></path>
								<defs>
									<linearGradient id="paint1_linear_560_1182" x1="2.357" y1="1.8214" x2="94.357" y2="90.8214" gradientUnits="userSpaceOnUse">
										<stop stop-color="#8117EE"></stop>
										<stop offset="1" stop-color="#1F97D4"></stop>
									</linearGradient>
								</defs>
							</svg>
							<h4 class="text-center text-lg md:text-[20px] max-w-[460px] font-bold mb-5"><?php esc_html_e('Thank you for sending your message', 'smoothh'); ?></h4>
							<p class="text-center text-base max-w-[460px] mb-10 md:mb-16"><?php esc_html_e('Our experts are already verifying your message, we will get back to you soon with the information you need', 'smoothh'); ?></p>
							<button data-js-form-reset="form-negotiate-wrapper" class="w-full max-w-[520px] border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  transition-all duration-200 !text-white h-[55px] !px-5 xl:!px-12 !rounded-[15px] font-semibold !flex items-center justify-center">
								<?php esc_html_e('Go back to form', 'smoothh'); ?>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
	?>
<?php
endif;
if ($has_variable_price) :
?>
	<button data-js-popup-toggle="quote-form" class="button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !mt-8 !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>">
		<?php echo esc_html_e('Get a quote', 'smoothh'); ?>
		<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
			<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
		</svg>
	</button>

<?php
elseif ($product->is_downloadable()) :
?>

	<button data-js-popup-toggle="download-form" class="button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>">
		<?php echo esc_html_e('Download e-book', 'smoothh'); ?>
		<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
			<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
		</svg>
	</button>

<?php
endif;
?>
