<?php
/** Template to display 'Sekcja z listą ikon' - list_icons */

    $header = $args['header'];
    $list = $args['list'];

?>

<?php if ($header) : ?>
    <div class="container py-10 md:py-[50px]">
        <h2 class="text-center font-bold text-2xl md:text-3xl lg:text-5xl text-primary">
            <?php echo esc_html($header); ?>
        </h2>
    </div>
<?php endif; ?>
<?php if ($list) : ?>
    <div class="relative py-10 md:py-[70px] bg-gradient-to-b from-secondary to-primary">
        <div class="container">
            <div class=" max-w-[920px] mx-auto flex flex-col gap-5 md:gap-10">
                <?php foreach($list as $item) : ?>
                    <div class="flex flex-col md:flex-row md:items-center gap-1.5 md:gap-5">
                        <?php if ($item['icon'] && $item['icon']['url'] ) : ?>
                            <div class="shrink-0">
                                <?php echo smoothh_img_responsive($item['icon'],'object-contain size-16 md:size-24',array(100,100),'lazy'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($item['description']) : ?>
                            <div class="prose-base md:prose-xl text-white prose-strong:font-semibold"><?php echo $item['description']; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>