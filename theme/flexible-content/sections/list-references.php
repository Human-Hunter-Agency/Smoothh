<?php

/** Template to display 'Lista referencji' - list_references */

$list = $args['list'];

?>

<?php if ($list) : ?>
    <div class="container mb-10 md:mb-20">
        <div class="flex flex-col gap-5 md:gap-10 lg:gap-10">
            <?php foreach ($list as $item) : ?>
                <div class="flex flex-col md:flex-row border-2 border-[#B8B8B8] rounded-[16px] hover:shadow-2xl hover:border-white transition duration-200">
                    <?php if ($item['logo']) : ?>

                        <div class="shrink-0 flex items-center justify-center border-0 border-b-2 md:border-b-0 border-[#B8B8B8] md:w-[200px] lg:w-[250px] xl:w-[400px] p-5 lg:p-10 xl:px-[70px]">
                            <?php echo smoothh_img_responsive($item['logo'], 'object-contain w-full max-h-20 md:max-h-44', null, 'lazy'); ?>
                        </div>

                    <?php endif; ?>
                    <div class="flex flex-col justify-between min-h-64 p-7 md:px-10">
                        <div>
                            <?php if ($item['name']) : ?>
                                <h4 class="mb-5 text-[20px] font-semibold text-primary"><?php echo esc_attr($item['name']); ?></h4>
                            <?php endif; ?>

                            <?php if ($item['review']) : ?>
                                <p class="text-base md:leading-[26px] italic mb-5"><?php echo esc_attr($item['review']); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex flex-col gap-5 md:flex-row justify-between md:items-center">

                            <div>
                                <?php if ($item['author']) : ?>
                                    <p class="text-base font-bold mb-2"><?php echo esc_attr($item['author']); ?></p>
                                <?php endif; ?>

                                <?php if ($item['author_position']) : ?>
                                    <p class="text-base"><?php echo esc_attr($item['author_position']); ?></p>
                                <?php endif; ?>

                            </div>

                            <?php if ($item['button']) :
                                $btn_url = $item['button']['url'];
                                $btn_title = $item['button']['title'];
                                $btn_target = $item['button']['target'] ? $item['button']['target'] : '_self';
                            ?>
                                <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target); ?>" class="ml-auto text-[13px] font-bold py-2 px-7 text-secondary hover:text-primary transition duration-200"><?php echo esc_html($btn_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>