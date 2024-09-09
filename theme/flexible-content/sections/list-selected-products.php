
<pre><?php print_r($args['products_list'])  ?></pre>

<?php

/** Template to display 'Lista z wybranymi produktami' - list_selected_products */

$header = $args['header'];
$description = $args['description'];
$button = $args['button'];

if (isset($args['products_list']) && !empty($args['products_list'])) {
    $products = $args['products_list'];
    foreach ($products as &$product) {
        $product = wc_get_product($product->ID);
    }
}
?>
<?php if (isset($products) && !empty($products)) : ?>
<section class="relative py-10 mb:py-[60px] md:pt-[70px] md:!pb-[70px]">
    <div class="container">
        <?php if ($header) : ?>
            <div class="relative z-0">
                <div class="text-center font-extrabold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo $header; ?>
                </div>
            </div>

        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="mx-auto max-w-[900px] mb-12 text-[16px] font-normal leading-[26px]">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>

        <ul class="w-full mb-10 md:mb-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-10 sm:gap-y-14 xl:gap-12">
            <?php foreach ($products as $product) : ?>
                <li>
                    <?php get_template_part('flexible-content/sections/partials/product-tile', '', array('product' => $product, 'swiper' => false,'styles_basic' => false)); ?>
                </li>
            <?php endforeach; ?>  
        </ul>
        <?php if( $button ): 
            $btn_url = $button['url'];
            $btn_title = $button['title'];
            $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="block p-2 text-[20px] text-foreground hover:text-primary w-fit mx-auto font-bold transition duration-200" >
                <?php echo esc_html( $btn_title ); ?>
            </a>
        <?php endif; ?>
    </div>

</section>
<?php endif; ?>