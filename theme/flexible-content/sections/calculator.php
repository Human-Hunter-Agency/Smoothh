<?php
/** Template to display 'Sekcja z listą ikon' - list_icons */

    $header = $args['header'];

?>

<div class="relative py-10 md:py-[70px] bg-gradient-to-b from-secondary to-primary">
    <div class="container">
        <?php if ($header) : ?>
            <div class="container mb-10 md:mb-[50px]">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl text-white">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        <?php endif; ?>
            <?php echo do_shortcode('[product_page id="1186"]'); ?>
        </div>
    </div>