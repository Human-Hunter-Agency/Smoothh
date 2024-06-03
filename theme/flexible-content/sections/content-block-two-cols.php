<?php

/** Template to display 'Blok z treścią + dekoracja (dwie kolumny)' - content_block_two_cols */

$header = $args['header'];
$content = $args['content'];
$decoration = $args['decoration'];

?>

<div class="relative py-10 md:py-20">
    <div class="container">
        <div class="relative flex gap-10">
            <div class="z-0">
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
        <?php if ($decoration) : ?>
            <div class="absolute right-7 top-7 max-w-[220px] lg:max-w-[360px]">
                <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/Abstract_Fluid_Gradient_Background.png'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>