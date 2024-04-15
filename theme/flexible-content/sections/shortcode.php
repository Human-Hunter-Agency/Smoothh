<?php
/** Template to display Sekcja z shortcode - shortcode */

    $shortcode = $args['shortcode'];

?>
<?php if (isset($shortcode) && $shortcode) : ?>
    <div class="container">
        <?php echo do_shortcode($shortcode); ?>
    </div>
<?php endif ; ?>