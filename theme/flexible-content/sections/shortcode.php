<?php
/** Template to display Sekcja z shortcode - shortcode */

    $shortcode = $args['shortcode'];

?>
<?php if (isset($shortcode) && $shortcode){
    echo do_shortcode($shortcode);
} ?>
