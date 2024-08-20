<?php

/** Template to display 'Lista pytań / FAQ' - list_faq */

$section_ID = $args['section_ID'];
$header = $args['header'];
$list = $args['list'];

?>

<div id="<?php if ($section_ID) : echo $section_ID;
            endif; ?>" class="relative pb-5 pt-24 md:pt-28">
    <div class="container !max-w-[1410px]">
        <?php if ($header) : ?>
            <div class="mx-auto max-w-[800px] text-center font-extrabold text-2xl md:text-3xl lg:text-[46px] lg:leading-[60px] mb-9 md:mb-14">
                <?php echo $header; ?>
            </div>
        <?php
        endif;

        $numItems = count($list);
        $i = 0;
        ?>

        <?php foreach ($list as $item) :
            $question = $item['question'];
            $answer = $item['answer'];
        ?>
            <?php if ($question && $answer) : ?>
                <div class="border-2 border-primary rounded-2xl mb-2.5" data-js="dropdown" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <div class="group flex justify-between items-center py-5 px-6 cursor-pointer" aria-expanded="<?php if (++$i === $numItems) {
                                                                                                                        echo 'true';
                                                                                                                    } else {
                                                                                                                        echo 'false';
                                                                                                                    } ?>" data-js="dropdown-toggle">
                        <h3 class="text-base md:text-[20px] md:leading-5 group-hover:text-primary transition duration-200 font-semibold" itemprop="name"><?php echo $question; ?></h3>
                        <div class="p-1 relative">
                            <svg class="group-aria-expanded:rotate-180 transition duration-300" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line y1="10.0015" x2="20" y2="10.0015" stroke="#8117EE" stroke-width="2" />
                            </svg>
                            <svg class="absolute inset-1 group-aria-expanded:rotate-90 transition duration-300" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="10" y1="19.2002" x2="10" stroke="#8117EE" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="overflow-hidden h-0 transition-all duration-300" data-js="dropdown-container">
                        <div class="pb-5 px-6" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p class="text-sm md:text-base" itemprop="text">
                                <?php echo $answer; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
