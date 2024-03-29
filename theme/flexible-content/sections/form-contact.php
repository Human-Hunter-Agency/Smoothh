<?php
/** Template to display 'Formularz kontakt' - form_contact */

    $header = $args['header'];
    $header = $args['header'];
    $display_info = $args['display_info'];
    $brand_location = get_field('brand_location', 'option');
    $brand_contact = get_field('brand_contact', 'option');

?>

<div class="container mt-[50px]">
    <?php if ($display_info) : ?>
        <div class="flex flex-col md:flex-row md:items-center justify-center gap-5 md:gap-10 lg:gap-[60px] mb-10 md:mb-20">
            <div class="[&_svg]:w-[350px] max-w-full">
				<?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/img/logo.svg' ); ?>
            </div>
            <div class="grow-0 text-base md:text-xl md:leading-8">
                <?php echo $brand_location; ?>
            </div>
            <div class="grow-0 text-base md:text-xl md:leading-8 prose-strong:!font-normal [&_a]:text-foreground hover:[&_a]:text-primary [&_a]:transition [&_a]:duration-200">
                <?php echo $brand_contact; ?>
            </div>
        </div>
    <?php endif; ?>        
    <?php if ($header) : ?>
        <h3 class="text-3xl md:text-5xl text-bold font-bold mb-10 md:mb-14 text-center" ><?php echo esc_html($header); ?></h1>
    <?php endif; ?>        
    <div class="!max-w-[1040px] mx-auto">
        <?php echo do_shortcode('[contact-form-7 id="f3dc97a" title="Kontakt"]'); ?>
    </div>

</div>
