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

	<div class="hidden">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	<div class="container flex flex-col md:flex-row gap-5 md:gap-10 lg:gap-[60px]">
		<div class="prose-smoothh prose prose-base md:prose-h2:text-xl">
			<?php the_content() ?>
		</div>
		<aside class="md:basis-1/4 md: grow-0">
			<?php if ($cart && !$cart->is_empty()) : ?>
				<div class="p-5 border border-[#888888] rounded-[15px]">
					<span class=" font-semibold text-xl md:text-3xl mb-7">Twój koszyk</span>
					<ul class="flex flex-col gap-8">
						<?php foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) : 
							$product = $cart_item['data'];
							$quantity = $cart_item['quantity'];
							$price = $cart->get_product_price( $product );
							$link = $product->get_permalink( $cart_item );
						?>
						<li class="flex justify-between">
							<div>
								<?php echo $product['name'] ?>
								<span><?php echo $quantity ?></span>
							</div>
							<div >
								<?php echo $product->get_regular_price() ?>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif ?>

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
</div>

<?php do_action('woocommerce_after_single_product'); ?>