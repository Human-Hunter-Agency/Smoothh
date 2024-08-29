<?php

/** Template to display 'Swiper z logami opinii' - swiper_opinions_logos */

$header = $args['header'];
$description = $args['description'];
$logos = $args['logos'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">

    <div class="container">
        <div class="relative mx-auto max-w-[1140px] z-0">
            <?php if ($header) : ?>
                <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-extrabold lg:leading-[55px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="mb-12 mx-auto max-w-[800px] text-[16px] font-normal leading-[26px]">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($logos) : ?>
            <div class="swiper !container !overflow-visible [&:not(.slider-active)_>_div]:justify-center" data-js="swiper-logos">
                <div class="swiper-wrapper items-center">
                    <?php foreach ($logos as $logo) : ?>
                        <div class="swiper-slide mr-5 md:px-5 opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
                            <?php if ($logo['link']) : ?>
                                <a href="<?= $logo['link'] ?>" target="_blank">
                            <?php endif; ?>
                                    <?php echo smoothh_img_responsive($logo['image'], 'object-contain max-h-28', array(300, 112), 'lazy'); ?>
                            <?php if ($logo['link']) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev">
                    <svg width="12" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M-0.00195312 8.99988L11.998 0.33962L11.998 17.6601L-0.00195312 8.99988Z" fill="white" />
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg width="12" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 9L0 17.6603V0.339746L12 9Z" fill="white" />
                    </svg>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>