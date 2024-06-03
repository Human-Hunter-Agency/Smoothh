<?php

/** Template to display 'Sekcja z krokami' - steps_bg */

$header = $args['header'];
$description = $args['description'];
$steps_list = $args['steps_list'];

?>

<div class="w-full py-10 md:py-[70px] mb:pb-20 mt-10 md:mt-20">

    <div class="relative z-0 container">
        <?php if ($header) : ?>
            <div class="mb-12 prose-smoothh prose md:prose-xl prose-h3:text-2xl md:prose-h3:text-5xl lg:prose-h3:text-5xl prose-img:mt-0 prose-img:mx-auto prose-img:px-5 md:prose-p:leading-8">
                <?php echo $header; ?>
            </div>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="prose-smoothh prose md:prose-xl text-center mb-10"><?php echo $description; ?></div>
        <?php endif; ?>
    </div>
    <div class="w-full overflow-hidden">
        <?php if ($steps_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-mobile">
                <div class="swiper-wrapper xl:!gap-9 xl:!transform-none">
                    <?php foreach ($steps_list as $step) : ?>
                        <div class="swiper-slide !h-auto xl:flex-1">
                            <div class="flex flex-col items-center text-center p-3 md:p-6 pb-5 md:pb-10">
                                <?php if ($step['icon'] && $step['icon']['url']) : ?>
                                    <?php echo smoothh_img_responsive($step['icon'], 'object-contain size-16 mb-8 md:mb-[50px]', array(130, 130), 'lazy'); ?>
                                <?php endif; ?>
                                <div class="min-h-[90px] lg:min-h-[110px] font-semibold">
                                    <?php if ($step['title']) : ?>
                                        <h3 class="text-2xl md:text-[32px]"><?php echo $step['title']; ?></h3>
                                    <?php endif; ?>
                                    <?php if ($step['subtitle']) : ?>
                                        <h4 class="text-lg md:text-xl"><?php echo $step['subtitle']; ?></h4>
                                    <?php endif; ?>
                                </div>
                                <?php if ($step['description']) : ?>
                                    <p class="text-sm md:text-base mt-10"><?php echo $step['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>