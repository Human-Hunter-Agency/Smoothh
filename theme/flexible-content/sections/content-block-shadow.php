<?php

/** Template to display 'Blok z treścią + cień' */

$header = $args['header'];
$description = $args['description'];
$logo = $args['logo'];
?>

<div class="relative py-10 mt-10">
    <div class="container">
        <?php if ($title2) : ?>
            <div class="mb-12 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                <?php echo $title2; ?>
            </div>
        <?php endif; ?>

        <?php if ($description2) : ?>
            <div class="lg:py-12 p-8 lg:px-28 bg-white rounded-[45px] drop-shadow-2xl">
                <div class="mb-20 text-[16px] font-normal leading-[26px]">
                    <?php echo $description2; ?>
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