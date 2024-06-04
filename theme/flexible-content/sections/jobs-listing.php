<?php

/** Template to display Job listings */

$header = $args['header'];
$endpoint_url = $args['endpoint'];

?>

<div class="relative py-10 md:py-[70px]">
    <div class="container">
        <?php if ($header) : ?>
            <div class="container mb-10 md:mb-[50px]">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl text-foreground">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        <?php 
            endif;
            if ($endpoint_url):
         ?>
        <div data-js-jobs="container" data-js-endpoint="<?php echo $endpoint_url; ?>">
            <div data-js-jobs="categories" class="!hidden p-2 rounded-2xl bg-[#F2F2F2] flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-3">
            </div>
            <div data-js-jobs="searchbar" class="!hidden p-2 bg-[#F2F2F2] mx-auto max-w-screen-lg rounded-2xl mb-7">
                <input type="text">
                <button><?php echo __('Search', 'smoothh')?></button>
            </div>
            <ul data-js-jobs="filters" class="!hidden flex justify-center flex-wrap gap-x-5 gap-y-2.5 mb-10">
            </ul>
            <ul data-js-jobs="list" class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            </ul>
            <div data-js-jobs="loader" class="w-full px-10 py-20">
                <span class="mx-auto block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
            </div>
            <div data-js-jobs="empty" class="hidden w-full mx-auto text-center py-20 text-lg md:text-xl">
                <?php echo __('No offers found', 'smoothh')?>
            </div>
            <button data-js-jobs="load-more" class="!hidden"><?php echo __('Load more', 'smoothh')?></button>
        </div>
        <?php endif; ?>
    </div>
</div>