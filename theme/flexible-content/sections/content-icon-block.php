<?php

/** Template to display 'Blok z treścią' - content_icon_block */

$header = $args['header'];
$content = $args['content'];
$iconContent = $args['icon_content'];
$decoration = $args['decoration'];
$has_bg = $args['has_bg'];

?>

<div class="relative <?php if ($has_bg) : ?> md:pt-[60px] bg-gradient-to-b from-secondary to-primary text-white <?php endif; ?>">
    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo esc_html($header); ?>
                </h2>
            <?php endif; ?>
            <?php if ($content) : ?>
                <div class="prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-7 flex items-center justify-center gap-4 <?php if ($has_bg) : ?> [&_*]:!text-white <?php endif; ?>">
                    <?php echo $content; ?><span class="w-[70px] h-[70px] rounded-full bg-primary flex items-center justify-center text-white font-semibold"><?php echo '< ' . $iconContent . ' %'; ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($decoration) : ?>
        <div class="absolute right-7 top-7 -z-10 opacity-5 max-w-[220px] lg:max-w-[360px]">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/decor.svg'); ?>
        </div>
    <?php endif; ?>
</div>