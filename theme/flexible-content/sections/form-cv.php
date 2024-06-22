<?php

/** Template to display 'Formularz CV' - form_cv */

$header = $args['header'];
$description = $args['description'];
$hide_message_field = $args['hide_message_field'];

?>

<div class="w-full py-10 md:py-[70px] mb:pb-20 text-white bg-gradient-to-b from-secondary to-primary">
    <div class="container">
        <?php if ($header) : ?>
            <h2 class="mx-auto max-w-[900px] text-3xl md:text-5xl font-semibold mb-9 text-center leading-[45px]"><?php echo esc_html($header); ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="prose-smoothh prose md:prose-xl text-white text-center mb-10 prose-h2:!text-white prose-h2:font-bold prose-h2:text-3xl prose-h2:md:text-5xl prose-h2:mb-9"><?php echo $description; ?></div>
        <?php endif; ?>
        <div class="!max-w-[1410px] mx-auto <?php if ($hide_message_field) {
                                                echo '[&_.message-container]:hidden';
                                            } ?>">
            <?php echo do_shortcode('[contact-form-7 id="841318a" title="CV"]'); ?>
        </div>
    </div>
</div>