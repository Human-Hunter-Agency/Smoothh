<?php
/** Template to display 'Swiper z kafelkami case studies' - swiper_tiles_case_studies */

    $header = $args['header'];
    $posts = $args['tiles_list'];

?>

<div class="relative py-10 md:py-[60px] mb:pb-[60px]">
    
    <?php if ($header) : ?>
        <div class="container">
            <div class="relative z-0">
                <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                    <?php echo esc_html($header); ?>
                </h2>
            </div>
        </div>
    <?php endif; 
    
    get_template_part( 'flexible-content/sections/partials/case-studies-swiper', '', array($posts) );
    ?>
    
</div>