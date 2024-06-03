<?php

/** Template to display 'Sekcja z kafelkami stron' - tiles_pages */

$header = $args['header'];
$description = $args['description'];
$decoration = $args['decoration'];
$titles_primary = $args['titles_primary'];
$tiles_list = $args['tiles_list'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">
    <div class="z-[-1] xl:w-[85%] 2xl:w-[88%] lg:h-[1024px] absolute top-8 right-0 bg-gradient-to-l from-[rgba(31,151,212,0)] to-[rgba(31, 151, 212, 0.102)]"></div>
    <?php if ($decoration) : ?>
        <div class="absolute right-7 top-7 -z-10 opacity-5 max-w-[90px] lg:max-w-[180px]">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/decor.svg'); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="mx-auto relative z-0 max-w-[650px]">
            <?php if ($header) : ?>
                <div class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="prose-smoothh prose md:prose-xl text-center mb-10"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($tiles_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper">
                    <?php foreach ($tiles_list as $tile) : ?>
                        <div class="swiper-slide !h-auto !flex items-center flex-col xl:!basis-[calc(33%_-_56px)] drop-shadow-xl rounded-2xl">
                            <?php if ($tile['image'] && $tile['image']['url']) : ?>
                                <div class="w-full relative mb-5 rounded-t-[14px] overflow-hidden">
                                    <?php echo smoothh_img_responsive($tile['image'], 'object-cover w-full !h-[190px] md:!h-[220px]', array(360, 220), 'lazy'); ?>
                                    <div class="absolute inset-0 bg-gradient-to-b from-[#1F97D4] to-[#8117EE] mix-blend-multiply"></div>
                                </div>
                            <?php endif; ?>
                            <div class="text-center p-3 md:p-6 !pt-0">
                                <?php if ($tile['title']) : ?>
                                    <h3 class="text-base md:text-xl mb-9 font-semibold <?php if ($titles_primary) : ?> text-primary <?php endif; ?>"><?php echo $tile['title']; ?></h3>
                                <?php endif; ?>
                                <?php if ($tile['description']) : ?>
                                    <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if ($tile['button']) :
                                $btn_url = $tile['button']['url'];
                                $btn_title = $tile['button']['title'];
                                $btn_target = $tile['button']['target'] ? $tile['button']['target'] : '_self';
                            ?>
                                <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200"><?php echo esc_html($btn_title); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>