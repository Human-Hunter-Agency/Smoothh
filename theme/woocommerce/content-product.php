<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

defined( 'ABSPATH' ) || exit;

global $product;    


// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li>
    <a href="<?php echo get_permalink($product->get_id()); ?>" class="group h-full flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl">
        <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
            <?php echo $product->get_image() ?>
            <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
        </div>
        <div class="flex-1 p-3 md:p-6">
            <div class="flex gap-2.5 md:gap-5 justify-between mb-5">
                <h4 class="text-lg md:text-xl text-primary font-semibold">
                    <?php echo get_the_title($product->get_id()) ?> 
                </h4>
                <?php if (is_user_logged_in() || is_prod_guest_available($product)) : ?>
                    <div class="flex flex-col">
                        <span class="text-lg md:text-xl">
                            <?php echo number_format( wc_get_price_excluding_tax($product), wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator()) ?> netto
                        </span>
                        <?php if($product->is_on_sale()): ?>
                            <span class="!text-lg h-6 text-black opacity-50 line-through font-normal">
                                <?php echo $product->get_regular_price() ?>                        
                            </span>
                        <?php endif ?>
                    </div>
                <?php endif; ?>
            </div>
            <p class="text-sm md:text-base prose-strong:font-semibold">
                <?php echo $product->get_short_description() ?>
            </p>
        </div>
        <span class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary group-hover:bg-secondary transition duration-200">
            <?php esc_html_e('Show product','smoothh') ?>
        </span>
    </a>
</li>