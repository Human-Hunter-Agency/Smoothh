<?php

/** Template to display 'Sekcja z dekoracją 3x3' - grid_decor_3x3 */

$content = $args['content'];
$image_3x3 = $args['image_3x3'];

?>

<div class="relative py-10 md:py-20">
    <div class="container">
        <div class="flex gap-10">
            <div class="z-0 w-1/2">
                <?php if ($image_3x3) : ?>
                    <div class="decor-3x3 -m-10">
                        <?php echo smoothh_img_responsive($image_3x3, 'test', null, 'lazy') ?>
                    </div>
                <?php else : ?>
                    <div class="decor-3x3-default -m-10">
                        <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/gallery-3x3.png'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-1/2">
                <?php if ($content) : ?>
                    <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>