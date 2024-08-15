<?php

/** Template to display 'Lista kategorii produktów' - products_category */

$header = $args['header'];
$categories = $args['categories'];

?>

<div class="relative">
    <div class="container mb-10">
        <?php if ($header) : ?>
            <div class="mx-auto max-w-[1100px] text-center font-bold text-2xl md:text-3xl lg:text-[46px] lg:leading-[55px] mb-9">
                <?php echo $header; ?>
            </div>
        <?php endif; ?>

        <?php
			if( $categories ): ?>
				<ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-10 sm:gap-y-14 xl:gap-[90px]">
				<?php foreach( $categories as $term ): ?>
					<li>
						<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="group h-full flex items-center flex-col bg-white rounded-[14px] shadow-2xl">
                            <div class="relative flex items-center justify-center rounded-t-[14px] overflow-hidden w-full !h-[140px] [&_img]:object-cover [&_img]:w-full [&_img]:h-full">
                                <div class="z-0 absolute inset-0 bg-gradient-to-b from-secondary to-primary mix-blend-multiply opacity-90"></div>
                                <h4 class="p-6 z-[1] relative text-center text-lg md:text-[28px] text-white font-semibold">
									<?php echo $term->name ; ?>
                                </h4>
                            </div>
                            <div class="w-full flex-1 p-3 md:p-6 flex flex-col justify-between">
                                <p class="text-center text-sm md:text-base prose-strong:font-semibold">
									<?php echo $term->description ; ?>
                                </p>
                                <span class="block w-[220px] mt-6 mx-auto rounded-[14px] text-[16px] text-center font-bold py-3 px-7 text-white bg-secondary group-hover:bg-primary transition duration-200">
                                    <?php esc_html_e('Show products', 'smoothh') ?>
                                </span>
                            </div>
                        </a>
					</li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
    </div>
</div>
