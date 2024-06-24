<?php

/** Template to display 'Sekcja z mapą' - map */

$search_text = $args['search_text'];
$display_info = $args['display_info'];
$brand_location = get_field('brand_location', 'option');
$brand_contact = get_field('brand_contact', 'option');

?>

<div class="mb-10 -mt-[60px] w-full flex flex-col-reverse lg:flex-row items-center">
    <div class="grow w-full relative border border-[#317FA8]">
        <iframe class="relative z-0 !w-full h-[418px]" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=558&amp;hl=en&amp;q=<?php echo esc_html($search_text) ?>&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        <div class="absolute z-10 pointer-events-none inset-0 bg-gradient-to-b from-primary/10 to-secondary/10"></div>
    </div>
    <?php if ($display_info) : ?>
        <div class="w-full container lg:p-10 lg:pl-20 lg:w-1/2 shrink-0 flex flex-col justify-center gap-5 md:gap-10 mb-10 lg:mb-0 ">
            <div class="max-w-full">
                <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/logo.svg'); ?>
            </div>
            <div class="grow-0 text-base md:text-xl md:leading-8">
                <?php echo $brand_location; ?>
            </div>
            <div class="grow-0 text-base md:text-xl md:leading-8 prose-strong:!font-normal [&_a]:text-foreground hover:[&_a]:text-primary [&_a]:transition [&_a]:duration-200">
                <?php echo $brand_contact; ?>
            </div>
        </div>
    <?php endif; ?>
</div>