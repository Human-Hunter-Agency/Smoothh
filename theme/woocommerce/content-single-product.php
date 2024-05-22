<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
$cart = WC()->cart;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$selected_categories = array(26);
$prod_categories = $product->get_category_ids();
$common_values = array_intersect($prod_categories, $selected_categories);
$show_select_cat_products = !empty($common_values);
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="relative w-full h-[300px] md:h-[600px] flex flex-col items-center justify-center mb-[50px] md:mb-[100px]">

		<?php smoothh_post_thumbnail(); ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/80"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">
			<?php the_title('<h1 class="text-5xl md:text-[66px] leading-tight text-center text-bold text-white font-bold">', '</h1>'); ?>
		</div>
	</div>

	<div class="container flex flex-col md:flex-row md:justify-between gap-5 md:gap-6 lg:gap-10">
		<div class="w-full">
			<div class="prose-smoothh prose prose-base md:prose-h2:text-xl mb-8 md:mb-[50px]">
				<?php the_content() ?>
			</div>
			<div class="flex flex-col lg:flex-row gap-5 lg:gap-[35px] mb-9 md:mb-[55px] justify-between items-end p-5 border-2 border-[#EFEFEF] rounded-2xl">
				<?php if($show_select_cat_products == true):
					$products_args = array(
						'exclude' => array($product->get_id()),
						'product_category_id' => $selected_categories
					);
					$products = wc_get_products($products_args);

					?>
					<div class="relative w-full">
						<select id="product-select-from-cat">
							<option selected="selected"><?php echo get_the_title($product->get_id()) ?></option>
							<?php foreach ($products as $cat_product) : ?>
								<option value="<?php echo get_permalink($cat_product->get_id()) ?>">
									<?php echo get_the_title($cat_product->get_id()) ?>
								</option>
							<?php endforeach; ?>
						</select>
						<svg class="absolute z-10 right-5 top-[23px] transition duration-300 pointer-events-none" width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.9595 0.75L7 9.1368L1.04047 0.75H12.9595Z" fill="#8117EE" stroke="#8117EE"></path>
						</svg>
					</div>
				<?php endif ?>
				<div class="<?php if($product->is_type('variable')): ?> w-full <?php endif ?> ml-auto flex flex-col md:flex-row gap-2 <?php if($show_select_cat_products == true || $product->is_type('variable')): ?>  md:!gap-2 md:!flex-col <?php else: ?> md:gap-4 <?php endif ?> items-end justify-end ">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5 -removed
					 * @hooked woocommerce_template_single_rating - 10 -removed
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20 -removed
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40 -removed
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action('woocommerce_single_product_summary');
					?>
				</div>
			</div>
		</div>
		<aside class="md:basis-1/4 md:grow-0 md:shrink-0 relative">
			<div class="md:sticky top-[115px]">
				<?php
				if ($cart && !$cart->is_empty()) : ?>
					<div class="p-[18px] pb-6 border border-[#888888] rounded-[15px] mb-5 md:mb-10">
						<span class="block font-semibold text-xl md:text-3xl mb-7"><?php esc_html_e('Your cart', 'smoothh'); ?></span>
						<ul class="flex flex-col gap-8 mb-8">
							<?php foreach ($cart->get_cart() as $cart_item_key => $cart_item) :
								$product = $cart_item['data'];
								$quantity = $cart_item['quantity'];
								$link = $product->get_permalink($cart_item);
							?>
								<li class="flex flex-col gap-2.5 justify-between">
									<div>
										<a href="<?php echo $link ?>" class="block text-base md:text-2xl lg:mb-3 transition duration hover:text-primary">
											<?php echo $product->get_title(); ?>
										</a>
										<span class="text-sm lg:text-base text-[#B2B2B2]"><?php esc_html_e('Quantity: ', 'smoothh'); ?><?php echo $quantity ?></span>
									</div>
									<div class="flex flex-col">
										<span class="text-base lg:text-xl text-primary shrink-0">
											<?php echo number_format(wc_get_price_excluding_tax($product), wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator()) ?> <?php echo get_woocommerce_currency_symbol()?> <?php esc_html_e('net', 'smoothh'); ?>
										</span>
										<span class="text-sm lg:text-base text-foreground">
											<?php echo get_product_tax_formatted($product) ?>
										</span>

									</div>
								</li>
							<?php endforeach; ?>
						</ul>
						<a href="<?php echo wc_get_cart_url() ?>" class="w-full border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white h-[55px] px-5 xl:px-12 xl:pr-8 !rounded-[15px] font-bold flex items-center justify-center gap-5">
							<?php esc_html_e('Go to order', 'smoothh'); ?>
							<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
								<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
							</svg>
						</a>
					</div>
				<?php endif ?>

				<div class="px-[18px]">
					<h5 class="mb-4 md:mb-6 text-2xl md:text-3xl font-semibold text-primary"><?php esc_html_e('Product categories', 'smoothh'); ?></h5>
					<?php
					$args = array(
						'taxonomy'     => 'product_cat',
						'title_li'     => '',
					);
					$all_categories = get_categories($args);

					if ($all_categories) : ?>

						<ul class="list-none [&_.cat-item]:mb-4 md:[&_.cat-item]:mb-6 font-semibold [&_.cat-item]:text-base md:[&_.cat-item]:text-xl [&_a]:transition [&_a]:duration-200 hover:[&_a]:text-primary">
							<?php foreach ($all_categories as $cat) {
								echo '<li class="cat-item"><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></li>';
							} ?>
						</ul>

					<?php endif ?>
				</div>
			</div>

		</aside>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10 - removed
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>

	<?php
	$above_footer_fields = get_field('product_sections_settings', 'option');
	$client_logos = get_field('client_logos', 'option');
	if ($above_footer_fields) {
		$header_logos = $above_footer_fields['header_logos'];
		$header_case_studies = $above_footer_fields['header_case_studies'];
		$cta_header = $above_footer_fields['cta_header'];
		$cta_btn = $above_footer_fields['cta_btn'];
		$cta_bg = $above_footer_fields['cta_bg'];
	}

	?>

	<section class="relative py-10 md:py-[60px] mb:pb-[60px]">
		<?php if (isset($header_logos) && $header_logos) : ?>
			<div class="container">
				<div class="relative z-0">
					<h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-5">
						<?php echo esc_html($header_logos); ?>
					</h2>
				</div>
			</div>
		<?php endif; ?>
		<div class="relative z-0 w-full overflow-hidden !pb-5">
			<?php if ($client_logos) : ?>
				<div class="swiper !container !overflow-visible" data-js="swiper-logos">
					<div class="swiper-wrapper items-center">
						<?php foreach ($client_logos as $logo) : ?>
							<div class="swiper-slide mr-5 md:px-5 opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
								<img class="object-contain max-h-28" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" alt="<?php echo $logo['title']; ?>" />
							</div>
						<?php endforeach; ?>
					</div>
					<div class="swiper-button-prev">
						<svg width="12" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M-0.00195312 8.99988L11.998 0.33962L11.998 17.6601L-0.00195312 8.99988Z" fill="white" />
						</svg>
					</div>
					<div class="swiper-button-next">
						<svg width="12" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 9L0 17.6603V0.339746L12 9Z" fill="white" />
						</svg>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="relative py-10 md:py-[60px] mb:pb-[60px]">
		<?php if (isset($header_case_studies) && $header_case_studies) : ?>
			<div class="container">
				<div class="relative z-0">
					<h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
						<?php echo esc_html($header_case_studies); ?>
					</h2>
				</div>
			</div>
		<?php endif;

		get_template_part('flexible-content/sections/partials/case-studies-swiper', '');
		?>

	</section>
	<section>
	<?php if ($cta_bg || $cta_header || $cta_btn) :

		if ($cta_bg['url']) {
			$bg_url = $cta_bg['url'];
		}
	?>
		<div class="relative w-full flex flex-col items-center justify-center py-10 md:py-[70px]">
			<?php if (isset($bg_url)) : ?>
				<img src="<?php echo $bg_url; ?>" class="absolute inset-0 -z-20 object-cover !h-full w-full">
			<?php endif; ?>

			<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/70"></div>

			<div class="relative z-0 flex flex-col items-center justify-center container">
				<?php if (isset($cta_header)) : ?>
					<h3 class="text-3xl md:text-5xl text-bold text-white font-bold mb-9"><?php echo esc_html($cta_header); ?></h1>
					<?php endif; ?>

					<?php if (isset($cta_btn)) :
						$btn_url = $cta_btn['url'];
						$btn_title = $cta_btn['title'];
						$btn_target = $cta_btn['target'] ? $cta_btn['target'] : '_self';
					?>
						<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="rounded-[14px] text-[13px] font-bold py-2 px-7 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200"><?php echo esc_html($btn_title); ?></a>
					<?php endif; ?>
			</div>

		</div>
	<?php endif; ?>
</section>
</div>

<?php do_action('woocommerce_after_single_product'); ?>