<?php

/** Template to display 'Lista kategorii produktów' - list_product_categories */

?>


<div class="container mb-10">
    <?php
    $args = array(
        'taxonomy'     => 'product_cat',
        'title_li'     => '',
    );
    $all_categories = get_categories($args);

    if ($all_categories) : ?>

        <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-10 sm:gap-y-14 xl:gap-[90px]">
            <?php
                foreach ($all_categories as $cat):
                    $products = wc_get_products(array(
                        'category' => array($cat->slug),
                    ));

                    $all_prices = array();

                    foreach ($products as $product) {
                        $all_prices[] = wc_get_price_excluding_tax($product);
                    }
                    
                    $min_price = min($all_prices);
            ?>
                <li>
                    <a href="<?php echo get_term_link( $cat->term_id, 'product_cat' ); ?>" class="group h-full flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl">
                        <div class="relative overflow-hidden rounded-t-[14px] w-full !h-[190px] md:!h-[220px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                            <?php
                                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                                $image = wp_get_attachment_url( $thumbnail_id ); 
                                echo "<img src='{$image}' alt='{$cat->name}' width='762' height='365' />";
                            ?>
                            <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
                        </div>
                        <div class="w-full flex-1 p-3 md:p-6">
                            <div class="flex flex-col gap-2 justify-between mb-5">
                                <h4 class="text-lg md:text-xl text-primary font-semibold">
                                    <?php echo $cat->name ?> 
                                </h4>
                                <?php // if (is_user_logged_in() || is_category_guest_available($cat)) : ?>
                                    <span class="text-lg md:text-xl shrink-0">
                                        <?php
                                            echo number_format( $min_price, wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator());
                                        ?> <?php esc_html_e('net','smoothh') ?>
                                    </span>
                                <?php // endif; ?>
                            </div>
                            <p class="text-sm md:text-base prose-strong:font-semibold">
                                <?php echo $cat->description ?>
                            </p>
                        </div>
                        <span class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary group-hover:bg-secondary transition duration-200">
                            <?php esc_html_e('Show products','smoothh') ?>
                        </span>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    <?php endif ?>
</div>