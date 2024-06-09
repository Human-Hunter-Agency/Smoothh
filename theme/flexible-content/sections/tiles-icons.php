<?php

/** Template to display 'Sekcja z ikonami' - tiles_icons */

$header = $args['header'];
$description = $args['description'];
$tiles_list = $args['tiles_list'];
$grid = $args['grid'];
$text_below = $args['text_below'];
$button = $args['button'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">

    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
                <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="text-[16px] font-normal leading-[26px]">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($tiles_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper xl:!transform-none 
                    <?php if ($grid == 3) : ?> xl:px-[100px] xl:box-border xl:flex-wrap xl:!gap-x-[49px] xl:!gap-y-20 xl:justify-center xl:[&_.swiper-slide]:basis-[calc(28%_-_33px)] 
                    <?php elseif ($grid == 5) : ?> xl:flex-wrap xl:!gap-y-[60px] xl:!gap-x-10 xl:justify-center xl:[&_.swiper-slide]:basis-[calc(20%_-_48px)]  
                    <?php endif; ?>">

                    <?php foreach ($tiles_list as $tile) : ?>
                        <div class="swiper-slide xl:flex-1 !flex items-center flex-col text-center">
                            <?php if ($tile['icon'] && $tile['icon']['url']) : ?>
                                <div class="w-full
                                    <?php if ($grid == 3) : ?> px-4 py-8  md:py-12 md:px-6 lg:py-[77px] mb-8 md:mb-14 border-2 border-[#EFEFEF] rounded-2xl
                                    <?php elseif ($grid == 5) : ?> p-4 md:p-6 mb-9
                                    <?php else : ?> p-4 md:p-6 mb-5  
                                    <?php endif; ?>">
                                    <?php echo smoothh_img_responsive($tile['icon'], 'mx-auto object-contain h-16', array(125, 125), 'lazy'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($tile['title']) : ?>
                                <h3 class="text-base md:text-[20px] mb-6 lg:min-h-14 px-5 font-bold"><?php echo esc_html($tile['title']); ?></h3>
                            <?php endif; ?>
                            <?php if ($tile['description']) : ?>
                                <div class="prose-smooth prose-strong:font-semibold <?php if (!$tile['title']) : ?> prose-base md:prose-xl leading-[24px]<?php else : ?> prose-sm md:prose-base <?php endif; ?>"><?php echo $tile['description']; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($text_below || $button) : ?>
        <div class="container text-center mt-10 flex flex-col items-center">
            <?php if ($text_below) : ?>
                <div class="prose-smooth prose-base md:prose-xl mb-10"><?php echo $text_below; ?></div>
            <?php endif; ?>

            <?php if ($button) :
                $btn_url = $button['url'];
                $btn_title = $button['title'];
                $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
                <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="flex gap-4 items-center rounded-2xl text-base font-bold py-[15px] px-5 md:px-8 text-white bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200">
                    <?php echo esc_html($btn_title); ?>
                    <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle class="stroke-white" cx="9.5" cy="9.5" r="9" />
                        <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>