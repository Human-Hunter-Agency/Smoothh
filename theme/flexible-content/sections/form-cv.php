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
        <div class="!max-w-[1410px] mx-auto [&_.wpcf7-response-output]:!border-none <?php if ($hide_message_field) {
                                                echo '[&_.message-container]:hidden';
                                            } ?>">
            <div class="form-cv-wrapper relative">
                <?php echo do_shortcode('[contact-form-7 id="841318a" title="CV"]'); ?>
                <div class="form-confirmation pointer-events-none opacity-0 z-10 absolute inset-0 flex flex-col items-center justify-center transition duration-300 text-white">
                    <svg class="max-w-full mb-4" width="125" height="125" viewBox="0 0 125 125" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="62.5" cy="62.5" r="60.5" stroke="#ffffff" stroke-width="4"></circle>
                        <path d="M38.5713 62.5L54.2856 77.8571L85.7141 47.1428" stroke="#ffffff" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <h4 class="text-center text-lg md:text-[20px] max-w-96 font-bold mb-5"><?php esc_html_e( 'Thank you for sending your message', 'smoothh' ); ?></h4>
                    <p class="text-center text-base max-w-96 mb-10 md:mb-16"><?php esc_html_e( 'Our experts are already verifying your message, we will get back to you soon with the information you need', 'smoothh' ); ?></p>
                    <button data-js-form-reset="form-cv-wrapper" class="w-full max-w-[520px] border-none !bg-white hover:!bg-primary hover:!text-white transition-all duration-200 !text-foreground h-[55px] !px-5 xl:!px-12 !rounded-[15px] font-semibold !flex items-center justify-center">
                        <?php esc_html_e( 'Go back to form', 'smoothh' ); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>