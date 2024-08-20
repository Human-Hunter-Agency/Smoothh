<?php

/** Template to display 'Lista zrealizowane projekty' - list_done_projects */

$section_ID = $args['section_ID'];
$header = $args['header'];
$done_projects = $args['done_projects'];
?>

<div id="<?php if ($section_ID) : echo $section_ID;
            endif; ?>" class="relative pb-10 pt-24 md:pt-28">

    <div class="container">
        <div class="relative z-0" x-data="{open:false}">
            <?php if ($header) : ?>
                <div class="mx-auto max-w-[960px] text-center !font-bold prose-strong:font-bold prose-strong:text-primary text-2xl md:text-3xl lg:text-[46px] lg:leading-[60px] mb-9 md:mb-[70px]">
                    <?php echo $header; ?>
                </div>
            <?php endif; ?>
            <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-14 sm:gap-y-14">
                <?php if ($done_projects) : ?>
					<?php $i = 0; ?>
                    <?php foreach ($done_projects as $project) : ?>
                        <li class="_post-tile" <?php if($i>5): ?>x-show="open" x-cloak x-transition<?php endif; ?>>
                            <div class="group h-full flex items-center flex-col bg-white rounded-[14px] shadow-2xl">
                                <div class="relative flex items-center justify-center rounded-t-[14px] overflow-hidden w-full !h-[140px]">
                                    <div class="z-0 absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
                                    <h4 class="p-6 z-[1] relative text-center text-[30px] leading-[35px] text-white font-bold"><?php echo $project['title']; ?></h4>
                                </div>

                                <div class="py-6 text-center text-[20px]">
                                    <p class="font-semibold mb-1"><?php echo esc_html_e('Success fee: ', 'smoothh'); ?><span class="text-primary font-normal"><?php echo $project['retainer_fee']; ?></span></p>
                                    <p class="font-semibold mb-1"><?php echo esc_html_e('Realization time: ', 'smoothh'); ?><span class="text-primary font-normal"><?php echo $project['realization_time']; ?></span></p>
                                    <p class="font-semibold"><?php echo esc_html_e('Location: ', 'smoothh'); ?><span class="text-primary font-normal"><?php echo $project['location']; ?></span></p>
                                </div>
                            </div>
                        </li>
						<?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <button @click="open=!open" x-show="!open" x-transition class="flex mx-auto mt-14 gap-4 items-center text-[20px] font-bold py-[15px] px-5 md:px-8  hover:text-primary disabled:!opacity-20 transition-all duration-200 disabled:pointer-events-none ">
                <?php esc_html_e('More posts', 'smoothh'); ?>
            </button>
        </div>
    </div>
</div>
