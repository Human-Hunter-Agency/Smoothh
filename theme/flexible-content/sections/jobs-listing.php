<?php

/** Template to display Job listings */

$header = $args['header'];
$endpoint_url = $args['endpoint'];

?>

<div class="relative py-10 md:py-[70px]">
    <div class="z-[-1] w-[100%] lg:w-[95%] h-full absolute top-0 left-0 bg-gradient-to-r to-[rgba(31,151,212,0.1)] from-[rgba(31,151,212,0)] rounded-[45px]"></div>
    <div class="container">
        <?php if ($header) : ?>
            <div class="container mb-10 md:mb-[50px]">
                <div class="text-center font-bold text-2xl md:text-3xl lg:text-5xl text-foreground">
                    <?php echo $header; ?>
                </div>
            </div>
        <?php
        endif;
        if ($endpoint_url) :
        ?>
            <div data-js-jobs="container" data-js-endpoint="<?php echo $endpoint_url; ?>">
                <div data-js-jobs="categories" class="!hidden p-2 rounded-2xl flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-3">
                </div>
                <form data-js-jobs="searchbar" class="!hidden px-10 py-12 bg-[#F2F2F2] mx-auto max-w-screen-lg rounded-2xl mb-6 flex">
                    <input type="text" class="bg-white h-[55px] w-full pl-3 md:pl-[18px] pr-4 min-w-0 text-base bg-transparent placeholder:text-foreground border border-r-0 border-primary rounded-l-2xl hover:border-secondary outline-1 -outline-offset-2 outline-transparent [outline-style:solid] focus:outline-1 focus:border-secondary focus:outline-secondary transition-all duration-200">
                    <button class="!ml-[-15px] shrink-0 !relative z-10 h-auto !text-base !text-white !font-bold !text-center !rounded-2xl hover:!bg-gradient-to-b !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100 transition-all duration-200 !p-2 !px-5 xl:!px-[50px]"><?php echo __('Search', 'smoothh') ?></button>
                </form>
                <ul data-js-jobs="filters" class="mx-auto max-w-screen-lg px-10 !hidden flex justify-center flex-wrap gap-x-5 gap-y-2.5 mb-10 md:mb-14">
                </ul>
                <ul data-js-jobs="list" class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                </ul>
                <div data-js-jobs="loader" class="w-full px-10 py-20">
                    <span class="mx-auto block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
                </div>
                <div data-js-jobs="empty" class="hidden w-full mx-auto text-center py-20 text-lg md:text-xl font-semibold">
                    <?php echo __('No offers found', 'smoothh') ?>
                </div>
                <button data-js-jobs="load-more" class="!hidden flex mx-auto mt-14 gap-4 items-center rounded-2xl text-base font-bold py-[15px] px-5 md:px-8 text-white bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 disabled:pointer-events-none">
                    <?php echo __('Load more', 'smoothh') ?>
                    <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
                        <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>