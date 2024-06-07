<?php

/** Template to display 'Sekcja z kafelkami stron' - tiles_pages */

$header = $args['header'];
$description = $args['description'];
$decoration = $args['decoration'];
$titles_primary = $args['titles_primary'];
$tiles_list = $args['tiles_list'];

?>

<div class="relative pb-10 pt-20 md:pt-[90px] md:pb-0 mb-20">
    <div class="z-[-1] w-[100%] lg:w-[85%] h-full absolute top-8 right-0 bg-gradient-to-r from-[rgba(31,151,212,0.1)] to-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <?php if ($decoration) : ?>
        <div class="absolute right-7 top-7 -z-10 opacity-5 max-w-[90px] lg:max-w-[180px]">
            <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/decor.svg'); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="mx-auto relative z-0 max-w-[900px] mb-12 lg:mb-24">
            <?php if ($header) : ?>
                <div class="text-center prose md:prose-xl h2:text-2xl md:h2:text-5xl lg:h2:text-[46px] lg:h2:font-extrabold lg:h2:leading-[55px] prose-p:text-[16px] prose-p:leading-[26px] mb-9 md:mb-14">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="prose-smoothh prose md:prose-xl text-center h2:text-2xl md:h2:text-5xl lg:h2:text-[46px] lg:h2:font-extrabold lg:h2:leading-[55px] prose-p:text-[16px] prose-p:leading-[26px] mb-10"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden pb-10 lg:!pb-32">
        <?php if ($tiles_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper">
                    <?php foreach ($tiles_list as $tile) : ?>
                        <div class="swiper-slide !h-auto !flex items-center flex-col xl:!basis-[calc(33%_-_56px)] bg-white drop-shadow-lg lg:drop-shadow-2xl rounded-2xl">
                            <?php if ($tile['image'] && $tile['image']['url']) : ?>
                                <div class="w-full relative mb-5 rounded-t-[14px] overflow-hidden">
                                    <?php echo smoothh_img_responsive($tile['image'], 'object-cover w-full !h-[190px] md:!h-[220px]', array(360, 220), 'lazy'); ?>
                                    <div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
                                </div>
                            <?php endif; ?>
                            <div class="text-center p-3 md:p-6 !pt-0">
                                <?php if ($tile['title']) : ?>
                                    <h3 class="text-base md:text-[20px] mb-9 font-semibold <?php if ($titles_primary) : ?> text-primary <?php endif; ?>"><?php echo $tile['title']; ?></h3>
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
                <div class="swiper-nav w-28  h-20 hidden lg:flex gap-5 !absolute !top-auto !bottom-[-100px] left-[50%] -translate-x-1/2">
                    <div class="swiper-button-prev rotate-180 scale-150">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="40" viewBox="0 0 39 40" fill="none">
                            <path d="M19.6177 38.1958C9.57757 38.1958 1.43846 30.0567 1.43846 20.0166C1.43846 9.97651 9.57757 1.8374 19.6177 1.8374C29.6578 1.8374 37.7969 9.97651 37.7969 20.0166C37.7969 30.0567 29.6578 38.1958 19.6177 38.1958Z" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20.1627 28.7426L28.8887 20.0165L20.1627 11.2905" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.8917 20.0171H28.3438" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="swiper-button-next scale-150">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="40" viewBox="0 0 39 40" fill="none">
                            <path d="M19.6177 38.1958C9.57757 38.1958 1.43846 30.0567 1.43846 20.0166C1.43846 9.97651 9.57757 1.8374 19.6177 1.8374C29.6578 1.8374 37.7969 9.97651 37.7969 20.0166C37.7969 30.0567 29.6578 38.1958 19.6177 38.1958Z" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20.1627 28.7426L28.8887 20.0165L20.1627 11.2905" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.8917 20.0171H28.3438" stroke="#8117EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>