<?php

/** Template to display 'Sekcja z przesuniętą listą' - one_tile_list */

$header = $args['header'];
$tiles_list = $args['tiles_list'];

?>

<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20">
    <div class="z-[-1] w-[100%] lg:w-[95%] h-full absolute top-8 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>

    <div class="pt-14 relative z-0 container">
        <?php if ($header) : ?>
            <div class="mb-10 xl:mb-20 mx-auto max-w-[900px] text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                <?php echo $header; ?>
            </div>
        <?php endif; ?>
        <?php if ($tiles_list) :
            $tileID = 0;
        ?>
            <div class="py-10 lg:py-20 px-8 lg:px-20 xl:px-36 bg-white rounded-[45px] drop-shadow-2xl">
                <?php foreach ($tiles_list as $tile) :
                ?>
                    <?php if ($tile['text']) : ?>
                        <p class="text-sm md:text-base"><?php echo $tile['description']; ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>