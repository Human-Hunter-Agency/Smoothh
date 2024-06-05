<?php

/** Template to display 'Sekcja z licznikami' - counters_bg */

$header = $args['header'];
$tiles_list = $args['tiles_list'];

?>

<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20">
    <div class="z-[-1] w-full h-full absolute left-0 bg-gradient-to-r from-[rgba(129,23,238,0.1)] to-[rgba(129,23,238,0)]"></div>
    <div class="pt-14 relative z-0 container">
        <?php if ($header) : ?>
            <div class="text-3xl md:text-5xl text-bold font-bold mb-9 md:mb-14 text-center"><?php echo $header; ?></div>
        <?php endif; ?>
        <?php if ($tiles_list) :
            $tileID = 0;
        ?>
            <div class="py-10 lg:py-20 px-8 lg:px-36 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:gap-x-[110px] lg:gap-y-[90px] xl:gap-10 2xl:gap-[140px] bg-white rounded-[45px] drop-shadow-2xl">
                <?php foreach ($tiles_list as $tile) :
                    $tileID++;
                ?>
                    <div class="relative flex flex-col items-center text-left <?php if ($tileID == 1 || $tileID == 2) : ?> xl:before:content-[''] xl:before:w-1/2 before:bg-secondary xl:before:h-[2px] before:absolute xl:before:bottom-[-20px] 2xl:before:bottom-[-70px] before:left-0 <?php endif; ?>">
                        <div class="mb-5 md:mb-7 self-start">
                            <?php if ($tile['title']) : ?>
                                <h3 class="text-2xl md:text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-b from-[rgba(31,151,212,1)] to-[rgba(129,23,238,1)]">
                                    <?php echo $tile['title']; ?>
                                    <span id="target<?php echo $tileID ?>" data-counter-target="<?php echo $tile['counter_target']; ?>" class="text-2xl md:text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-b from-[rgba(31,151,212,1)] to-[rgba(129,23,238,1)]"><?php echo $tile['counter_target']; ?></span>
                                    <?php echo $tile['counter_unit']; ?>
                                </h3>
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