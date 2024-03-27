<?php

/** Template to display 'Sekcja z mapą' - map */

$search_text = $args['search_text'];

?>

<div class="w-full mx-auto max-w-[1920px]">
    <div class="w-full relative">
        <iframe class="relative z-0 !w-full h-[400px] md:h-[558px]" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=558&amp;hl=en&amp;q=<?php echo esc_html($search_text) ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        <div class="absolute z-10 pointer-events-none inset-0 bg-gradient-to-b from-primary/10 to-secondary/10"></div>
    </div>
</div>