<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smoothh
 */

?>

<header id="masthead" class="sticky z-20 top-0 w-full bg-white">
	<div class="container py-5 flex justify-between items-center">	
		<div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="block max-w-[140px] md:max-w-[266px]">
				<?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/img/logo.svg' ); ?>
			</a>
		</div>
		<button class="menu-btn md:hidden" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_html_e( 'Primary Menu', 'smoothh' ); ?>" data-js="nav-toggle">
			<svg width="40" height="40" viewBox="0 0 100 100">
				<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
				<path class="line line2" d="M 20,50 H 80" />
				<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
			</svg>
		</button>
		<div id="site-navigation" class="absolute md:static inset-x-0 top-full h-0 md:h-auto overflow-hidden bg-white shadow-none transition-all duration-500" data-js="nav-container">
			<nav class="container md:!px-0 pb-5 md:pb-0 md:!max-w-full flex flex-col md:flex-row md:items-center gap-5" aria-label="<?php esc_attr_e( 'Main Navigation', 'smoothh' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>'
					)
				);
				?>

				<!-- <button class="shrink-0 rounded-[14px] py-1 px-7 bg-gradient-to-b from-primary to-secondary text-white shadow-sm shadow-black/15">Zaloguj się</button> -->
			
			</nav><!-- #site-navigation -->
		</div>
	</div>


</header><!-- #masthead -->
