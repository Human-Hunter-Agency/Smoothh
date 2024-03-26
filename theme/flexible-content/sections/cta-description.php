<?php
/** Template to display CTA z opisem - cta_description */

$header = $args['header'];
$description = $args['description'];
$button = $args['button'];

?>

<div class="relative w-full flex flex-col items-center justify-center py-10 md:py-[70px]">

    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary to-secondary"></div>

    <div class="relative z-0 flex flex-col items-center justify-center container">
        <?php if ($header) : ?>
            <h3 class="text-3xl md:text-5xl text-bold text-white font-bold mb-9 text-center" ><?php echo esc_html($header); ?></h1>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="prose-smoothh prose md:prose-xl text-white text-center mb-10" ><?php echo $description; ?></div>
        <?php endif; ?>
        <?php if( $button ): 
            $btn_url = $button['url'];
            $btn_title = $button['title'];
            $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class=" group flex gap-4 items-center rounded-2xl text-base font-bold py-[15px] px-5 md:px-8  text-primary bg-white hover:text-secondary transition duration-200" >
                <?php echo esc_html( $btn_title ); ?>
                <svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle class="stroke-primary group-hover:stroke-secondary transition duration-200" cx="9.5" cy="9.5" r="9"/>
                    <path class="fill-primary group-hover:fill-secondary transition duration-200" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"/>
                </svg>
            </a>
        <?php endif; ?>
    </div>

</div>