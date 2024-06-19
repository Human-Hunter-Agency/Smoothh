<?php

/** Template to display 'Sekcja z przesuniętą kafelką listy' - one_tile_list */

$header = $args['header'];
$description = $args['description'];
$descriptionTile = $args['descriptionTile'];
$tiles_list = $args['tiles_list'];

?>

<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20">
    <div class="z-[-1] w-[100%] lg:w-[75%] h-[70%] absolute top-8 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>

    <div class="pt-14 relative z-0 container flex flex-col lg:flex-row basis">

        <div class="basis-[55%] mb-10 xl:mb-20 mx-auto text-2xl md:text-4xl font-bold lg:font-extrabold lg:leading-[45px]">
            <div class="max-w-[550px]">
                <?php if ($header) : ?>
                    <?php echo $header; ?>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="text-[16px] font-normal leading-[26px]">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <?php if ($tiles_list) : ?>
            <div class="basis-[45%] py-10 lg:py-10 px-8 lg:px-10 bg-white rounded-[45px] drop-shadow-2xl">
                <?php foreach ($tiles_list as $tile) :
                ?>
                    <?php if ($tile['text']) : ?>
                        <div class="mb-8 flex gap-2 items-baseline">
                            <div class="min-w-[10px] min-h-[10px] bg-primary rounded-full"></div>
                            <p class="text-sm md:text-base"><?php echo $tile['text']; ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        <?php elseif ($description) :  ?>
            <div class="basis-[45%] py-10 lg:py-10 px-8 lg:px-10 bg-white rounded-[45px] drop-shadow-2xl">
                <p class="text-sm md:text-base"><?php echo $description; ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>