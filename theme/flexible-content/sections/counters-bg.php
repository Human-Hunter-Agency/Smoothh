<?php

/** Template to display 'Sekcja z licznikami' - counters_bg */

$header = $args['header'];
$tiles_list = $args['tiles_list'];
$blueBg = $args['blueBg'];

?>

<div class="relative w-full py-10 pb-20 md:pt-11 mt-10 mb-20">
    <?php if ($blueBg) : ?>
        <div class="z-[-1] w-[100%] lg:w-[97%] h-full absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <?php else : ?>
        <div class="z-[-1] w-full h-full absolute left-0 bg-gradient-to-r from-[rgba(129,23,238,0.1)] to-[rgba(129,23,238,0)]"></div>
    <?php endif; ?>

    <div class="relative z-0 container">
        <?php if ($header) : ?>
            <div class="mb-10 xl:mb-20 mx-auto max-w-[900px] text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
                <?php echo $header; ?>
            </div>
        <?php endif; ?>
        <?php if ($tiles_list) :
            $tileID = 0;
        ?>
            <div class="py-10 lg:py-20 px-8 lg:px-20 xl:px-36 grid grid-cols-1 gap-x-10 gap-y-10 sm:grid-cols-2 lg:gap-x-[110px] lg:gap-y-[90px] bg-white rounded-[45px] drop-shadow-2xl">
                <?php foreach ($tiles_list as $tile) :
                    $tileID++;
                ?>
                    <div class="relative flex flex-col items-center text-left <?php if ($tileID == 1 || $tileID == 2) : ?> lg:before:content-[''] lg:before:w-1/2 before:bg-secondary lg:before:h-[2px] before:absolute lg:before:bottom-[-45px] before:left-0 <?php endif; ?>">
                        <div class="mb-5 md:mb-7 self-start">
                            <?php if ($tile['title']) : ?>
                                <h3 class="text-2xl lg:text-3xl xl:text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-b from-[rgba(31,151,212,1)] to-[rgba(129,23,238,1)]">
                                    <?php echo $tile['title']; ?>
                                    <span id="target<?php echo $tileID ?>" data-counter-target<?php echo $tileID ?>="<?php echo $tile['counter_target']; ?>" data-counter-qty class="text-2xl lg:text-3xl xl:text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-b from-[rgba(31,151,212,1)] to-[rgba(129,23,238,1)]"><?php echo $tile['counter_target']; ?></span>
                                    <?php echo $tile['counter_unit']; ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                        <?php if ($tile['description']) : ?>
                            <p class="text-sm md:text-base leading-[26px]"><?php echo $tile['description']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>