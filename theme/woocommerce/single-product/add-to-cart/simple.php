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

	<form class="cart !mb-0 flex items-center" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action('woocommerce_before_add_to_cart_button'); ?>

		<?php
		do_action('woocommerce_before_add_to_cart_quantity');

		$is_hourly = get_field('product_hourly', $product->get_id());
		?>

		<div class="<?php if((isset($is_hourly) && $is_hourly)){echo '';}else{echo 'hidden';}?>">
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
			if($product->get_id()==1186 || $product->get_id()==1253):
		?>
		<button data-js-calc-btn type="button" class=" button whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 !text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 !mt-10 !mb-14"><?php echo esc_html_e('calculate', 'smoothh'); ?>
			<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
				<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
			</svg>
		</button>

		<div data-js-calc-container class="hidden p-5 lg:px-8 rounded-2xl border-2 border-[#EFEFEF] w-full">
			<h4 class="text-2xl md:text-3xl font-semibold text-primary mb-4"><?php echo esc_html_e('Your calculation:', 'smoothh'); ?></h4>
			<div class="flex flex-col md:flex-row border-b border-b-secondary mb-2 gap-5 pb-3">
				<div class="grow flex flex-col gap-3">
					<span class="font-semibold text-xl hidden md:block">
						<?php echo esc_html_e('Service:', 'smoothh'); ?>
					</span>
					<span class="text-xl"><?php echo $product->get_title() ?></span>
				</div>
				<div class="grow-0 flex justify-between md:flex-col gap-3 items-end">
					<span class="md:font-semibold text-base md:text-xl"><?php echo esc_html_e('Price', 'woocommerce'); ?>:</span>
					<div class="flex flex-col items-end">
						<p class="text-xl"><span data-js-calc-price></span> <span><?php echo get_woocommerce_currency_symbol()?> <?php esc_html_e('net', 'smoothh') ?></span></p>
						<p class="text-sm md:text-base mt-1.5 md:mt-0.5">( <span data-js-calc-price-taxed></span> ) <span><?php echo get_woocommerce_currency_symbol()?> <?php esc_html_e('gross', 'smoothh') ?></span></p>
					</div>
				</div>
				<div class="grow-0 flex justify-between md:flex-col gap-3 items-end">
					<span class="md:font-semibold text-base md:text-xl"><?php echo esc_html_e('Subtotal', 'woocommerce'); ?>:</span>
					<div class="flex flex-col items-end">
						<p class="text-xl"><span data-js-calc-subtotal></span> <span><?php echo get_woocommerce_currency_symbol()?> <?php esc_html_e('net', 'smoothh') ?></span></p>
						<p class="text-sm md:text-base mt-1.5 md:mt-0.5">( <span data-js-calc-subtotal-taxed></span> ) <span><?php echo get_woocommerce_currency_symbol()?> <?php esc_html_e('gross', 'smoothh') ?></span></p>
					</div>
					</div>
			</div>
			<div class="flex justify-between md:justify-end mb-14 gap-5">
				<span class="font-semibold text-primary text-xl"><?php echo esc_html_e('Total', 'woocommerce'); ?>:</span>
				<div class="flex flex-col items-end">
					<p class="font-semibold text-primary text-xl"><span data-js-calc-total></span> <span><?php echo get_woocommerce_currency_symbol()?> <?php echo esc_html_e('net', 'smoothh'); ?></span></p>
					<p class="text-sm md:text-base mt-1.5 md:mt-0.5">( <span data-js-calc-total-taxed></span> ) <span><?php echo get_woocommerce_currency_symbol()?> <?php esc_html_e('gross', 'smoothh') ?></span></p>
				</div>
			</div>
			<!-- <div class="flex mb-14 gap-5 justify-end">
				<span class="font-semibold text-primary text-xl"><?php esc_html_e('Entry fee', 'smoothh') ?>:</span>
				<p class="font-semibold text-primary text-xl"><span data-js-calc-fee></span> <span><?php echo get_woocommerce_currency_symbol()?> <?php echo esc_html_e('net', 'smoothh'); ?></span></p>
			</div> -->
			<!-- <p class="font-semibold max-w-screen-sm block mb-10 text-center mx-auto text-xl"><?php echo wp_kses(__('Entry fee text', 'smoothh'),array( 'br' => array() )); ?></p> -->

			<div class="flex justify-center flex-wrap gap-5">
				<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class=" single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html_e('Complete the quote', 'smoothh'); ?>
					<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
						<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
					</svg>
				</button>

				<?php if($product->get_id()==1253):?>
				<button data-js-popup-toggle="negotiate-form" type="button" value="<?php echo esc_attr($product->get_id()); ?>" class="!hidden whitespace-nowrap border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold flex items-center justify-center gap-5">
					<?php echo esc_html_e('Negotiate price', 'smoothh'); ?>
					<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
						<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
					</svg>
				</button>
				<?php endif; ?>
			</div>
		</div>

		<?php else: ?>
		

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
		 if($product->get_id()==1253):
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
			<div class="overflow-auto">
				<h3 class="mb-2 text-2xl md:text-3xl font-semibold"><?php esc_html_e('Negotiate price', 'smoothh'); ?></h3>
				<p class="mb-8 text-base"><?php echo $product->get_title() ?></p>
				<?php
				$shortcode = '[contact-form-7 id="16df6c7" title="Negocjacja"]';
				echo do_shortcode($shortcode); ?>
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
	<button data-js-popup-toggle="quote-form" class="button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> whitespace-nowrap button border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] !px-5 xl:!px-12 xl:!pr-8 !rounded-[15px] font-bold !flex items-center justify-center gap-5 alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>">
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