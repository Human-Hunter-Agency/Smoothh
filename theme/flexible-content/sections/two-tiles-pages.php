<?php

/** Template to display 'Sekcja z dwoma kafelkami stron' - two_tiles_pages */

$tiles_list = $args['tiles_list'];

?>

<div class="relative pb-10 pt-20 md:pt-[90px] md:pb-0 mb-20">
    <div class="container">
        <?php if ($tiles_list) : ?>
            <div class="tiles-wrapper flex gap-10">
                <?php foreach ($tiles_list as $tile) : ?>
                    <div class="tile group relative h-[340px] !flex items-center justify-center flex-col xl:!basis-1/2 drop-shadow-lg lg:drop-shadow-2xl rounded-2xl">
                        <?php if ($tile['image'] && $tile['image']['url']) : ?>
                            <div class="w-full h-full rounded-[14px] overflow-hidden absolute top-0 left-0 z-[-1] group-hover:opacity-0 transition duration-300">
                                <?php echo smoothh_img_responsive($tile['image'], 'object-cover w-full !h-full', array(360, 220), 'lazy'); ?>
                                <div class="absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90 group-hover:!opacity-0 transition duration-300"></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($tile['title']) : ?>
                            <h3 class="max-w-[330px] text-center text-white text-base md:text-[20px] font-semibold group-hover:hidden"><?php echo $tile['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($tile['description']) : ?>
                            <div class="max-w-[330px] text-center text-sm md:text-base hidden group-hover:!block transition duration-300"><?php echo $tile['description']; ?></div>
                        <?php endif; ?>

                        <?php if ($tile['button']) :
                            $btn_url = $tile['button']['url'];
                            $btn_title = $tile['button']['title'];
                            $btn_target = $tile['button']['target'] ? $tile['button']['target'] : '_self';
                        ?>
                            <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="whitespace-nowrap border-none !bg-gradient-to-t from-primary via-secondary to-secondary bg-size-200 hover:bg-[length:400px_400px] bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  !text-white h-[42px] !px-5 xl:!px-12 !rounded-[10px] font-medium items-center justify-center mt-8 transition-all duration-300 hidden group-hover:!flex"><?php echo esc_html($btn_title); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>