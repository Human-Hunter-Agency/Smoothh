<?php

/** Template to display 'Blok z treścią + dekoracja (dwie kolumny)' - content_block_two_cols */

$header = $args['header'];
$description = $args['description'];
$decoration_img = $args['decoration_img'];

?>

<div class="relative py-10 md:py-20">
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="z-0 w-full lg:w-1/2">
                <?php if ($header) : ?>
                    <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                        <?php echo $header; ?>
                    </div>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="text-[16px] font-normal leading-[26px]">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-0 lg:w-1/2 relative">

            </div>
        </div>
    </div>
    <?php if ($decoration_img) : ?>
        <div class="hidden lg:block absolute right-0 top-7">
            <?php echo smoothh_img_responsive($decoration_img, '', array(646,738), 'lazy') ?>
        </div>
    <?php endif; ?>
</div>