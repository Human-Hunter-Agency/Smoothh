<?php
/** Template to display 'Formularz CV' - form_cv */

    $header = $args['header'];
    $description = $args['description'];

?>

<div class="w-full py-10 md:py-[70px] mb:pb-20 text-white bg-gradient-to-b from-secondary to-primary">
    <div class="container">
        <?php if ($header) : ?>
            <h2 class="text-3xl md:text-5xl text-bold font-bold mb-9 text-center" ><?php echo esc_html($header); ?></h1>
        <?php endif; ?>        
        <?php if ($description) : ?>
            <div class="prose-smoothh prose md:prose-xl text-white text-center mb-10" ><?php echo $description; ?></div>
        <?php endif; ?>
        <div class="!max-w-[1410px] mx-auto">
            <?php echo do_shortcode('[contact-form-7 id="841318a" title="CV"]'); ?>
        </div>
    </div>
</div>