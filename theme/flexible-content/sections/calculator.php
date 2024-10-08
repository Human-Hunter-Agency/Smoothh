<?php

/** Template to display 'Kalkulator */

$header = $args['header'];

?>

    <div id="calculator" class="relative py-10 md:py-[70px]">
        <div data-calc-bg class="only-on-some-show z-[-1] w-[100%] lg:w-[97%] h-full absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
        <div class="container calculator">
            <?php if ($header) : ?>
                <div class="mb-10 md:mb-[50px]">
                    <h2 class="text-center text-2xl md:text-4xl lg:text-[46px] font-extrabold lg:leading-[55px] text-foreground prose-strong:text-primary">
                        <?php echo __($header); ?>
                    </h2>
                </div>
            <?php endif; ?>
            <!-- <ul class="p-2 rounded-2xl bg-[#F2F2F2] flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-5 md:mb-10">
                <li class="flex-1">
                    <button data-js-calc-tab-btn="1" class="active tab-btn"><?php echo __('Basic', 'smoothh') ?></button>
                </li>
                <li class="flex-1">
                    <button data-js-calc-tab-btn="2" class="tab-btn"><?php echo __('Advanced', 'smoothh') ?></button>
                </li>
            </ul> -->
            <?php
                $account_type = get_user_meta(get_current_user_id(), 'account_type', true); 
                if (!is_user_logged_in() || $account_type == 'candidate') : ?>
                <div data-js-calc-content="1">
                    <?php
                    echo do_shortcode('[product_page id="1186"]');
                    ?>
                </div>
            <?php else: ?>
                <div data-js-calc-content="2">
                    <?php
                    echo do_shortcode('[product_page id="1253"]');
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>