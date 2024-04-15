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
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="relative w-full h-[300px] md:h-[600px] flex flex-col items-center justify-center mb-[50px] md:mb-[100px]">

		<?php smoothh_post_thumbnail(); ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/80"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">
			<?php the_title('<h1 class="text-5xl md:text-[66px] leading-tight text-center text-bold text-white font-bold">', '</h1>'); ?>
		</div>
	</div>

	<div class="container flex flex-col md:flex-row gap-5 md:gap-6 lg:gap-10">
		<div>
			<div class="prose-smoothh prose prose-base md:prose-h2:text-xl mb-8 md:mb-[50px]">
				<?php the_content() ?>
			</div>
			<div>
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5 -removed
				 * @hooked woocommerce_template_single_rating - 10 -removed
				 * @hooked woocommerce_template_single_price - 10 -removed
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
		<aside class="md:basis-1/4 md:grow-0 md:shrink-0 relative">
			<div class="md:sticky top-[115px]">
				<?php if ($cart && !$cart->is_empty() && is_user_logged_in()) : ?>
					<div class="p-[18px] pb-6 border border-[#888888] rounded-[15px] mb-5 md:mb-10">
						<span class="block font-semibold text-xl md:text-3xl mb-7">Twój koszyk</span>
						<ul class="flex flex-col gap-8 mb-8">
							<?php foreach ($cart->get_cart() as $cart_item_key => $cart_item) :
								$product = $cart_item['data'];
								$quantity = $cart_item['quantity'];
								$link = $product->get_permalink($cart_item);
							?>
								<li class="flex flex-col lg:flex-row gap-2.5 justify-between">
									<div>
										<a href="<?php echo $link ?>" class="block text-base md:text-2xl lg:mb-3 transition duration hover:text-primary">
											<?php echo $product->get_title(); ?>
										</a>
										<span class="text-sm lg:text-base text-[#B2B2B2]">Sztuk: <?php echo $quantity ?></span>
									</div>
									<div class="text-base lg:text-xl text-primary shrink-0">
										<?php echo wc_get_price_excluding_tax($product) ?> netto
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
						<a href="<?php echo wc_get_cart_url() ?>" class="w-full border-none !bg-gradient-to-b from-primary to-secondary text-white h-[55px] px-5 xl:px-12 xl:pr-8 !rounded-[15px] font-bold flex items-center justify-center gap-5">
							Przejdź do zamówienia
							<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
								<path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
							</svg>
						</a>
					</div>
				<?php endif ?>
	
				<div class="px-[18px]">
					<h5 class="mb-4 md:mb-6 text-2xl md:text-3xl font-semibold text-primary">Kategorie produktów</h5>
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
		
		    get_template_part( 'flexible-content/sections/partials/case-studies-swiper', '' );
		?>
			
	</section>
</div>

<?php do_action('woocommerce_after_single_product'); ?>