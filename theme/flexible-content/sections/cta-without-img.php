<?php

/** Template to display CTA bez zdjęcia - cta_without_img */

$header = $args['header'];
$button = $args['button'];

?>

<div class="container mx-auto">
    <div class="py-10 md:py-16 relative flex flex-row items-center justify-between  drop-shadow-2xl rounded-xl bg-gradient-to-b from-secondary to-primary">
        <?php if ($header) : ?>
            <h3 class="text-3xl md:text-5xl text-bold text-white font-bold text-center"><?php echo esc_html($header); ?></h1>
            <?php endif; ?>

            <?php if ($button) :
                $btn_url = $button['url'];
                $btn_title = $button['title'];
                $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
                <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="rounded-[14px] text-xl font-bold py-2 px-5 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200"><?php echo esc_html($btn_title); ?></a>
            <?php endif; ?>
    </div>

</div>