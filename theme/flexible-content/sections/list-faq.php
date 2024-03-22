<?php
/** Template to display 'Lista pytań / FAQ' - list_faq */

    $header = $args['header'];
    $list = $args['list'];

?>

<div class="relative pb-5 pt-10 md:pt-[60px]">
    <div class="container">
        <?php if ($header) : ?>
            <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                <?php echo esc_html($header); ?>
            </h2>
        <?php 
            endif;
            
            $numItems = count($list);
            $i = 0;
        ?>

            <?php foreach($list as $item) :
                    $question = $item['question'];
                    $answer = $item['answer'];
                ?>
                <?php if ($question && $answer) : ?>
                    <div class="border-2 border-primary rounded-2xl mb-2.5" data-js="dropdown">
                        <div class="group flex justify-between py-5 px-6 cursor-pointer" aria-expanded="<?php if(++$i === $numItems){echo 'true';}else{echo 'false';} ?>" data-js="dropdown-toggle">
                            <h3 class="text-base md:text-[20px] md:leading-5 group-hover:text-primary transition duration-200 font-semibold"><?php echo esc_html($question); ?></h3>
                            <div class="p-1">
                                <svg width="35" height="12" viewBox="0 0 35 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 1C10.5 1 23.5 1 29 1C34.5 1 37 10.5 22.5 10.5C8 10.5 0 10.5 0 10.5" stroke="#8117EE" stroke-width="2"/>
                                </svg>
                            </div>
                        </div>
                        <div class="overflow-hidden h-0 transition-all duration-300" data-js="dropdown-container">
                            <div class="py-5 px-6">
                                <p class="text-sm md:text-base">
                                    <?php echo esc_html($answer); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
    </div>
</div>