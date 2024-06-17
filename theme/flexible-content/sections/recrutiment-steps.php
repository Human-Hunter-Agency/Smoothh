<?php

/** Template to display 'Sekcja z procesem rekrutacji 2' - recrutiment_steps */

$header = $args['header'];
$list = $args['list'];

?>

<div class="w-fullemt-10 md:mt-20 mb-20">

    <div class="relative z-0 container">
        <?php if ($header) : ?>
            <div class="prose-h3:text-3xl prose-h3:md:text-5xl prose-h3:font-bold mb-20 md:mb-24"><?php echo $header; ?></div>
        <?php endif; ?>
    </div>
    <div class="w-full overflow-hidden ">
        <?php if ($list) : ?>
            <div class="swiper !container !overflow-visible" data-js="swiper-tiles-mobile-narrow">
                <div class="swiper-wrapper xl:!transform-none xl:!flex-wrap">
                    <?php
                    $i = 0;
                    $listLength = count($list);
                    foreach ($list as $item) :
                        $i++
                    ?>
                        <div class="swiper-slide !h-auto xl:flex-1 xl:!basis-1/5 px-3 md:px-5 !mr-0 pr-4 xl-pr-auto last:!px-0">
                            <div class="flex flex-col items-center text-center ">
                                <?php if ($i == $listLength) : ?>

                                    <div class="flex items-center justify-center size-[72px] rounded-full border-2 border-primary bg-primary z-[1] text-white text-[32px] font-semibold"><?php echo $i; ?></div>
                                    <div class="<?php echo $i == 1 ? 'w-1/2 ' : 'w-[99.2%] '; ?> <?php echo $i == 6 ? 'w-full xl:w-1/2 ' : ''; ?> h-[2px] border-t-[1px] border-solid border-t-[#8117EE50] absolute top-[10%] lg:top-[12%] xl:top-[15%] <?php echo $i == 5 ? '!w-full xl:!w-1/2 right-0 xl:right-auto xl:left-0' : 'right-0'; ?> z-[-1]"></div>

                                    <?php if ($item['description']) : ?>
                                        <div class="prose prose-sm md:prose-base"><?php echo $item['description']; ?></div>
                                    <?php endif; ?>

                                <?php else : ?>

                                    <div class="flex items-center justify-center size-[72px] rounded-full border-2 border-primary bg-white z-[1] text-[32px] font-semibold">
                                        <p><?php echo $i; ?>
                                        <p>
                                    </div>
                                    <div class="<?php echo $i == 1 ? 'w-1/2 ' : 'w-[99.2%] '; ?> <?php echo $i == 6 ? 'w-full xl:w-1/2 ' : ''; ?> h-[3px] border-t-[3px] border border-t-primary absolute top-[10%] lg:top-[12%] xl:top-[15%] <?php echo $i == 5 ? '!w-full xl:!w-1/2 right-0 xl:right-auto xl:left-0' : 'right-0'; ?> z-[-1]"></div>

                                    <?php if ($item['description']) : ?>
                                        <div class="prose prose-sm md:prose-base"><?php echo $item['description']; ?></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>