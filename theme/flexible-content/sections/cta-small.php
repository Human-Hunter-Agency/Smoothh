<?php
/** Template to display CTA niskie - cta_small */

    $background = $args['background'];
    if ($background['url']) {
        $bg_url = $background['url'];
    }
    $header = $args['header'];
    $link = $args['link'];

?>

<div class="relative w-full flex flex-col items-center justify-center py-8 md:py-10 mb-10 md:mb-20">

    <?php if (isset($bg_url)) : ?>
        <?php echo smoothh_img_responsive($background,'absolute inset-0 -z-20 object-cover h-full w-full',null,'lazy'); ?>
    <?php endif; ?>

    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/70"></div>

    <div class="relative z-0 flex flex-col items-center justify-center container">
        <?php if ($header) : ?>
            <a href="<?php echo esc_url( $link ); ?>" class="text-center hover:underline decoration-white underline-offset-4">
                <h3 class="inline text-3xl md:text-5xl text-bold text-white font-bold">
                    <?php echo esc_html( $header ); ?>
                </h3>
                <svg class="inline size-6 md:size-[42px] align-bottom" viewBox="0 0 41 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.1419 22.425L16.5919 28.675V24.925L22.2669 21.525L16.5919 17.975V14.425L27.1419 20.8V22.425Z" fill="white"></path>
                    <circle cx="20.5" cy="20.8474" r="20" stroke="white"></circle>
                </svg>
            </a>
        <?php endif; ?>
    </div>

</div>