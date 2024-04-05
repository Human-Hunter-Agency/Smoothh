<?php

/** Template to display 'Lista produktów' - list_products */

?>


<div class="container">
    <ul>
        <?php
        $args = array(
            'post_type'      => 'product',
        );

        $loop = new WP_Query($args);

        while ($loop->have_posts()) : $loop->the_post();
            global $product;

        ?>
            <li>
                <a href="<?php echo get_permalink() ?>">
                    <?php echo woocommerce_get_product_thumbnail() ?>
                    <h4>
                        <?php echo get_the_title() ?>
                    </h4>
                    <div>
                        <?php echo get_short_description() ?>
                    </div>
                </a>
            </li>
        <?php endwhile;

        wp_reset_query();
        ?>
    </ul>
</div>