<?php

/** Template to display 'Blok z treścią + cień' */

$header = $args['header'];
$description = $args['description'];
$logo = $args['logo'];
?>

<div class="relative py-10 mt-10 md:mb-[150px]">
    <div class="container">
        <?php if ($header) : ?>
            <div class="mb-12 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                <?php echo $header; ?>
            </div>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="lg:py-12 p-8 lg:px-28 bg-white rounded-[45px] drop-shadow-2xl">
                <div class="mb-20 text-[16px] font-normal leading-[26px]">
                    <?php echo $description; ?>
                </div>
                <?php if ($logo) : ?>
                    <div class="w-full flex items-center justify-center">
                        <?php echo smoothh_img_responsive($logo, '', null, 'lazy') ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</div>
