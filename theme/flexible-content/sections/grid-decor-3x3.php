<?php

/** Template to display 'Sekcja z dekoracją 3x3' - grid_decor_3x3 */

$header = $args['header'];
$description = $args['description'];
$image_3x3 = $args['image_3x3'];
?>

<div class="relative py-10 md:py-15 md:mt-20">
    <div class="z-[-1] lg:w-[85%] 2xl:w-[88%] lg:h-full absolute top-0 right-0 bg-gradient-to-l to-[rgba(129,23,238,0)] from-[rgba(129,23,238,0.102)]"></div>
    <div class="container">
        <div class="lg:mb-28 flex flex-col lg:flex-row gap-10 lg:gap-24">
            <div class="z-0 w-full lg:w-1/2">
                <?php if ($image_3x3) : ?>
                    <div class="-mt-32">
                        <?php echo smoothh_img_responsive($image_3x3, '', array(768, 768), 'lazy') ?>
                    </div>
                <?php else : ?>
                    <div class="lg:-m-10">
                        <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/gallery-3x3.png'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-full lg:w-1/2 lg:pt-52">
                <?php if ($header) : ?>
                    <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-extrabold lg:leading-[55px]">
                        <?php echo $header; ?>
                    </div>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="text-[16px] font-normal leading-[26px]">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
