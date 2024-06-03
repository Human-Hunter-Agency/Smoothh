<?php

/** Template to display 'Sekcja z dekoracją 3x3' - grid_decor_3x3 */

$content = $args['content'];
$image_3x3 = $args['image_3x3'];
$title2 = $args['title2'];
$description = $args['description'];
$logo = $args['logo'];
?>

<div class="relative py-10 md:py-20 mt-20">
    <div class="z-[-1] xl:w-[85%] 2xl:w-[88%] lg:h-[1200px] absolute top-8 right-0 bg-gradient-to-l from-[rgba(129,23,238,0)] to-[rgba(129,23,238,0.102)]"></div>
    <div class="container">
        <div class="mb-44 flex flex-col lg:flex-row gap-24">
            <div class="z-0 w-full lg:w-1/2">
                <?php if ($image_3x3) : ?>
                    <div class="-mt-28">
                        <?php echo smoothh_img_responsive($image_3x3, '', null, 'lazy') ?>
                    </div>
                <?php else : ?>
                    <div class="lg:-m-10">
                        <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/gallery-3x3.png'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-full lg:w-1/2 lg:pt-64">
                <?php if ($content) : ?>
                    <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <?php if ($title2) : ?>
                <div class="mb-12 prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                    <?php echo $title2; ?>
                </div>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="py-12 px-28 bg-white rounded-[45px] drop-shadow-2xl">
                    <div class="mb-20 prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
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

</div>