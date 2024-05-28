<?php
/** Template to display 'Sekcja z kafelkami stron' - tiles_pages */

    $header = $args['header'];
    $description = $args['description'];
    $decoration = $args['decoration'];
    $titles_primary = $args['titles_primary'];
    $tiles_list = $args['tiles_list'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">
    <?php if ($decoration) : ?>        
        <div class="absolute right-7 top-7 -z-10 opacity-5 max-w-[90px] lg:max-w-[180px]">
            <?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/img/decor.svg' ); ?>
        </div>
    <?php endif; ?>
    
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
                <div class="swiper-wrapper xl:!gap-y-20 xl:!gap-x-[90px] xl:!flex-wrap xl:justify-center xl:!transform-none">
                    <?php foreach($tiles_list as $tile) : ?>
                        <div class="swiper-slide !h-auto !flex items-center flex-col xl:!basis-[calc(33%_-_56px)] border-2 border-[#EFEFEF] rounded-2xl">
                            <?php if ($tile['image'] && $tile['image']['url'] ) : ?>
                                <div class="w-full relative mb-5 rounded-t-[14px] overflow-hidden">
                                    <?php echo smoothh_img_responsive($tile['image'],'object-cover w-full !h-[190px] md:!h-[220px]'); ?>
                                    <div class="absolute inset-0 bg-gradient-to-b from-primary/20 to-secondary/20"></div>
                                </div>
                            <?php endif; ?>
                            <div class="text-center p-3 md:p-6 !pt-0">
                                <?php if ($tile['title']) : ?>
                                    <h3 class="text-base md:text-xl mb-9 font-semibold <?php if ($titles_primary) : ?> text-primary <?php endif; ?>"><?php echo $tile['title']; ?></h3>
                                <?php endif; ?>
                                <?php if ($tile['description']) : ?>
                                    <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if( $tile['button'] ): 
                                $btn_url = $tile['button']['url'];
                                $btn_title = $tile['button']['title'];
                                $btn_target = $tile['button']['target'] ? $tile['button']['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200" ><?php echo esc_html( $btn_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>