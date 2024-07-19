<?php

/** Template to display 'Sekcja z kafelkami stron' - tiles_opinions */


$header = $args['header'];
$opinion_list = $args['opinion_list'];
$isSwiper = $args['isSwiper'];

?>

<div class="relative pb-10 pt-20 md:pt-[90px] md:pb-0 mb-20">
    <div class="container">
        <div class="mx-auto relative z-0 max-w-[900px] mb-12 lg:mb-24">
            <?php if ($header) : ?>
                <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden pb-10 lg:!pb-32">
        <?php if ($opinion_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper <?php if (!$isSwiper) :  ?> xl:!transform-none xl:!flex-wrap xl:justify-center xl:gap-y-12 <?php endif; ?>">
                    <?php foreach ($opinion_list as $tile) : ?>
                        <div class="swiper-slide !h-auto !flex items-center flex-col xl:!basis-[calc(33%_-_56px)] bg-white rounded-2xl border border-[#F2F2F2]">
                            <?php if ($tile['image'] && $tile['image']['url']) : ?>
                                <div class="w-full relative mb-5 <?php if (!$isSwiper) :  ?> !mb-0  <?php endif; ?> rounded-t-[14px] overflow-hidden">
                                    <?php echo smoothh_img_responsive($tile['image'], 'object-cover w-full !h-[190px] md:!h-[220px]', array(360, 220), 'lazy'); ?>
                                    <div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
                                </div>
                            <?php endif; ?>
                            <div class="mb-8 text-center px-3 md:px-6 !pt-0">
                                <?php if ($tile['name']) : ?>
                                    <h3 class="bg-secondary rounded-[14px] p-2 -translate-y-1/2 text-base md:text-xl text-white mb-4 font-semibold"><?php echo $tile['name']; ?></h3>
                                <?php endif; ?>
                                <?php if ($tile['description']) : ?>
                                    <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-nav w-28  h-20 hidden lg:flex gap-5 !absolute !top-auto !bottom-[-100px] left-[50%] -translate-x-1/2 <?php if (!$isSwiper) :  ?> xl:hidden <?php endif; ?>">
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