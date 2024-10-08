<?php

/** Template to display 'Sekcja z krokami' - steps_bg */

$header = $args['header'];
$description = $args['description'];
$steps_list = $args['steps_list'];

?>

<div class="w-full py-10 md:py-[70px] mb:pb-20 relative">
	<div class="z-[-1] lg:w-[85%] 2xl:w-[88%] lg:h-[calc(100%_-_80px)] absolute top-0 right-0 bg-gradient-to-l to-[rgba(129,23,238,0)] from-[rgba(129,23,238,0.102)]"></div>
    <div class="relative z-0 container mb-10 lg:mb-20">
        <?php if ($header) : ?>
            <div class="mb-6 text-2xl md:text-4xl lg:text-[46px] font-extrabold lg:leading-[55px]">
                <?php echo $header; ?>
            </div>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="text-[16px] font-normal leading-[26px]">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="w-full overflow-hidden lg:pb-20">
        <?php if ($steps_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper xl:!transform-none">
                    <?php foreach ($steps_list as $step) : ?>
                        <div class="swiper-slide !h-auto xl:flex-1">
                            <div class="flex flex-col items-center text-center pb-5 md:pb-10">
                                <?php if ($step['icon'] && $step['icon']['url']) : ?>
                                    <?php echo smoothh_img_responsive($step['icon'], 'object-contain h-16 mb-8 md:mb-[50px]', array(130, 130), 'lazy'); ?>
                                <?php endif; ?>
                                <div class="min-h-[90px] lg:min-h-[110px] font-bold">
                                    <?php if ($step['title']) : ?>
                                        <h3 class="text-lg md:text-[20px] leading-[24px]"><?php echo $step['title']; ?></h3>
                                    <?php endif; ?>
                                    <?php if ($step['subtitle']) : ?>
                                        <h4 class="text-lg md:text-[20px] leading-[24px]"><?php echo $step['subtitle']; ?></h4>
                                    <?php endif; ?>
                                </div>
                                <?php if ($step['description']) : ?>
                                    <div class="text-sm md:text-base !leading-[26px]"><?php echo $step['description']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
