<?php

/** Template to display 'Blok z treścią + dekoracja (dwie kolumny)' - content_block_two_cols */

$content = $args['content'];
$decoration = $args['decoration'];

?>

<div class="relative py-10 md:py-20 overflow-x-hidden">
    <div class="container">
        <div class="flex gap-10">
            <div class="z-0 w-1/2">
                <?php if ($header) : ?>
                    <h2 class="text-left font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                        <?php echo esc_html($header); ?>
                    </h2>
                <?php endif; ?>
                <?php if ($content) : ?>
                    <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="w-1/2 relative">
            <?php if ($decoration) : ?>
                <div class="decor-gradient absolute right-0 top-7">
                    <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/abstract_gradient.svg'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>