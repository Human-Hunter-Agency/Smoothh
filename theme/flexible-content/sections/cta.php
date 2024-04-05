<?php
/** Template to display CTA - cta */

    $background = $args['background'];
    if ($background['url']) {
        $bg_url = $background['url'];
    }
    $header = $args['header'];
    $button = $args['button'];

?>

<div class="relative w-full flex flex-col items-center justify-center py-10 md:py-[70px]">

    <?php if (isset($bg_url)) : ?>
        <img src="<?php echo $bg_url; ?>" class="absolute inset-0 -z-20 object-cover !h-full w-full" >
    <?php endif; ?>

    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/70"></div>

    <div class="relative z-0 flex flex-col items-center justify-center container">
        <?php if ($header) : ?>
            <h3 class="text-3xl md:text-5xl text-bold text-white font-bold mb-9" ><?php echo esc_html($header); ?></h1>
        <?php endif; ?>

        <?php if( $button ): 
            $btn_url = $button['url'];
            $btn_title = $button['title'];
            $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="rounded-[14px] text-[13px] font-bold py-2 px-7 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200" ><?php echo esc_html( $btn_title ); ?></a>
        <?php endif; ?>
    </div>

</div>