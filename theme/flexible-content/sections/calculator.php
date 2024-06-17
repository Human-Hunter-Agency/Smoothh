<?php
/** Template to display 'Sekcja z listą ikon' - list_icons */

    $header = $args['header'];

?>

<div class="relative py-10 md:py-[70px]">
    <div class="container calculator-wrapper">
        <?php if ($header) : ?>
            <div class="mb-10 md:mb-[50px]">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl text-foreground">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        <?php endif; ?>
        <ul class="p-2 rounded-2xl bg-[#F2F2F2] flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-5 md:mb-10">
            <li class="flex-1">
                <button data-js-calc-tab-btn="1" class="active tab-btn"><?php echo __('Basic','smoothh') ?></button>
            </li>
            <li class="flex-1">
                <button data-js-calc-tab-btn="2" class="tab-btn"><?php echo __('Advanced','smoothh') ?></button>
            </li>
        </ul>
        <div data-js-calc-content="1" class="">
            <?php 
                echo do_shortcode('[product_page id="1186"]');
            ?>
        </div>
        <div data-js-calc-content="2" class="hidden">
            <?php 
                echo do_shortcode('[product_page id="1253"]');
            ?>
        </div>
    </div>
</div>