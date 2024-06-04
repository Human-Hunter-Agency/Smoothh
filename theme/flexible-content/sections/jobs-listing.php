<?php

/** Template to display Job listings */

$header = $args['header'];
$endpoint_url = $args['endpoint'];

?>

<div class="relative py-10 md:py-[70px]">
    <div class="container">
        <?php if ($header) : ?>
            <div class="container mb-10 md:mb-[50px]">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl text-white">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        <?php 
            endif;
            if ($endpoint_url):
         ?>
        <div data-js-jobs="container" data-js-endpoint="<?php echo $endpoint_url; ?>">
            <div data-js-jobs="categories" class="!hidden">
            </div>
            <div data-js-jobs="searchbar" class="!hidden">
                <div>
                    <input type="text">
                    <button><?php echo __('Search', 'smoothh')?></button>
                </div>    
            </div>
            <ul data-js-jobs="filters" class="!hidden flex flex-wrap gap-x-5 gap-y-2.5">
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