<?php
/** Template to display 'Sekcja z licznikami' - counters_bg */

    $header = $args['header'];
    $tiles_list = $args['tiles_list'];

?>

<div class="w-full py-10 pb-5 md:pt-[70px] text-white bg-gradient-to-b from-primary to-secondary mt-10 md:mt-20">

    <div class="relative z-0 container">
        <?php if ($header) : ?>
            <h2 class="text-3xl md:text-5xl text-bold font-bold mb-9 md:mb-14 text-center" ><?php echo esc_html($header); ?></h1>
        <?php endif; ?>        
        <?php if ($tiles_list) : ?>
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 xl:grid-cols-4 lg:gap-x-[110px] lg:gap-y-[90px] xl:gap-10 2xl:gap-[140px]">
                <?php foreach($tiles_list as $tile) : ?>
                    <div class="flex flex-col items-center text-center">
                        <?php if ($tile['icon'] && $tile['icon']['url'] ) : ?>
                            <?php echo smoothh_img_responsive($tile['icon'],'object-contain size-24 xl:size-[125px] mb-5',array(125,125),'lazy'); ?>
                        <?php endif; ?>
                        <div class="mb-5 md:mb-7">
                            <?php if ($tile['tagline']) : ?>
                                <span class="text-lg md:text-xl"><?php echo $tile['tagline']; ?></span>
                            <?php endif; ?>
                            <?php if ($tile['title']) : ?>
                                <h3 class="text-2xl md:text-[32px] font-bold"><?php echo $tile['title']; ?></h3>
                            <?php endif; ?> 
                        </div>
                        <?php if ($tile['description']) : ?>
                            <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>