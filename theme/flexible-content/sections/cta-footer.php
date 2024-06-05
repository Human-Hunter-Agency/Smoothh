<?php

/** Template to display CTA Footer - cta_footer */

$header = $args['header'];
$button = $args['button'];

?>

<div class="container mx-auto h-[165px] relative">
    <div class="container h-[165px] mx-auto w-full absolute top-20 left-0 right-0 px-4 md:px-8 lg:px-24 py-8 md:py-14 flex flex-row gap-2 md:gap- items-center justify-between drop-shadow-2xl rounded-3xl bg-gradient-to-b from-secondary to-primary">
        <?php if ($header) : ?>
            <h3 class="mb-0 text-xl sm:text-2xl md:text-3xl lg:text-5xl text-bold text-white font-bold text-center"><?php echo esc_html($header); ?></h1>
            <?php endif; ?>

            <?php if ($button) :
                $btn_url = $button['url'];
                $btn_title = $button['title'];
                $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
                <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="rounded-3xl text-lg md:text-xl font-semibold md:font-bold py-2 px-5 md:px-12 border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200"><?php echo esc_html($btn_title); ?></a>
            <?php endif; ?>
    </div>

</div>