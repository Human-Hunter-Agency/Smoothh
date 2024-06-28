<?php

/** Template to display 'Lista Case Studies' - list_case_studies */

$header = $args['header'];

$posts = get_posts(array(
    'post_type'         => 'case-study',
    'numberposts'       => 3,
));

?>

<div class="relative py-10 md:py-0 md:pt-[60px] ">

    <div class="container">
        <div class="relative z-0">
            <?php if ($header) : ?>
            <div class="mx-auto max-w-[960px] text-center !font-bold prose-strong:font-bold prose-strong:text-primary text-2xl md:text-3xl lg:text-[46px] lg:leading-[60px] mb-9 md:mb-[70px]">
                <?php echo $header; ?>
            </div>
            <?php endif; ?>
            <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-5 gap-y-10 sm:gap-x-14 sm:gap-y-14" data-js-case-studies='container'>
                <?php foreach ($posts as $post) : ?>
                    <li class="post-tile">
                        <a href="<?php echo get_permalink($post->ID); ?>">
                            <?php
                            $thumbnail_id = get_post_thumbnail_id($post);
                            if (!$thumbnail_id) {
                                echo '<img src="" />';
                            } else {
                                echo wp_get_attachment_image($thumbnail_id, 'medium', false, array('loading' => 'lazy', 'alt' => $post->post_title));
                            }
                            ?>
                            <div class="title-wrapper">
                                <h3><?php echo $post->post_title; ?></h3>
                            </div>
                            <p><?php echo get_the_excerpt($post->ID); ?></p>
                            <span href="<?php echo get_permalink($post->ID); ?>"><?php esc_html_e('Read more', 'smoothh'); ?><span class="!-ml-4">></span></span>
                        </a>
                    </li>
                <?php
                    endforeach;
                ?>
            </ul>
            <div class="w-full px-10 py-20 hidden" data-js-case-studies="loader">
				<span class="mx-auto block size-10 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
			</div>
			<button data-js-case-studies="load-more" class=" flex mx-auto mt-14 gap-4 items-center text-[20px] font-bold py-[15px] px-5 md:px-8  hover:text-primary disabled:!opacity-20 transition-all duration-200 disabled:pointer-events-none ">
				<?php esc_html_e('More posts', 'smoothh'); ?>
			</button>
        </div>
    </div>
</div>