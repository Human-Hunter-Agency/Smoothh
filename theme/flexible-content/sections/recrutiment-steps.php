<?php

/** Template to display 'Sekcja z procesem rekrutacji 2' - recrutiment_steps */

$header = $args['header'];
$list = $args['list'];

?>

<div class="relative w-full mt-10 md:mt-20 mb-20 py-14 xl:py-24">
    <div class="z-[-1] lg:w-[85%] 2xl:w-[88%] h-full absolute top-0 right-0 bg-gradient-to-l to-[rgba(129,23,238,0)] from-[rgba(129,23,238,0.102)]"></div>

    <div class="relative z-0 container">
        <?php if ($header) : ?>
            <div class="mb-10 xl:mb-20 mx-auto max-w-[900px] text-2xl md:text-4xl lg:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]"><?php echo $header; ?></div>
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

                                    <div class="m-8 flex items-center justify-center size-[72px] rounded-full bg-gradient-to-b from-secondary to-primary z-[1] text-white text-[32px] font-semibold">
                                        <p class="mt-[-4px]"><?php echo $i; ?></p>
                                    </div>

                                    <div class="w-1/2 h-[2px] border-t-[2px] border-solid border-t-primary absolute top-[67px] left-[-36px] z-[-1]"></div>

                                    <?php if ($item['description']) : ?>
                                        <div class="prose prose-sm md:prose-base"><?php echo $item['description']; ?></div>
                                    <?php endif; ?>

                                <?php else : ?>

                                    <div class="m-8 bg-white flex items-center justify-center size-[72px] rounded-full border-[2px] border-primary z-[1] text-[32px] text-primary font-semibold">
                                        <p class="<?php echo ($i == 3) ? 'mt-[-8px]' : 'mt-[-4px]'; ?>"><?php echo $i; ?></p>
                                    </div>

                                    <?php if ($i == 1) : ?>
                                        <div class="1 w-[52%] h-[2px] border-primary border-t-[2px] border-t-primary absolute top-[67px] right-[-40px] z-[-1]"></div>
                                    <?php else : ?>
                                        <div class="else w-full h-[2px] border-primary border-t-[2px] border-t-primary absolute top-[67px] right-[35px] z-[-1]"></div>
                                    <?php endif; ?>

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