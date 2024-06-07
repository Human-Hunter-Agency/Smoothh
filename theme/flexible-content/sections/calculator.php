<?php
/** Template to display 'Sekcja z listą ikon' - list_icons */

    $header = $args['header'];

?>

<div class="relative py-10 md:py-[70px]">
    <div class="container">
        <?php if ($header) : ?>
            <div class="mb-10 md:mb-[50px]">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl text-foreground">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        <?php endif; ?>
            <?php 
            echo do_shortcode('[product_page id="1186"]');
            // $product_id=1186;
            // do_action("woocommerce_tm_epo",$product_id); 
            // [add_to_cart id="1186" sku=""] ?>
        </div>
    </div>