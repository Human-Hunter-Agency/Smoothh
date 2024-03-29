<?php
/** Template to display 'Sekcja z kafelkami numerowana' - tiles_numbered */

    $header = $args['header'];
    $tiles_list = $args['tiles_list'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[50px] bg-gradient-to-b from-secondary to-primary text-white">
    
    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo esc_html($header); ?>
                </h2>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($tiles_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-mobile-narrow">
                <div class="swiper-wrapper xl:!transform-none xl:flex-wrap xl:!gap-x-0 xl:gap-y-14 xl:justify-center">
                    <?php 
                    $i = 0;
                    foreach($tiles_list as $tile) : 
                        $i++
                        ?>
                        <div class="swiper-slide xl:grow-0 !flex items-center flex-col text-center xl:m-0 xl:p-2.5 xl:basis-1/5">
                            <div class="border-2 border-[#EFEFEF] rounded-2xl text-2xl md:text-3xl text-center flex items-center justify-center size-14 md:size-[72px] mb-6 ">
                                <?php echo $i; ?>
                            </div>
                            <?php if ($tile['title']) : ?>
                                <h3 class="text-base md:text-xl mb-5"><?php echo esc_html($tile['title']); ?></h3>
                            <?php endif; ?>
                            <?php if ($tile['description']) : ?>
                                <p class="text-sm md:text-base"><?php echo esc_html($tile['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>