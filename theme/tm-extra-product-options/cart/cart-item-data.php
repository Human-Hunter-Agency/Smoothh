<?php

/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/tm-extra-product-options/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 *
 * Modified for Extra Product Options
 */

defined('ABSPATH') || exit;

$separator = THEMECOMPLETE_EPO_DATA_STORE()->get('tm_epo_separator_cart_text');

if (!is_checkout()) :
?>
    <div data-js="dropdown">
        <div class="overflow-hidden h-0 transition-all duration-300" data-js="dropdown-container">
            <dl class="tc-epo-metadata variation text-sm md:px-3 py-3">
                <?php
                if (isset($item_data)) :
                    foreach ($item_data as $data) :
                        $is_epo      = false;
                        $show_dt     = true;
                        $show_dd     = true;
                        $class_name  = '';
                        $class_value = '';
                        if (isset($data['tm_label'])) {
                            $is_epo      = true;
                            $class_name  = 'tc-name ';
                            $class_value = 'tc-value ';
                        }

                        if (!isset($data['display']) && isset($data['value'])) {
                            $data['display'] = $data['value'];
                        }
                        if ($is_epo && '' === $data['key']) {
                            $show_dt = false;
                        }
                        if ($is_epo && '' === $data['display']) {
                            $show_dd = false;
                        }
                        if (('link' === THEMECOMPLETE_EPO_DATA_STORE()->get('tm_epo_cart_field_display') && isset($data['popuplink'])) || !$show_dd) {
                            $separator = '';
                        }

                        // $data['key'] and $data['display'] contians HTML code
                        // thus the use of wp_kses_post and not esc_html
                ?>
                        <?php if ($show_dt) : ?>
                            <dt class="<?php echo esc_attr(sanitize_html_class($class_name)); ?> !mr-3 font-semibold variation-<?php echo esc_attr(sanitize_html_class($data['key'])); ?>"><?php echo apply_filters('wc_epo_kses', wp_kses_post($data['key']), $data['key'], false); // phpcs:ignore WordPress.Security.EscapeOutput 
                                                                                                                                                                                            ?><?php echo esc_html($separator); ?></dt>
                        <?php else : ?>
                            <dt class="<?php echo esc_attr(sanitize_html_class($class_name)); ?> tc-hidden-variation">&nbsp;</dt>
                        <?php endif; ?>
                        <?php if ($show_dd) : ?>
                            <dd class="<?php echo esc_attr(sanitize_html_class($class_value)); ?> !mb-0.5 prose-a:text-primary prose-a:underline variation-<?php echo esc_attr(sanitize_html_class($data['key'])); ?>"><?php echo apply_filters('wc_epo_kses', wp_kses_post(wpautop($data['display'])), wpautop($data['display']), false); // phpcs:ignore WordPress.Security.EscapeOutput 
                                                                                                                                                                                ?></dd>
                        <?php else : ?>
                            <dd class="<?php echo esc_attr(sanitize_html_class($class_value)); ?> tc-hidden-variation">&nbsp;</dd>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </dl>
        </div>
        <button type="button" data-js="dropdown-toggle" class="text-primary font-semibold appearance-none group text-sm my-2 flex items-center gap-2">
            <span class="group-aria-expanded:hidden">
                <?= __('Show configuration', 'smoothh');  ?>
            </span>
            <span class="hidden group-aria-expanded:block">
                <?= __('Hide configuration', 'smoothh');  ?>                
            </span>
            <svg class="transition duration-200 group-aria-expanded:rotate-180" width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.9595 0.75L7 9.1368L1.04047 0.75H12.9595Z" fill="#8117EE" stroke="#8117EE"></path>
            </svg>

        </button>
    </div>
<?php endif; ?>