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

                            <?php if ($item['pdf-image']) :
                            ?>
                                <button data-js-popup-toggle="img-popup" data-js-img-url="<?= $item['pdf-image'] ?>" class="ml-auto text-[13px] font-bold py-2 px-7 text-secondary hover:text-primary transition duration-200"><?php echo __('Show', 'smoothh'); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div data-js-popup-container="img-popup" class="popup-container popup-hidden not-prose">
                <div class="popup-inner w-full">
                    <div class="flex justify-end p-1">
                        <button data-js-popup-toggle="img-popup" class="p-1 md:p-2 group">
                            <svg class="fill-black transition duration-200 group-hover:fill-primary" height="18px" width="18px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460.775 460.775" xml:space="preserve">
                                <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55
                        c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55
                        c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505
                        c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55
                        l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719
                        c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z" />
                            </svg>
                        </button>
                    </div>
                    <div class="h-full w-full relative pt-5">
                        <div class="px-10 py-20 flex justify-center items-center absolute inset-0 z-0">
                            <span class="block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
                        </div>
                        <div class="w-full overflow-auto aspect-[1/1.414]">
                            <img src="" class="w-full h-auto relative z-10 object-contain" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>