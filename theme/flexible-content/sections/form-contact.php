<?php
/** Template to display 'Formularz kontakt' - form_contact */

    $header = $args['header'];
    $header = $args['header'];

?>

<div class="container mt-[50px] mb-10">    
    <?php if ($header) : ?>
        <h3 class="text-3xl md:text-5xl text-bold font-bold mb-10 md:mb-14 text-center" ><?php echo esc_html($header); ?></h3>
    <?php endif; ?>        
    <div class="!max-w-[1040px] mx-auto">
        <?php echo do_shortcode('[contact-form-7 id="f3dc97a" title="Kontakt"]'); ?>
    </div>

</div>
