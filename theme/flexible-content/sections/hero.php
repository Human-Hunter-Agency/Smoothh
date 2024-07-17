<?php

/** Template to display 'Baner' - hero */

$hero_background = $args['hero_background'];
if ($hero_background['url']) {
    $hero_bg_url = $hero_background['url'];
}
$lowerHeight = $args['lowerHeight'];
$display_logo = $args['display_logo'];
$hero_text = $args['hero_text'];
$marquee_active = $args['display_marquee'];
$marquee_text = $args['marquee_text'];
?>

<?php if (!(is_account_page() && !is_user_logged_in())) : ?>
    <div class="relative w-full h-[300px] md:h-[600px] <?php if ($lowerHeight) : ?> md:!h-[400px] <?php endif; ?> flex flex-col items-center justify-center">
        <?php if (function_exists('yoast_breadcrumb') && !is_front_page()) : ?>
            <div class="breadcrumbs-container absolute top-0 inset-x-0">
                <?php yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-banner">', '</div>'); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($hero_bg_url)) :
            echo smoothh_img_responsive($hero_background, 'absolute inset-0 -z-20 object-cover !h-full w-full', array(1800, 600), 'eager');
        endif; ?>

        <div class="absolute inset-0 -z-10 bg-gradient-to-b from-secondary to-primary opacity-80"></div>

        <div class="relative z-0 flex flex-col items-center justify-center container">
            <?php if ($display_logo && is_front_page()) : ?>
                <div class="md:max-w-[620px]">
                    <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/logo-white.svg'); ?>
                </div>
            <?php elseif ($display_logo && !is_front_page()) : ?>
                <span class="text-5xl md:text-[66px] text-white font-bold leading-tight">SMOOTHH®</span>
            <?php endif; ?>

            <?php if ($hero_text) : ?>
                <h1 class="<?php if ($display_logo) : ?>text-3xl md:text-[46px]<?php else : ?>text-5xl md:text-[46px] max-w-[580px] [.woocommerce-cart_&]:max-w-[880px] md:leading-[55px]<?php endif; ?> text-bold text-white font-bold text-center"><?php echo $hero_text; ?></h1>
            <?php endif; ?>
        </div>

    </div>
    <?php if ($marquee_active && $marquee_text) : ?>
        <div>
            <div class="swiper bg-primary !py-2" data-js="swiper-hero-marquee">
                <div class="swiper-wrapper !ease-linear">
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <div class="swiper-slide !flex items-center pr-7 !w-auto">
                            <span class="text-base md:text-[22px] font-bold text-nowrap text-white pr-7"><?php echo $marquee_text; ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                <path d="M15.5861 11.2717L10.1001 14.5217V12.5717L13.0511 10.8037L10.1001 8.95772V7.11171L15.5861 10.4267V11.2717Z" fill="white" />
                                <circle cx="12.5" cy="12" r="11.5" stroke="white" />
                            </svg>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>