<?php

/** Template to display 'Blok z treścią' - content_block */

$header = $args['header'];
$content = $args['content'];
$decoration = $args['decoration'];
$has_bg = $args['has_bg'];

?>

<div class="relative py-10 md:py-20 <?php if ($has_bg) : ?> md:pt-[60px] bg-gradient-to-b from-secondary to-primary text-white <?php endif; ?>">
    <div class="z-[-1] lg:w-[85%] 2xl:w-[88%] h-auto absolute top-0 right-0 bg-white rounded-[45px]  !rounded-none bg-gradient-to-l to-[rgba(129,23,238,0)] from-[rgba(129,23,238,0.102)]  "></div>
    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
                <div class="mx-auto max-w-[1100px] text-center font-bold text-2xl md:text-3xl lg:text-[46px] lg:leading-[55px] mb-9">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <?php if ($content) : ?>
                <div class="m-8 !mt-0 mx-auto max-w-[900px] text-[16px] font-normal leading-[26px] prose-ul:list-inside prose-li:marker:content-['●'] prose-li:marker:text-foreground prose-li:my-1 <?php if ($has_bg) : ?> [&_*]:!text-white <?php endif; ?> [&_.circled]:size-12 md:[&_.circled]:size-[70px] [&_.circled]:text-white [&_.circled]:rounded-full [&_.circled]:bg-primary  [&_.circled]:inline-flex [&_.circled]:items-center [&_.circled]:justify-center [&_.circled]:font-bold [&_.circled]:whitespace-nowrap">
                    <?php echo $content; ?>
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