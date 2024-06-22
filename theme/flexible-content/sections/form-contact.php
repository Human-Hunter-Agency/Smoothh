<?php

/** Template to display 'Formularz kontakt' - form_contact */

$header = $args['header'];
$bgColor = $args['bgColor'];

?>


<div class="relative w-full py-10 pb-5 md:pt-[70px] mt-10 mb-20">
    <?php if ($bgColor == 'Różowy') : ?>
        <div class="z-[-1] w-[100%] lg:w-[70%] h-[80%] absolute top-0 left-0 bg-gradient-to-r from-[rgba(129,23,238,0)] to-[rgba(129,23,238,0.102)] rounded-[45px]"></div>
    <?php endif; ?>

    <?php if ($bgColor == 'Niebieski') : ?>
        <div class="z-[-1] w-[100%] lg:w-[70%] h-[80%] absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <?php endif; ?>


    <div class="pt-14 relative z-0 container flex flex-col lg:flex-row basis">

        <div class="basis-[55%] mb-10 xl:mb-20 mx-auto text-2xl md:text-[46px] font-bold lg:font-extrabold lg:leading-[55px]">
            <div class="max-w-[580px]">
                <?php if ($header) : ?>
                    <?php echo $header; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="basis-[45%] py-10 lg:py-[60px] px-8 lg:px-10 bg-white rounded-[45px] drop-shadow-2xl text-sm md:text-base lg:-translate-y-[60px]">
            <?php echo do_shortcode('[contact-form-7 id="f3dc97a" title="Kontakt"]'); ?>
        </div>
    </div>
</div>



<div class="container mt-[50px] mb-10">
    <?php if ($header) : ?>
        <h3 class="text-3xl md:text-5xl text-bold font-bold mb-10 md:mb-14 text-center"><?php echo esc_html($header); ?></h3>
    <?php endif; ?>
    <div class="!max-w-[1040px] mx-auto">
        <?php echo do_shortcode('[contact-form-7 id="f3dc97a" title="Kontakt"]'); ?>
    </div>
</div>