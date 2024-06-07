<?php

/** Template to display 'Blok z treścią + dekoracja (dwie kolumny)' - content_block_two_cols */

$content = $args['content'];
$decoration = $args['decoration'];

?>

<div class="relative py-10 md:py-20">
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="z-0 w-full lg:w-1/2">
                <?php if ($content) : ?>
                    <div class="prose-smoothh prose md:prose-xl h2:text-2xl md:h2:text-5xl lg:h2:text-[46px] lg:h2:font-extrabold lg:h2:leading-[55px] prose-p:text-[16px] prose-p:leading-[26px] prose-img:mt-0 prose-img:mx-auto prose-img:px-5">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-0 lg:w-1/2 relative">

            </div>
        </div>
    </div>
    <?php if ($decoration) : ?>
        <div class="hidden lg:block absolute right-0 top-7">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/abstract_gradient.svg'); ?>
        </div>
    <?php endif; ?>
</div>