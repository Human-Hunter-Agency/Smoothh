<?php

/** Template to display 'Lista produktów' - list_products */

?>


<div class="container">
    <?php
    $args = array(
        'post_type'      => 'product',
    );

    $loop = new WP_Query($args);

    while ($loop->have_posts()) : $loop->the_post();
        global $product;
        echo '<br /><a href="' . get_permalink() . '">' . woocommerce_get_product_thumbnail() . ' ' . get_the_title() . '</a>';
    endwhile;

    wp_reset_query();
    ?>
</div>