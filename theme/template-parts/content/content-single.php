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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

<section id="posts-related" class="container my-10 md:mt-20 md:mb-16">
	<h2 class="text-3xl md:text-5xl text-bold font-bold mb-5 md:mb-10 text-center">Zobacz pozostałe materiały eksperckie z naszego bloga</h2>
	<ul class="p-2 rounded-2xl bg-[#F2F2F2] flex items-center gap-2 max-w-screen-md w-fit flex-wrap mx-auto mb-5 md:mb-10">
		<?php
		$categories = get_categories();
		$i = 0;
		foreach ($categories as $category) : ?>
			<li class="flex-1">
				<button data-js-tab-btn="<?php echo $category->term_id; ?>" class="<?php if($i++ === 0){echo 'active';} ?> tab-btn"><?php echo $category->name ?></button>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php
	$i = 0;
	foreach ($categories as $category) :
		$count = $category->category_count;
		$visible_posts = 6;
		$args = array(
			'category' => $category->term_id,
			'numberposts' => $visible_posts,
			'exclude' => get_the_ID()
		);
	?>
		<div class="w-full relative min-h-32 <?php if ($i !== 0) {echo 'hidden';} ?>" data-js="<?php echo 'tab-content-' . $category->term_id; ?>">
			<ul>
			<?php if ($i === 0) :
				++$i;
				$posts = get_posts($args);
				foreach ($posts as $post) : ?>
				<li class="post-tile">
					<h4><?php echo $post->post_title; ?></h4>
					<p><?php echo get_the_excerpt($post->ID); ?></p>
				</li>
			
			<?php
				endforeach;
				endif;
			?>
			</ul>
				<div class="w-full p-10 hidden" data-js="<?php echo 'tab-loader-' . $category->term_id; ?>">
					<span class="mx-auto block size-7 border-2 border-solid border-primary rounded-full border-b-transparent animate-spin"></span>
				</div>
			<?php if ($i === 0) :?>
				<button data-js="<?php echo 'tab-loadmore-' . $category->term_id; ?>" class="<?php if ($count <= $visible_posts) {echo 'hidden';} ?>flex gap-4 items-center rounded-2xl text-base font-bold py-[15px] px-5 md:px-8 text-white bg-gradient-to-b from-primary to-secondary transition duration-200">
					Więcej wpisów
					<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle class="stroke-white" cx="9.5" cy="9.5" r="9"></circle>
                        <path class="fill-white" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
                    </svg>
                </button>
			<?php endif; ?>
		</div>
		
	<?php endforeach; ?>
</section>

<?php if ($cta) : 
	$background = $cta['background'];
	if ($background['url']) {
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

        <?php if( isset($button) ): 
            $btn_url = $button['url'];
            $btn_title = $button['title'];
            $btn_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="rounded-[14px] text-[13px] font-bold py-2 px-7 md:px-[70px] border-2 border-white text-white bg-transparent hover:bg-white/20 transition duration-200" ><?php echo esc_html( $btn_title ); ?></a>
        <?php endif; ?>
    </div>

</div>
<?php endif; ?>
