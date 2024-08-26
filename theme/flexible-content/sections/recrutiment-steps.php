<?php

/** Template to display 'Sekcja z procesem rekrutacji 2' - recrutiment_steps */

$header = $args['header'];
$list = $args['list'];

?>

<div class="relative w-full mt-10 md:mt-20 mb-20 py-14 xl:pt-16 xl:pb-32">
    <div class="z-[-1] w-full lg:w-[85%] 2xl:w-[88%] h-full absolute top-0 right-0 bg-gradient-to-l to-[rgba(129,23,238,0)] from-[rgba(129,23,238,0.102)]"></div>

    <div class="relative z-0 container">
        <?php if ($header) : ?>
            <div class="mb-10 xl:mb-20 mx-auto max-w-[900px] text-2xl md:text-4xl lg:text-[46px] font-extrabold lg:leading-[55px]"><?php echo $header; ?></div>
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
                        <div class="swiper-slide !h-auto _xl:flex-1 xl:!basis-1/4 px-3 md:px-5 mx-auto pr-4 xl-pr-auto last:!px-0">
                            <div class="flex flex-col items-center text-center ">


                                <?php if ($i == $listLength) :
                                    $lastNumberIcon = `
                                    <svg xmlns="http://www.w3.org/2000/svg" width="81" height="80" viewBox="0 0 81 80" fill="none">
                                    <path d="M0 40C0 17.9086 17.9086 0 40 0H41C63.0914 0 81 17.9086 81 40C81 62.0914 63.0914 80 41 80H40C17.9086 80 0 62.0914 0 40Z" fill="url(#paint0_linear_505_6513)"/>
                                    <path d="M41.6832 39.3112H41.6783C44.7874 42.0542 45.8014 43.9177 45.8014 46.8724C45.8014 49.6129 44.7052 51.875 42.2936 54.1595C41.1227 55.308 40.3952 56.905 40.3952 58.6738C40.3952 62.1667 43.2254 64.9968 46.7182 64.9968C50.2086 64.9968 53.0412 62.1667 53.0412 58.6738C53.0412 56.905 52.3112 55.308 51.1403 54.1595C48.7287 51.875 47.6325 49.6129 47.6325 46.8724C47.6325 43.9177 48.6465 42.0542 51.7557 39.3112C53.5569 37.8463 54.7079 35.6116 54.7079 33.1103C54.7079 28.6957 51.1304 25.1206 46.7182 25.1206C42.3061 25.1206 38.7285 28.6957 38.7285 33.1103C38.7285 35.6116 39.882 37.8463 41.6832 39.3112Z" fill="white"/>
                                    <path d="M39.3157 40.689H39.3207C36.2115 37.9461 35.1975 36.0826 35.1975 33.1278C35.1975 30.3874 36.2937 28.1253 38.7053 25.8407C39.8762 24.6922 40.6037 23.0953 40.6037 21.3264C40.6037 17.8336 37.7736 15.0034 34.2807 15.0034C30.7904 15.0034 27.9577 17.8336 27.9577 21.3264C27.9577 23.0953 28.6877 24.6922 29.8586 25.8407C32.2702 28.1253 33.3664 30.3874 33.3664 33.1278C33.3664 36.0826 32.3524 37.9461 29.2432 40.689C27.442 42.1539 26.291 44.3887 26.291 46.8899C26.291 51.3046 29.8686 54.8796 34.2807 54.8796C38.6929 54.8796 42.2704 51.3046 42.2704 46.8899C42.2704 44.3887 41.1169 42.1539 39.3157 40.689Z" fill="white"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_505_6513" x1="20.25" y1="20" x2="20.25" y2="20" gradientUnits="userSpaceOnUse">
                                    <stop offset="1" stop-color="#8117EE"/>
                                    <stop stop-color="#1F97D4"/>
                                    </linearGradient>
                                    </defs>
                                    </svg>
                                    `
                                ?>
                                    <div class="m-8 flex items-center justify-center size-[72px] rounded-full bg-gradient-to-b from-secondary to-primary z-[1] text-white text-[32px] font-semibold">
                                        <p class="mt-[-4px]"><?php echo $i == '4' ?  $i : '<svg class="mt-[5px]" xmlns="http://www.w3.org/2000/svg" width="81" height="80" viewBox="0 0 81 80" fill="none">
                                    <path d="M41.6832 39.3112H41.6783C44.7874 42.0542 45.8014 43.9177 45.8014 46.8724C45.8014 49.6129 44.7052 51.875 42.2936 54.1595C41.1227 55.308 40.3952 56.905 40.3952 58.6738C40.3952 62.1667 43.2254 64.9968 46.7182 64.9968C50.2086 64.9968 53.0412 62.1667 53.0412 58.6738C53.0412 56.905 52.3112 55.308 51.1403 54.1595C48.7287 51.875 47.6325 49.6129 47.6325 46.8724C47.6325 43.9177 48.6465 42.0542 51.7557 39.3112C53.5569 37.8463 54.7079 35.6116 54.7079 33.1103C54.7079 28.6957 51.1304 25.1206 46.7182 25.1206C42.3061 25.1206 38.7285 28.6957 38.7285 33.1103C38.7285 35.6116 39.882 37.8463 41.6832 39.3112Z" fill="white"/>
                                    <path d="M39.3157 40.689H39.3207C36.2115 37.9461 35.1975 36.0826 35.1975 33.1278C35.1975 30.3874 36.2937 28.1253 38.7053 25.8407C39.8762 24.6922 40.6037 23.0953 40.6037 21.3264C40.6037 17.8336 37.7736 15.0034 34.2807 15.0034C30.7904 15.0034 27.9577 17.8336 27.9577 21.3264C27.9577 23.0953 28.6877 24.6922 29.8586 25.8407C32.2702 28.1253 33.3664 30.3874 33.3664 33.1278C33.3664 36.0826 32.3524 37.9461 29.2432 40.689C27.442 42.1539 26.291 44.3887 26.291 46.8899C26.291 51.3046 29.8686 54.8796 34.2807 54.8796C38.6929 54.8796 42.2704 51.3046 42.2704 46.8899C42.2704 44.3887 41.1169 42.1539 39.3157 40.689Z" fill="white"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_505_6513" x1="20.25" y1="20" x2="20.25" y2="20" gradientUnits="userSpaceOnUse">
                                    <stop offset="1" stop-color="#8117EE"/>
                                    <stop stop-color="#1F97D4"/>
                                    </linearGradient>
                                    </defs>
                                    </svg>' ?></p>
                                    </div>


									<div class="w-1/2 h-[2px] border-t-[2px] border-solid border-t-primary absolute top-[67px] left-[-36px] z-[-1] <?php if ($i == $listLength && $i%2 != 0): ?>xl:hidden<?php endif; ?>"></div>


                                    <?php if ($item['description']) : ?>
                                        <div class="prose prose-sm md:prose-base"><?php echo $item['description']; ?></div>
                                    <?php endif; ?>
                                <?php else : ?>

                                    <div class="m-8 bg-white flex items-center justify-center size-[72px] rounded-full border-[2px] border-primary z-[1] text-[32px] text-primary font-semibold">
                                        <p class="<?php echo ($i == 3) ? 'mt-[-7px]' : 'mt-[-4px]'; ?>"><?php echo $i; ?></p>
                                    </div>

                                    <?php if ($i == 1) : ?>
                                        <div class="1 w-1/2 xl:w-[52%] h-[2px] border-primary border-t-[2px] border-t-primary absolute top-[67px] right-0 xl:right-[-40px] z-[-1]"></div>
                                    <?php endif; ?>

                                    <?php if ($i == 5 || $i == 9 && $i !== 4 && $i !== 8) : ?>
                                        <div class="5i9 w-[100%] xl:w-[52%] h-[2px] border-primary border-t-[2px] border-t-primary absolute top-[67px] right-0 xl:right-[-40px] z-[-1]"></div>
                                    <?php elseif ($i !== 1 && $i !== 4 && $i !== 8) : ?>
                                        <div class="w-[calc(100%_+_25px)] xl:w-full h-[2px] border-primary border-t-[2px] border-t-primary absolute top-[67px] right-0 xl:right-[35px] z-[-1]"></div>
                                    <?php endif; ?>

                                    <?php if ($i == 4 || $i == 8) : ?>
                                        <div class="4i8 w-[120%] xl:w-[65%] h-[2px] border-primary border-t-[2px] border-t-primary absolute top-[67px] -right-5 xl:right-[190px] z-[-1]"></div>
                                    <?php endif; ?>

                                    <?php if ($item['description']) : ?>
                                        <div class="text-[16px] leading-6"><?php echo $item['description']; ?></div>
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
