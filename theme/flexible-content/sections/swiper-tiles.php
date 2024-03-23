<?php
/** Template to display 'Sekcja z kafelkami stron' - tiles_pages */

    $header = $args['header'];
    $description = $args['description'];
    $decoration = $args['decoration'];
    $tiles_list = $args['tiles_list'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">
    
    <?php if ($header) : ?>
        <div class="container">
            <div class="relative z-0">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        </div>
    <?php endif; ?>

    <div class="relative z-0 w-full overflow-hidden !pb-5">
        <?php if ($tiles_list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-default">
                <div class="swiper-wrapper">
                    <?php foreach($tiles_list as $tile) : ?>
                        <div class="swiper-slide !h-auto !flex items-center flex-col border-2 border-[#EFEFEF] rounded-2xl">
                            <?php if ($tile['image'] && $tile['image']['url'] ) : ?>
                                <img src="<?php echo $tile['image']['url']; ?>" class="object-cover w-full h-[120px] md:h-[220px] mb-5 rounded-t-[14px]" >
                            <?php endif; ?>
                            <div class="text-center p-3 md:p-6 !pt-0">
                                <?php if ($tile['title']) : ?>
                                    <h3 class="text-base md:text-xl text-primary mb-9"><?php echo $tile['title']; ?></h3>
                                <?php endif; ?>
                                <?php if ($tile['description']) : ?>
                                    <p class="text-sm md:text-base italic"><?php echo $tile['description']; ?></p>
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
                <div class="swiper-button-prev">
                    <svg width="12" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M-0.00195312 8.99988L11.998 0.33962L11.998 17.6601L-0.00195312 8.99988Z" fill="white"/>
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg width="12" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 9L0 17.6603V0.339746L12 9Z" fill="white"/>
                    </svg>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>