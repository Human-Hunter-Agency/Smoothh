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
                    <div class="mb-10 text-2xl md:text-5xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px] [&_p]:text-[16px] [&_p]:leading-[26px]">
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