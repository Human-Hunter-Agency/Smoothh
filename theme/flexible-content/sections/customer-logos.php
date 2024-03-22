<?php
/** Template to display 'Sekcja z logami klientów' - customer_logos */

    $header = $args['header'];
    $description = $args['description'];
    $client_logos = get_field('client_logos', 'option');

?>

<div class="relative py-10 md:py-20">
    <div class="container">
        <?php if ($header) : ?>
            <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl mb-9 md:mb-14">
                <?php echo esc_html($header); ?>
            </h2>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="prose-smoothh prose md:prose-xl text-center mb-10 md:mb-14" ><?php echo $description; ?></div>
        <?php endif; ?>
        <div class="flex flex-wrap gap-5 lg:gap-16 xl:gap-[68px] justify-center items-center">
            <?php foreach($client_logos as $logo) : ?>
                <img class="object-contain grayscale w-[76px] md:w-36 xl:w-[188px]" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" alt="<?php echo $logo['title']; ?>" />
            <?php endforeach; ?>
        </div>
    </div>
</div>