<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.9.1
 */

defined('ABSPATH') || exit;

if (is_shop()) {

    $shop_page_id = get_option('woocommerce_shop_page_id');

    query_posts('page_id=' . $shop_page_id);

    // load the page template for the current theme
    include get_template_directory() . "/" . "page.php";

    exit;
} else {

    get_header();

    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action('woocommerce_before_main_content');

?>
    <header class="woocommerce-products-header">

        <div class="relative w-full h-[300px] md:h-[400px] flex flex-col items-center justify-center mb-[50px] md:mb-[100px]">
            <?php if (function_exists('yoast_breadcrumb')) : ?>
                <div class="breadcrumbs-container absolute top-0 inset-x-0">
                    <?php yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-banner">', '</div>'); ?>
                </div>

            <?php endif; ?>

            <?php smoothh_post_thumbnail(); ?>

            <div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/80"></div>

            <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                <div class="relative z-0 flex flex-col items-center justify-center container">
                    <h1 class="text-5xl md:text-[46px] leading-[55px] text-center text-bold text-white font-bold"><?php woocommerce_page_title(); ?></h1>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <div class="container">
        <div class="hidden mb-7 md:mb-[50px] text-center prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-7">
            <?php
            /**
             * Hook: woocommerce_archive_description.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            do_action('woocommerce_archive_description');
            ?>
        </div>

        <div class="mx-auto pt-10 mb-10 md:mb-20">
            <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-[46px] lg:leading-[55px] text-foreground prose-strong:text-primary">
                <?php echo __('Choose product for <strong>yourself</strong>', 'smoothh'); ?>
            </h2>
        </div>

        <?php
        if (woocommerce_product_loop()) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20 -removed
             * @hooked woocommerce_catalog_ordering - 30 -removed
             */
            do_action('woocommerce_before_shop_loop');

        ?>

            <ul class="w-full mb-10 md:mb-20 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-10 sm:gap-y-14 xl:gap-12">
                <?php
                //woocommerce_product_loop_start();

                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                }

                //woocommerce_product_loop_end();
                ?>
            </ul>
        <?php

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
        }
        ?>

        <?php
        $above_footer_fields = get_field('category_sections_settings', 'option');
        $client_logos = get_field('client_logos', 'option');
        if ($above_footer_fields) {
            $header_logos = $above_footer_fields['header_logos'];
            $description_logos = $above_footer_fields['description_logos'];
            $cta_header = $above_footer_fields['cta_header'];
            $cta_btn = $above_footer_fields['cta_btn'];
        }

        ?>

        <section class="relative py-10 md:py-[60px] mb:pb-[60px]">
            <?php if (isset($header_logos) && $header_logos) : ?>
                <div class="container">
                    <div class="relative z-0">
                        <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                            <?php echo $header_logos; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($description_logos) && $description_logos) : ?>
                <div class="container">
                    <div class="relative z-0">
                        <div class="mb-12 mx-auto max-w-[800px] text-[16px] font-normal leading-[26px]">
                            <?php echo $description_logos ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="relative z-0 w-full overflow-hidden !pb-5">
                <?php if ($client_logos) : ?>
                    <div class="swiper !container !overflow-visible" data-js="swiper-logos">
                        <div class="swiper-wrapper items-center">
                            <?php foreach ($client_logos as $logo) : ?>
                                <div class="swiper-slide mr-5 md:px-5 opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
                                    <?php echo smoothh_img_responsive($logo, 'object-contain max-h-28', array(300, 112), 'lazy'); ?>
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

        <section>
            <?php if ($cta_header || $cta_btn) :
            ?>
                <div class="mx-auto w-full -mb-20 px-4 md:px-8 lg:px-24 py-8 md:py-14 flex flex-col md:flex-row gap-2 items-center justify-between drop-shadow-2xl rounded-3xl bg-gradient-to-b from-secondary to-primary">
                    <?php if (isset($cta_header)) : ?>
                        <h3 class="mb-0 text-xl sm:text-2xl md:text-3xl lg:text-5xl text-bold text-white font-bold text-left"><?php echo esc_html($cta_header); ?></h1>
                        <?php endif; ?>

                        <?php if (isset($cta_btn)) :
                            $btn_url = $cta_btn['url'];
                            $btn_title = $cta_btn['title'];
                            $btn_target = $cta_btn['target'] ? $cta_btn['target'] : '_self';
                        ?>
                            <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="rounded-3xl text-lg md:text-xl font-semibold md:font-bold py-2 px-5 md:px-12 border-[1px] border-white text-white bg-transparent hover:bg-white/20 transition duration-200"><?php echo esc_html($btn_title); ?></a>
                        <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>

    </div>






<?php

    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action('woocommerce_after_main_content');

    get_footer();
}
