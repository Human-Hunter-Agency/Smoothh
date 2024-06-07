<?php

/** Template to display 'Swiper z logami klientów' - swiper_customer_logos */

$header = $args['header'];
$description = $args['description'];
$client_logos = get_field('client_logos', 'option');

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">

    <div class="container">
        <div class="relative mx-auto max-w-[1140px] z-0">
            <?php if ($header) : ?>
                <div class="mb-10 text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="mb-12 text-[16px] font-normal leading-[26px]">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($client_logos) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-logos">
                <div class="swiper-wrapper items-center">
                    <?php foreach ($client_logos as $logo) : ?>
                        <div class="swiper-slide mr-5 md:px-5 opacity-0 !transition duration-500 [&.swiper-slide-visible]:opacity-100">
                            <?php echo smoothh_img_responsive($logo, 'object-contain max-h-28', array(300, 112), 'lazy'); ?>
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