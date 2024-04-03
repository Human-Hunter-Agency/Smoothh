<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smoothh
 */

 $title = get_field('title');
 $author = get_field('author');
 $cta = get_field('cta');
?>

<article id="post-<?php the_ID(); ?>" data-js-post-id="<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="relative w-full h-[300px] md:h-[600px] flex flex-col items-center justify-center mb-[50px] md:mb-[100px]">

		<?php smoothh_post_thumbnail(); ?>

		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/80"></div>

		<div class="relative z-0 flex flex-col items-center justify-center container">			
				<?php the_title( '<h1 class="text-5xl md:text-[66px] leading-tight text-center text-bold text-white font-bold">', '</h1>' ); ?>
		</div>
	</div>


	<div class="container flex flex-col md:flex-row gap-5 md:gap-10 lg:gap-[60px]">
		<div <?php smoothh_content_class( 'entry-content' ); ?>>
			<div class="mb-5 md:mb-6">
				<?php if ($title) : ?>
					<h2 class="!text-2xl font-bold text-primary !mb-1 !mt-0"><?php echo esc_html($title) ?></h2>
				<?php endif; ?>
				<span class="italic">
					<?php 
						if ($author) {
							echo $author . ' / ';
						} 
						$post_time = get_post_time();
						$formatted_time = date('d.m.Y', $post_time);
						echo 'Data publikacji: ' . $formatted_time
					?>
				</span>
			</div>
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__( 'Continue reading<span class="sr-only"> "%s"</span>', 'smoothh' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
	
			?>
		</div><!-- .entry-content -->
		<aside class="md:basis-1/4 lg:shrink-0 ">
			<h5 class="mb-5 md:mb-9 text-2xl md:text-3xl font-semibold">Kategorie wpisów</h5>
			<ul class="list-none [&_.cat-item]:mb-4 md:[&_.cat-item]:mb-6 font-semibold [&_.cat-item]:text-base md:[&_.cat-item]:text-xl [&_a]:transition [&_a]:duration-200 hover:[&_a]:text-primary">
				<?php wp_list_categories(array('title_li' => '')) ?>
			</ul>
		</aside>
	</div>

</article><!-- #post-${ID} -->

<?php get_template_part('flexible-content/sections/blog-posts.php') ?>

<?php if ($cta) : 
	$background = $cta['background'];
	if (isset($background) && $background['url']) {
		$bg_url = $background['url'];
	}
	$header = $cta['header'];
	$button = $cta['button'];
	?>
<div class="relative w-full flex flex-col items-center justify-center py-10 md:py-[70px]">

    <?php if (isset($bg_url)) : ?>
        <img src="<?php echo $bg_url; ?>" class="absolute inset-0 -z-20 object-cover h-full w-full" >
    <?php endif; ?>

    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-primary/60 to-secondary/70"></div>

    <div class="relative z-0 flex flex-col items-center justify-center container">
        <?php if (isset($header)) : ?>
            <h3 class="text-3xl md:text-5xl text-bold text-white font-bold mb-9" ><?php echo esc_html($header); ?></h1>
        <?php endif; ?>

        <?php if( isset($button) && $button ): 
            $btn_url = $button['url'];
            $btn_title = $button['title'];
            $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="rounded-[14px] text-[13px] font-bold py-2 px-7 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200" ><?php echo esc_html( $btn_title ); ?></a>
        <?php endif; ?>
    </div>

</div>
<?php endif; ?>
