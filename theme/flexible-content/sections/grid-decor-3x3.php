<?php

/** Template to display 'Sekcja z dekoracją 3x3' - grid_decor_3x3 */

$content = $args['content'];
$image_3x3 = $args['image_3x3'];
$title2 = $args['title2'];
$description = $args['description'];
$logo = $args['logo'];
?>

<div class="relative py-10 md:py-20">
    <div class="bg-container w-[85%] h-[1200px] absolute top-8 right-0 bg-gradient-to-l from-[rgba(129,23,238,0)] to-[rgba(129,23,238,0.102)]"></div>
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-24">
            <div class="z-0 w-1/2">
                <?php if ($image_3x3) : ?>
                    <div class="decor-3x3 -mt-14">
                        <?php echo smoothh_img_responsive($image_3x3, '', null, 'lazy') ?>
                    </div>
                <?php else : ?>
                    <div class="decor-3x3-default -m-10">
                        <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/gallery-3x3.png'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-1/2 pt-64">
                <?php if ($content) : ?>
                    <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="meet-sgp">
            <?php if ($title2) : ?>
                <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                    <?php echo $title2; ?>
                </div>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="py-12 px-30 rounded-xl shadow-lg">
                    <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                        <?php echo $description; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($logo) : ?>
                <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                    <?php echo smoothh_img_responsive($logo, '', null, 'lazy') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>