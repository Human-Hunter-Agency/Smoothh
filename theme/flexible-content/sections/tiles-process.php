<?php
/** Template to display 'Sekcja z procesem rekrutacji' - tiles_process */

    $header = $args['header'];
    $tiles = $args['tiles'];

?>

<div class="w-full py-10 md:py-[70px] mb:pb-20 text-white bg-gradient-to-b from-primary to-secondary mt-10 md:mt-20">

    <div class="relative z-0 container">
        <?php if ($header) : ?>
            <h2 class="text-3xl md:text-5xl text-bold font-bold mb-10 md:mb-14 text-center" ><?php echo esc_html($header); ?></h1>
        <?php endif; ?>        
    </div>
    <div class="w-full overflow-hidden ">
        <?php if ($tiles) : ?>
            <div class="swiper !container !overflow-visible mx-auto max-w-screen-lg" data-js="swiper-tiles-mobile-narrow">
                <div class="swiper-wrapper xl:gap-16 2xl:!gap-x-[100px] xl:!transform-none xl:!flex-wrap">
                    <?php foreach($tiles as $tile) : ?>
                        <div class="swiper-slide !h-auto xl:flex-1 xl:!basis-[calc(33%-70px)]">
                            <div class="flex flex-col items-center text-center ">
                                <?php if ($tile['icon'] && $tile['icon']['url'] ) : ?>
                                    <img src="<?php echo $tile['icon']['url']; ?>" class="object-contain size-20 md:size-32 xl:size-[170px] mb-8 md:mb-14" >
                                <?php endif; ?>
                                <?php if ($tile['description']) : ?>
                                    <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>