<?php
/** Template to display 'Sekcja z ikonami' - tiles_icons */

    $header = $args['header'];
    $description = $args['description'];
    $tiles_list = $args['tiles_list'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">
    
    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo esc_html($header); ?>
                </h2>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="prose-smoothh prose md:prose-xl text-center mb-10" ><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($tiles_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-mobile">
                <div class="swiper-wrapper xl:!gap-[60px] xl:!transform-none">
                    <?php foreach($tiles_list as $tile) : ?>
                        <div class="swiper-slide xl:flex-1 !flex items-center flex-col text-center">
                            <?php if ($tile['icon'] && $tile['icon']['url'] ) : ?>
                                <div class="w-full p-4 md:p-6 border-2 border-[#EFEFEF] rounded-2xl mb-5">
                                    <img src="<?php echo $tile['icon']['url']; ?>" class="mx-auto object-contain size-16 md:size-24 xl:size-[125px]" >
                                </div>
                            <?php endif; ?>
                            <?php if ($tile['title']) : ?>
                                <h3 class="text-base md:text-xl text-primary mb-2.5 min-h-14 px-5"><?php echo esc_html($tile['title']); ?></h3>
                            <?php endif; ?>
                            <?php if ($tile['description']) : ?>
                                <div class="prose-smooth prose-sm md:prose-base"><?php echo $tile['description']; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>