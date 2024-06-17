<?php

/** Template to display 'Sekcja z dwoma kafelkami stron' - two_tiles_pages */

$tiles_list = $args['tiles_list'];

?>

<div class="relative pb-10 pt-20 md:pt-[90px] md:pb-0 mb-20">
    <div class="container">
        <?php if ($tiles_list) : ?>
            <div class="tiles-wrapper flex flex-wrap gap-10">
                <?php foreach ($tiles_list as $tile) : ?>
                    <div class="tile h-[400px] !flex items-center justify-center flex-col xl:!basis-1/2 drop-shadow-lg lg:drop-shadow-2xl rounded-2xl">
                        <?php if ($tile['image'] && $tile['image']['url']) : ?>
                            <div class="w-full relative mb-5 rounded-t-[14px] overflow-hidden">
                                <?php echo smoothh_img_responsive($tile['image'], 'object-cover w-full !h-full', array(360, 220), 'lazy'); ?>
                                <div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>

                                <div class="text-center p-3 md:p-6 !pt-0">
                                    <?php if ($tile['title']) : ?>
                                        <h3 class="text-white text-base md:text-[20px] mb-9 font-semibold"><?php echo $tile['title']; ?></h3>
                                    <?php endif; ?>
                                    <?php if ($tile['description']) : ?>
                                        <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($tile['button']) :
                            $btn_url = $tile['button']['url'];
                            $btn_title = $tile['button']['title'];
                            $btn_target = $tile['button']['target'] ? $tile['button']['target'] : '_self';
                        ?>
                            <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200"><?php echo esc_html($btn_title); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($tiles_list) : ?>
        <div class="+swiper-wrapper">
            <?php foreach ($tiles_list as $tile) : ?>
                <div class="_swiper-slide !h-auto !flex items-center flex-col xl:!basis-1/2 drop-shadow-lg lg:drop-shadow-2xl rounded-2xl">
                    <?php if ($tile['image'] && $tile['image']['url']) : ?>
                        <div class="w-full relative mb-5 rounded-t-[14px] overflow-hidden">
                            <?php echo smoothh_img_responsive($tile['image'], 'object-cover w-full !h-[190px] md:!h-[220px]', array(360, 220), 'lazy'); ?>
                            <div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>

                            <div class="text-center p-3 md:p-6 !pt-0">
                                <?php if ($tile['title']) : ?>
                                    <h3 class="text-base md:text-[20px] mb-9 font-semibold"><?php echo $tile['title']; ?></h3>
                                <?php endif; ?>
                                <?php if ($tile['description']) : ?>
                                    <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($tile['button']) :
                        $btn_url = $tile['button']['url'];
                        $btn_title = $tile['button']['title'];
                        $btn_target = $tile['button']['target'] ? $tile['button']['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="translate-y-1/2 rounded-[14px] text-[13px] font-bold py-2 px-7 text-white bg-primary hover:bg-secondary transition duration-200"><?php echo esc_html($btn_title); ?></a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>