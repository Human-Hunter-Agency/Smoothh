<?php

/** Template to display Job listings */

$section_ID = $args['section_ID'];
$header = $args['header'];
$endpoint_url = $args['endpoint'];
$offers_limit = $args['offers_limit'];

?>

<div id="<?php if ($section_ID) : echo $section_ID;
            endif; ?>" class="relative pt-24 md:pt-28 mb-10">
    <div class="z-[-1] w-[100%] lg:w-[95%] h-full absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <div class="container pb-6">
        <?php if ($header) : ?>
            <div class="container mb-10 md:mb-[50px]">
                <div class="text-center font-extrabold text-2xl md:text-3xl lg:text-[46px] text-foreground">
                    <?php echo $header; ?>
                </div>
            </div>
        <?php
        endif;
        if ($endpoint_url) :
        ?>
            <div data-js-jobs="container" data-js-endpoint="<?php echo $endpoint_url; ?>" data-js-limit="<?php echo $offers_limit ?>">
                <div data-js-jobs="categories" class="!hidden p-2 rounded-2xl flex items-center justify-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-3">
                </div>
                <form data-js-jobs="searchbar" class="!hidden px-10 py-12 bg-white mx-auto max-w-screen-lg rounded-t-2xl flex">
                    <input type="text" placeholder="<?php echo __('Key word', 'smoothh') ?>" class="bg-white h-[55px] w-full pl-3 md:pl-[18px] pr-4 min-w-0 text-base bg-transparent placeholder:text-foreground border border-r-0 border-primary rounded-l-2xl hover:border-secondary outline-1 -outline-offset-2 outline-transparent [outline-style:solid] focus:outline-1 focus:border-secondary focus:outline-secondary transition-all duration-200">
                    <button class="!ml-[-15px] shrink-0 !relative z-10 h-auto !text-base !text-white !font-bold !text-center !rounded-tr-2xl !rounded-br-2xl hover:!bg-gradient-to-b !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100 transition-all duration-200 !p-2 !px-5 xl:!px-[50px]"><?php echo __('Search', 'smoothh') ?></button>
                </form>
                <ul data-js-jobs="filters" class="mx-auto max-w-screen-lg p-4 pb-10 lg:p-10 bg-white !hidden flex flex-wrap justify-center gap-x-5 gap-y-2.5 mb-10 md:mb-14 rounded-b-2xl">
                </ul>
                <ul data-js-jobs="list" class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                </ul>
                <div data-js-jobs="loader" class="w-full px-10 py-20">
                    <span class="mx-auto block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
                </div>
                <div data-js-jobs="empty" class="hidden w-full mx-auto text-center py-20 text-lg md:text-xl font-semibold">
                    <?php echo __('No offers found', 'smoothh') ?>
                </div>
                <button data-js-jobs="load-more" class="!hidden flex mx-auto mt-14 gap-4 items-center  text-base font-bold py-[15px] px-5 md:px-8 hover:text-primary disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 disabled:pointer-events-none">
                    <?php echo __('Load more', 'smoothh') ?>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>
