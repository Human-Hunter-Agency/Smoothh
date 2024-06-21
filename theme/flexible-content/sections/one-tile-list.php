<?php

/** Template to display 'Sekcja z przesuniętą kafelką listy' - one_tile_list */

$header = $args['header'];
$description = $args['description'];
$bgColor = $args['bgColor'];
$descriptionTile = $args['descriptionTile'];
$isDescriptionTile = $args['isDescriptionTile'];
$tiles_list = $args['tiles_list'];

?>

<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20">
    <?php print_r($bgColor) ?>
    <?php if ($bgColor == 'Różowy') : ?>
        <div class="z-[-1] w-[100%] lg:w-[70%] h-[80%] absolute top-0 left-0 bg-gradient-to-r from-[rgba(129,23,238,0)] to-[rgba(129,23,238,0.102)] rounded-[45px]"></div>
    <?php endif; ?>

    <?php if ($bgColor == 'Niebieski') : ?>
        <div class="z-[-1] w-[100%] lg:w-[70%] h-[80%] absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <?php endif; ?>


    <div class="pt-14 relative z-0 container flex flex-col lg:flex-row basis">

        <div class="basis-[55%] mb-10 xl:mb-20 mx-auto text-2xl md:text-4xl font-bold lg:font-extrabold lg:leading-[45px]">
            <div class="max-w-[550px]">
                <?php if ($header) : ?>
                    <?php echo $header; ?>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="mt-10 text-[16px] font-normal leading-[26px]">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($tiles_list && !$isDescriptionTile) : ?>
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

        <?php elseif ($descriptionTile && $isDescriptionTile) :  ?>
            <div class="basis-[45%] py-10 lg:py-10 px-8 lg:px-10 bg-white rounded-[45px] drop-shadow-2xl text-sm md:text-base [&_.circled]:bg-primary  [&_.circled]:inline-flex [&_.circled]:items-center [&_.circled]:justify-center [&_.circled]:font-bold [&_.circled]:text-[30px] [&_.circled]:text-white [&_.circled]:size-20 [&_.circled]:rounded-xl [&_.circled]:my-4 [&_.circled]:whitespace-nowrap">
                <?php echo $descriptionTile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>