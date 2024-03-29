<?php
/** Template to display 'Sekcja z gridem 2 kolumny' - grid_two */

    $sections = $args['sections'];

?>

<div class="w-full mx-auto max-w-[1920px]">
        <?php if ($sections) : ?>
            <div class="grid-colored">
                    <?php foreach($sections as $section) :
                        $header = $section['header'];
                        $description = $section['description'];
                        $button = $section['button'];
                        ?>
                        <div class="grid-colored-section">
                            <?php if ($header) : ?>
                                <h3 class="text-3xl md:text-5xl font-bold mb-8 md:mb-16"><?php echo esc_html($header); ?></h3>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="px-5 lg:p-10 xl:px-[100px] prose-base md:prose-xl prose-strong:font-semibold prose-ol:list-decimal prose-ol:list-inside md:prose-p:leading-[30px]"><?php echo $description; ?></div>
                            <?php endif; ?>
                            <div>
                                <?php if( $button ): 
                                    $btn_url = $button['url'];
                                    $btn_title = $button['title'];
                                    $btn_target = $button['target'] ? $button['target'] : '_self';
                                    ?>
                                    <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="grid-section-btn" ><?php echo esc_html( $btn_title ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        <?php endif; ?>
</div>