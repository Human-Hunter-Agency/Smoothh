<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 *
 * @var bool   $readonly If the input should be set to readonly mode.
 * @var string $type     The input type attribute.
 */

defined( 'ABSPATH' ) || exit;

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );

?>
<div class="quantity !mr-3 items-center">
	<?php
	/**
	 * Hook to output something before the quantity input field.
	 *
	 * @since 7.2.0
	 */
	do_action( 'woocommerce_before_quantity_input_field' );
	?>
    <div data-js="qty-control" class="flex items-center gap-1">
        <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
        <input
        type="<?php echo esc_attr( $type ); ?>"
            <?php echo $readonly ? 'readonly="readonly"' : ''; ?>
            id="<?php echo esc_attr( $input_id ); ?>"
            class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?> text-xl font-semibold appearance-none !size-10 bg-transparent border border-primary rounded-md overflow-hidden text-primary"
            name="<?php echo esc_attr( $input_name ); ?>"
            value="<?php echo esc_attr( $input_value ); ?>"
            aria-label="<?php esc_attr_e( 'Product quantity', 'woocommerce' ); ?>"
            size="4"
            min="<?php echo esc_attr( $min_value ); ?>"
            max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
            <?php if ( ! $readonly ) : ?>
                step="<?php echo esc_attr( $step ); ?>"
                placeholder="<?php echo esc_attr( $placeholder ); ?>"
                inputmode="<?php echo esc_attr( $inputmode ); ?>"
                autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
                <?php endif; ?>
                />
            <button data-js="down" type="button" class="group appearance-none p-1 cursor-pointer">
                <svg class="w-full stroke-primary group-hover:stroke-foreground transition duration-200" width="16" height="15" viewBox="0 0 12 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.193359" y1="0.5" x2="12" y2="0.5" stroke-width="1px"></line>
                </svg>
            </button>
            <button data-js="up" type="button" class="group appearance-none p-1 ml-1 cursor-pointer">
                <svg class="w-full stroke-primary group-hover:stroke-foreground transition duration-200" width="16" height="15" viewBox="0 0 12 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.193359" y1="0.5" x2="12" y2="0.5" stroke-width="1px"></line>
                    <line x1="0.193359" y1="0.5" x2="15" y2="0.5" transform="rotate(90 7 -0.5)" stroke-width="1px"></line>
                </svg>
            </button>
    </div>
	<?php
	/**
	 * Hook to output something after quantity input field
	 *
	 * @since 3.6.0
	 */
	do_action( 'woocommerce_after_quantity_input_field' );
	?>
</div>
<?php