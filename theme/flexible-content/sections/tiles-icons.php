<?php

/** Template to display 'Sekcja z ikonami' - tiles_icons */

$section_ID = $args['section_ID'];
$blueBg = $args['blueBg'];
$header = $args['header'];
$description = $args['description'];
$tiles_list = $args['tiles_list'];
$text_below = $args['text_below'];
$button = $args['button'];
$gridStyle = $args['gridStyle'];
$tighten = $args['tighten_on_mobile'];
?>

<div id="<?php if ($section_ID) : echo $section_ID;
            endif; ?>" class="relative  pt-24  md:pt-28 ">
	<?php if ($blueBg && $section_ID === 'jak_pracujemy') : ?>
        <div class="z-[-1] w-[100%] lg:w-[97%] h-[150%] absolute top-0 left-0 bg-gradient-to-l to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-r-[45px]"></div>
    <?php endif; ?>
    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
                <div class="mx-auto max-w-[940px] mb-10 lg:mb-7 text-2xl md:text-4xl lg:text-[46px] font-extrabold lg:leading-[55px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="m-8 !mt-0 mx-auto max-w-[900px] text-[16px] font-normal leading-[26px]">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden pb-10 md:pb-10 mb:pb-[100px]">
	<?php if ($blueBg && $section_ID !== 'jak_pracujemy') : ?>
        <div class="z-[-1] w-[100%] lg:w-[97%] h-[150%] absolute top-0 left-0 bg-gradient-to-l to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-r-[45px]"></div>
    <?php endif; ?>
        <?php if ($tiles_list) : ?>
            <div class="swiper lg:mt-8 !container !overflow-visible" <?php if ($tighten) : ?> data-js="swiper-tiles-icons-tight" <?php else : ?> data-js="swiper-tiles-icons" <?php endif; ?>>
                <div class="swiper-wrapper
                    <?php if ($gridStyle == '4 Kolumny') : ?> xl:!transform-none xl:box-border xl:flex-wrap xl:!gap-x-[10px] xl:!gap-y-9 xl:justify-center xl:[&_.swiper-slide]:basis-[calc(25%_-_50px)]
                    <?php endif; ?>

                    <?php if ($gridStyle == '3 Kolumny') : ?> xl:!transform-none xl:px-[20px] xl:box-border xl:flex-wrap xl:!gap-x-[10px] xl:!gap-y-0 xl:justify-center xl:[&_.swiper-slide]:basis-[calc(32%_-_50px)]
                    <?php endif; ?>

                    <?php if ($gridStyle == 'Swiper') : ?>
                    <?php endif; ?>
                    ">

                    <?php foreach ($tiles_list as $tile) : ?>
                        <div class="swiper-slide !flex items-center flex-col text-center">
                            <?php if ($tile['icon'] && $tile['icon']['url']) : ?>
                                <div class="w-full p-4 md:p-6 mb-2">
                                    <?php echo smoothh_img_responsive($tile['icon'], 'mx-auto object-contain h-16', array(125, 125), 'lazy'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($tile['title']) : ?>
                                <h4 class="text-[20px] mb-6 lg:min-h-10 px-5 lg:px-0 font-bold leading-[24px]"><?php echo $tile['title']; ?></h4>
                            <?php endif; ?>
                            <?php if ($tile['description']) : ?>
                                <div class="prose-smooth prose-strong:font-bold <?php if (!$tile['description']) : ?> prose-base md:prose-lg <?php else : ?> !leading-6 <?php endif; ?> "><?php echo $tile['description']; ?></div>
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
                <div class="prose-smooth prose-base"><?php echo $text_below; ?></div>
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
