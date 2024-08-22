<?php

/** Template to display 'Blok z treścią + dekoracja (dwie kolumny)' - content_block_two_cols */

$header = $args['header'];
$description = $args['description'];
$decoration_img = $args['decoration_img'];
$isDecorationOverflow = $args['isDecorationOverflow'];

?>

<div class="relative py-10 md:py-28 md:pt-20 md:pb-0 md:mt-[50px] <?php if (!$isDecorationOverflow) : ?> overflow-hidden <?php endif; ?>">
    <div class="z-[-1] lg:w-[85%] 2xl:w-[88%] lg:h-[1200px] absolute top-0 right-0 bg-white rounded-[45px] <?php if (!$isDecorationOverflow) : ?> !rounded-none bg-gradient-to-l to-[rgba(129,23,238,0)] from-[rgba(129,23,238,0.102)] <?php endif; ?> "></div>

    <div class="container <?php if (!$isDecorationOverflow) : ?> overflow-visible <?php endif; ?>">
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="z-0 w-full lg:w-1/2 mb-[50px]">
                <?php if ($header) : ?>
                    <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                        <?php echo $header; ?>
                    </div>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="max-w-[540px] text-[16px] font-normal leading-[26px]">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-0 lg:w-1/2 relative">
                <?php if ($decoration_img && !$isDecorationOverflow) : ?>
                    <div class="hidden lg:block -translate-y-12 translate-x-24">
                        <?php echo smoothh_img_responsive($decoration_img, '', array(768, 768), 'lazy') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($decoration_img && $isDecorationOverflow) : ?>
        <div class="hidden lg:block absolute right-0 -top-10 2xl:w-[36%]">
            <?php echo smoothh_img_responsive($decoration_img, '', array(768, 768), 'lazy') ?>
        </div>
    <?php endif; ?>
</div>
