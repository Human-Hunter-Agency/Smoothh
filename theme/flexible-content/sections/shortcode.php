<?php
/** Template to display Sekcja z shortcode - shortcode */

    $shortcode = $args['shortcode'];

?>
<?php if (isset($shortcode) && $shortcode) : ?>
    <?php if(($shortcode == '[woocommerce_my_account]' && !is_user_logged_in()) || $shortcode == '[woocommerce_cart]' || $shortcode == '[instagram-feed feed=2]'): ?>
            <?php echo do_shortcode($shortcode); ?>    
    <?php else: ?>
        <div class="container">
            <?php echo do_shortcode($shortcode); ?>
        </div>
    <?php endif; ?>
<?php endif ; ?>