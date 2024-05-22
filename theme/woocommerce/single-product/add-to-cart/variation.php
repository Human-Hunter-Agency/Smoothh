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

defined( 'ABSPATH' ) || exit;

?>
<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price flex items-end justify-end shrink-0 [&_.woocommerce-Price-currencySymbol]:hidden text-primary [&_bdi]:text-4xl [&_del_bdi]:!text-xl [&_bdi]:!font-normal [&_bdi]:text-primary [&_ins]:no-underline [&_del_bdi]:!text-black [&_del]:h-8 [&_del]:!decoration-black [&_del_bdi]:mr-1.5">
        <span class="flex flex-col">
            {{{ data.variation.price_html }}}
        </span>    
        <span class="net-label text-primary font-normal text-xl md:text-2xl"><?php echo get_woocommerce_currency_symbol()?> <?php esc_html_e('net','smoothh') ?></span>
    </div>
    <span class="mb-2 text-foreground text-lg md:text-base text-right">{{{ data.variation.tax_text }}}</span>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p><?php esc_html_e( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ); ?></p>
</script>