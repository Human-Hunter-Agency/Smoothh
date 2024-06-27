<?php

/**
 * Single variation display
 *
 * This is a javascript-based template for single variations (see https://codex.wordpress.org/Javascript_Reference/wp.template).
 * The values will be dynamically replaced after selecting attributes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.5.0
 */

defined('ABSPATH') || exit;

?>
<script type="text/template" id="tmpl-variation-template">
    <div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price flex items-end justify-end shrink-0 [&_.woocommerce-Price-currencySymbol]:hidden text-foreground [&_bdi]:text-[22px] [&_del_bdi]:!text-[22px] [&_bdi]:!font-bold [&_bdi]:text-foreground [&_ins]:no-underline [&_del_bdi]:!text-foreground [&_del]:h-8 [&_del]:!decoration-foreground [&_del_bdi]:mr-1.5">
        <span class="[&_.price]:flex [&_.price]:flex-col [&_.price]:items-end">
            {{{ data.variation.price_html }}}
        </span>    
        <span class="net-label text-foreground font-normal text-xl md:text-[22px] whitespace-nowrap"><?php echo get_woocommerce_currency_symbol() ?> <?php esc_html_e('net', 'smoothh') ?>{{{ data.variation.hourly_text }}}</span>
    </div>
    <span class="woocommerce-variation-tax mb-2 text-[#A7A7A7] text-lg md:text-base text-right ml-auto block">{{{ data.variation.tax_text }}}</span>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
    <p><?php esc_html_e('Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce'); ?></p>
</script>