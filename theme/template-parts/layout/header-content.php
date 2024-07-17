<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smoothh
 */

?>

<header id="masthead" class="sticky z-20 <?php if (current_user_can( 'administrator' )) {echo 'top-8';} else { echo 'top-0';} ?> w-full bg-white transition-all duration-300 shadow-md">
	<div class="container py-5 flex justify-between items-center">
		<div>
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="block max-w-[140px] md:max-w-[190px] 2xl:max-w-[220px]">
				<?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/logo.svg'); ?>
			</a>
		</div>
		<div class="flex gap-4 items-center">
			<a href="<?php echo wc_get_cart_url() ?>" class="cart-icon-mobile relative p-1 mr-1 lg:hidden block">
				<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M19.4999 5.44214L21 24.942H0L1.5 5.44214H6C6.078 4.20804 6.53906 3.14934 7.38281 2.26634C8.22656 1.38374 9.2655 0.942139 10.5 0.942139C11.7341 0.942139 12.7736 1.38374 13.6172 2.26634C14.4609 3.14934 14.9216 4.20804 15 5.44214H19.4999ZM8.4375 3.33264C7.89038 3.92674 7.57788 4.62974 7.5 5.44214H13.5C13.4216 4.62974 13.1093 3.92674 12.5625 3.33264C12.0154 2.73904 11.3279 2.44214 10.5 2.44214C9.67163 2.44214 8.98425 2.73904 8.4375 3.33264ZM3 6.94214L1.5 23.442H19.4999L18 6.94214H3ZM7.80469 8.88734C8.10132 9.18434 8.24988 9.53604 8.24988 9.94214C8.24988 10.3485 8.10132 10.7002 7.80469 10.9968C7.50769 11.2937 7.15613 11.4421 6.75 11.4421C6.34351 11.4421 5.99194 11.2937 5.69531 10.9968C5.39832 10.7002 5.25 10.3485 5.25 9.94214C5.25 9.53604 5.39832 9.18434 5.69531 8.88734C5.99194 8.59074 6.34351 8.44214 6.75 8.44214C7.15613 8.44214 7.50769 8.59074 7.80469 8.88734ZM15.3047 8.88734C15.6013 9.18434 15.7499 9.53604 15.7499 9.94214C15.7499 10.3485 15.6013 10.7002 15.3047 10.9968C15.0077 11.2937 14.6561 11.4421 14.25 11.4421C13.8435 11.4421 13.4919 11.2937 13.1953 10.9968C12.8983 10.7002 12.75 10.3485 12.75 9.94214C12.75 9.53604 12.8983 9.18434 13.1953 8.88734C13.4919 8.59074 13.8435 8.44214 14.25 8.44214C14.6561 8.44214 15.0077 8.59074 15.3047 8.88734Z" fill="url(#paint0_linear_617_22331)" />
					<defs>
						<linearGradient id="paint0_linear_617_22331" x1="10.5" y1="0.942139" x2="10.5" y2="24.942" gradientUnits="userSpaceOnUse">
							<stop stop-color="#8117EE" />
							<stop offset="1" stop-color="#1F97D4" />
						</linearGradient>
					</defs>
				</svg>
				<?php
				$count = WC()->cart->get_cart_contents_count();
				if ($count > 0) {
					echo '<span class="absolute z-10 top-0 -right-1 px-0.5 h-[17px] min-w-[17px] rounded-full text-center text-[11px] text-white font-semibold bg-gradient-to-b from-primary to-secondary">' . $count . '</span>';
				}
				?>
			</a>
			<?php if (is_user_logged_in()) : ?>
				<a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="p-1 lg:hidden block">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24 11.9999C24 12.8751 23.9062 13.7266 23.7188 14.5547C23.5466 15.383 23.2889 16.1759 22.9453 16.9335C22.6014 17.6916 22.1873 18.3984 21.7032 19.0546C21.2186 19.7109 20.6718 20.3202 20.0626 20.8827H20.0859L19.6875 21.2109C19.6718 21.2266 19.6523 21.2423 19.6289 21.2577C19.6055 21.2736 19.578 21.2893 19.5469 21.3046C19.4685 21.383 19.3828 21.4569 19.2889 21.5274C19.1953 21.5976 19.0935 21.6719 18.9844 21.7499C18.9529 21.7656 18.9177 21.7891 18.8789 21.8202C18.8398 21.8518 18.7968 21.8828 18.75 21.9139C18.6405 21.9923 18.5273 22.0664 18.4102 22.1366C18.293 22.2069 18.1794 22.2736 18.0704 22.3359C18.0388 22.3673 18.0077 22.3908 17.9764 22.4062C17.9451 22.4219 17.9139 22.4377 17.8828 22.4531C17.7421 22.531 17.6093 22.6054 17.4844 22.6757C17.3591 22.7461 17.2266 22.8122 17.0859 22.8749C17.0702 22.8749 17.0544 22.8785 17.0389 22.8866C17.0233 22.8944 17.0076 22.906 16.9922 22.9219C16.5388 23.1247 16.0741 23.3005 15.5977 23.4491C15.1208 23.5975 14.6327 23.7187 14.1328 23.8124C14.1171 23.8124 14.1013 23.8124 14.0861 23.8124C14.0702 23.8124 14.0544 23.8124 14.0391 23.8124C13.8827 23.8435 13.7263 23.8711 13.5703 23.8944C13.4139 23.9179 13.2576 23.9372 13.1016 23.9531C13.0701 23.9531 13.0466 23.9531 13.0312 23.9531C13.0155 23.9531 12.9921 23.9531 12.9609 23.9531C12.8046 23.9685 12.6445 23.9802 12.4805 23.9882C12.3164 23.9959 12.1561 23.9999 12 23.9999C11.8278 23.9999 11.6638 23.9959 11.5079 23.9882C11.3514 23.9802 11.1874 23.9685 11.0157 23.9531C10.9999 23.9531 10.9843 23.9531 10.9688 23.9531C10.9531 23.9531 10.9296 23.9531 10.8986 23.9531C10.7419 23.9372 10.582 23.9179 10.4178 23.8944C10.2539 23.8711 10.0935 23.8435 9.9375 23.8124C9.92175 23.8124 9.91003 23.8124 9.90234 23.8124C9.89417 23.8124 9.88257 23.8124 9.86719 23.8124C9.35156 23.7187 8.85132 23.5935 8.36707 23.4374C7.88269 23.281 7.41394 23.1013 6.96094 22.8984C6.94519 22.8827 6.93335 22.8749 6.92578 22.8749C6.91785 22.8749 6.90601 22.8668 6.89062 22.8514C6.75 22.7889 6.61304 22.7226 6.48047 22.6524C6.34753 22.5819 6.21106 22.5077 6.07031 22.4296C6.05444 22.4143 6.03125 22.3986 6.00012 22.3827C5.96851 22.3673 5.94507 22.3516 5.92969 22.3359C5.80444 22.2578 5.67957 22.1836 5.55457 22.1132C5.42944 22.0429 5.31226 21.969 5.20312 21.8906C5.17163 21.8594 5.13647 21.8319 5.09766 21.8086C5.05835 21.7851 5.02332 21.758 4.99219 21.7264C4.88269 21.6486 4.77319 21.5705 4.66406 21.4921C4.55457 21.4141 4.45325 21.3281 4.35938 21.2344C4.34363 21.219 4.32776 21.2073 4.3125 21.1992C4.29675 21.1915 4.28101 21.1874 4.26562 21.1874L3.89075 20.8594V20.8359C3.29663 20.2891 2.75757 19.6874 2.27344 19.0312C1.78894 18.3595 1.37878 17.6484 1.04285 16.8984C0.706787 16.1484 0.453003 15.3673 0.28125 14.5547C0.09375 13.7266 0 12.8751 0 11.9999C0 10.3439 0.312256 8.789 0.9375 7.3359C1.57812 5.8827 2.44116 4.6134 3.52734 3.5273C4.61316 2.4415 5.88293 1.5784 7.33594 0.9375C8.78906 0.312698 10.3438 0 12 0C13.656 0 15.2109 0.312698 16.6641 0.9375C18.1172 1.5784 19.3864 2.4415 20.4727 3.5273C21.5585 4.6134 22.4216 5.8827 23.0625 7.3359C23.6873 8.789 24 10.3439 24 11.9999ZM0.867065 11.9999C0.867065 12.8283 0.952881 13.6251 1.125 14.3906C1.29675 15.1721 1.54285 15.9103 1.86316 16.6054C2.18335 17.3009 2.57825 17.9611 3.04688 18.5859C3.49988 19.1952 4.00793 19.7577 4.57031 20.2734C4.63257 20.2423 4.69116 20.2071 4.74609 20.1679C4.80066 20.1291 4.85144 20.094 4.89844 20.0624L8.34375 18.1874C8.49976 18.0937 8.625 17.9728 8.71875 17.8242C8.81262 17.6759 8.85938 17.5077 8.85938 17.3202V16.0781C8.71875 15.8906 8.50378 15.5507 8.21484 15.0585C7.92554 14.5664 7.6875 13.9768 7.5 13.289C7.3125 13.133 7.16785 12.9455 7.06641 12.7265C6.9646 12.5079 6.91406 12.2812 6.91406 12.0467V10.5C6.91406 10.3125 6.94922 10.1289 7.01953 9.9492C7.08984 9.7696 7.18726 9.6092 7.3125 9.4687V7.4297C7.29675 7.3206 7.3125 7.0001 7.35938 6.4687C7.40625 5.9376 7.66394 5.4064 8.13281 4.875C8.53894 4.4219 9.06628 4.078 9.71484 3.8437C10.363 3.6093 11.1248 3.492 12 3.492C12.8749 3.492 13.6366 3.6093 14.2852 3.8437C14.9333 4.078 15.4607 4.4219 15.8671 4.875C16.3359 5.4064 16.5938 5.9376 16.6407 6.4687C16.6875 7.0001 16.7029 7.3206 16.6875 7.4297V9.4687C16.8124 9.6092 16.9102 9.7696 16.9803 9.9492C17.0508 10.1289 17.0859 10.3125 17.0859 10.5V12.0467C17.0859 12.3596 17.0039 12.6445 16.8398 12.9022C16.6758 13.1602 16.4531 13.3516 16.1719 13.4765C16.0312 13.883 15.8632 14.2734 15.668 14.6484C15.4724 15.0234 15.2579 15.383 15.0236 15.7265C14.9766 15.7891 14.9296 15.8518 14.8828 15.914C14.8359 15.9766 14.7968 16.0312 14.7657 16.0781V17.3672C14.7657 17.5547 14.8125 17.7268 14.9062 17.8827C15 18.0391 15.1326 18.1563 15.3047 18.2344L18.9844 20.0859C19.0468 20.1173 19.1133 20.1525 19.1836 20.1914C19.2539 20.2306 19.3202 20.2734 19.3828 20.3202C19.9607 19.8046 20.4764 19.2421 20.9297 18.6327C21.3984 18.008 21.7928 17.3437 22.1133 16.6406C22.4333 15.9374 22.6875 15.1955 22.8751 14.414C23.0468 13.6329 23.1328 12.8283 23.1328 11.9999C23.1328 10.4689 22.8358 9.0234 22.2422 7.664C21.6639 6.3204 20.8711 5.1445 19.8633 4.1367C18.8553 3.1288 17.6796 2.336 16.3359 1.7578C14.9766 1.1642 13.5312 0.867104 12 0.867104C10.4685 0.867104 9.02356 1.1642 7.66394 1.7578C6.31995 2.336 5.14453 3.1288 4.13672 4.1367C3.12903 5.1445 2.33569 6.3204 1.75781 7.664C1.16382 9.0234 0.867065 10.4689 0.867065 11.9999Z" fill="url(#paint0_linear_626_27821)" />
						<defs>
							<linearGradient id="paint0_linear_626_27821" x1="12" y1="0" x2="12" y2="23.9999" gradientUnits="userSpaceOnUse">
								<stop stop-color="#8117EE" />
								<stop offset="1" stop-color="#1F97D4" />
							</linearGradient>
						</defs>
					</svg>
				</a>
			<?php endif; ?>
			<button class="menu-btn lg:hidden" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_html_e('Primary Menu', 'smoothh'); ?>" data-js="nav-toggle">
				<svg width="40" height="40" viewBox="0 0 100 100">
					<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
					<path class="line line2" d="M 20,50 H 80" />
					<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
				</svg>
			</button>
		</div>
		<div id="site-navigation" class="absolute lg:static inset-x-0 top-full h-0 lg:h-auto overflow-auto lg:overflow-visible bg-white shadow-none transition-all duration-500" data-js="nav-container">
			<nav class="container lg:!px-0 pb-5 lg:pb-0 lg:!max-w-full flex flex-col lg:flex-row lg:items-center gap-4 font-semibold" aria-label="<?php esc_attr_e('Main Navigation', 'smoothh'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'before'		 => '<div class="lg:text-sm flex justify-between lg:w-fit link-wrapper">',
						'after'			 => '<span class="grow lg:grow-0 px-2 lg:pl-1.5 lg:pr-0 flex lg:hidden items-center justify-end"><svg width="14" height="10" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.774525 0.500055L5.50054 5.75635L10.2266 0.500055" stroke="#8117EE" stroke-linecap="round" stroke-linejoin="round"/></svg></span></div>',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>'
					)
				);
				?>
				<a href="<?php echo wc_get_cart_url() ?>" class="cart-icon-desktop relative p-1 hidden lg:block">
					<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M19.4999 5.44214L21 24.942H0L1.5 5.44214H6C6.078 4.20804 6.53906 3.14934 7.38281 2.26634C8.22656 1.38374 9.2655 0.942139 10.5 0.942139C11.7341 0.942139 12.7736 1.38374 13.6172 2.26634C14.4609 3.14934 14.9216 4.20804 15 5.44214H19.4999ZM8.4375 3.33264C7.89038 3.92674 7.57788 4.62974 7.5 5.44214H13.5C13.4216 4.62974 13.1093 3.92674 12.5625 3.33264C12.0154 2.73904 11.3279 2.44214 10.5 2.44214C9.67163 2.44214 8.98425 2.73904 8.4375 3.33264ZM3 6.94214L1.5 23.442H19.4999L18 6.94214H3ZM7.80469 8.88734C8.10132 9.18434 8.24988 9.53604 8.24988 9.94214C8.24988 10.3485 8.10132 10.7002 7.80469 10.9968C7.50769 11.2937 7.15613 11.4421 6.75 11.4421C6.34351 11.4421 5.99194 11.2937 5.69531 10.9968C5.39832 10.7002 5.25 10.3485 5.25 9.94214C5.25 9.53604 5.39832 9.18434 5.69531 8.88734C5.99194 8.59074 6.34351 8.44214 6.75 8.44214C7.15613 8.44214 7.50769 8.59074 7.80469 8.88734ZM15.3047 8.88734C15.6013 9.18434 15.7499 9.53604 15.7499 9.94214C15.7499 10.3485 15.6013 10.7002 15.3047 10.9968C15.0077 11.2937 14.6561 11.4421 14.25 11.4421C13.8435 11.4421 13.4919 11.2937 13.1953 10.9968C12.8983 10.7002 12.75 10.3485 12.75 9.94214C12.75 9.53604 12.8983 9.18434 13.1953 8.88734C13.4919 8.59074 13.8435 8.44214 14.25 8.44214C14.6561 8.44214 15.0077 8.59074 15.3047 8.88734Z" fill="url(#paint0_linear_617_2233)" />
						<defs>
							<linearGradient id="paint0_linear_617_2233" x1="10.5" y1="0.942139" x2="10.5" y2="24.942" gradientUnits="userSpaceOnUse">
								<stop stop-color="#8117EE" />
								<stop offset="1" stop-color="#1F97D4" />
							</linearGradient>
						</defs>
					</svg>
					<?php
					$count = WC()->cart->get_cart_contents_count();
					if ($count > 0) {
						echo '<span data-js="cart-count" class="absolute z-10 top-0 -right-1 px-0.5 h-[17px] min-w-[17px] rounded-full text-center text-[11px] text-white font-semibold bg-gradient-to-b from-primary to-secondary">' . $count . '</span>';
					}
					?>
				</a>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="p-1 hidden lg:block">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M24 11.9999C24 12.8751 23.9062 13.7266 23.7188 14.5547C23.5466 15.383 23.2889 16.1759 22.9453 16.9335C22.6014 17.6916 22.1873 18.3984 21.7032 19.0546C21.2186 19.7109 20.6718 20.3202 20.0626 20.8827H20.0859L19.6875 21.2109C19.6718 21.2266 19.6523 21.2423 19.6289 21.2577C19.6055 21.2736 19.578 21.2893 19.5469 21.3046C19.4685 21.383 19.3828 21.4569 19.2889 21.5274C19.1953 21.5976 19.0935 21.6719 18.9844 21.7499C18.9529 21.7656 18.9177 21.7891 18.8789 21.8202C18.8398 21.8518 18.7968 21.8828 18.75 21.9139C18.6405 21.9923 18.5273 22.0664 18.4102 22.1366C18.293 22.2069 18.1794 22.2736 18.0704 22.3359C18.0388 22.3673 18.0077 22.3908 17.9764 22.4062C17.9451 22.4219 17.9139 22.4377 17.8828 22.4531C17.7421 22.531 17.6093 22.6054 17.4844 22.6757C17.3591 22.7461 17.2266 22.8122 17.0859 22.8749C17.0702 22.8749 17.0544 22.8785 17.0389 22.8866C17.0233 22.8944 17.0076 22.906 16.9922 22.9219C16.5388 23.1247 16.0741 23.3005 15.5977 23.4491C15.1208 23.5975 14.6327 23.7187 14.1328 23.8124C14.1171 23.8124 14.1013 23.8124 14.0861 23.8124C14.0702 23.8124 14.0544 23.8124 14.0391 23.8124C13.8827 23.8435 13.7263 23.8711 13.5703 23.8944C13.4139 23.9179 13.2576 23.9372 13.1016 23.9531C13.0701 23.9531 13.0466 23.9531 13.0312 23.9531C13.0155 23.9531 12.9921 23.9531 12.9609 23.9531C12.8046 23.9685 12.6445 23.9802 12.4805 23.9882C12.3164 23.9959 12.1561 23.9999 12 23.9999C11.8278 23.9999 11.6638 23.9959 11.5079 23.9882C11.3514 23.9802 11.1874 23.9685 11.0157 23.9531C10.9999 23.9531 10.9843 23.9531 10.9688 23.9531C10.9531 23.9531 10.9296 23.9531 10.8986 23.9531C10.7419 23.9372 10.582 23.9179 10.4178 23.8944C10.2539 23.8711 10.0935 23.8435 9.9375 23.8124C9.92175 23.8124 9.91003 23.8124 9.90234 23.8124C9.89417 23.8124 9.88257 23.8124 9.86719 23.8124C9.35156 23.7187 8.85132 23.5935 8.36707 23.4374C7.88269 23.281 7.41394 23.1013 6.96094 22.8984C6.94519 22.8827 6.93335 22.8749 6.92578 22.8749C6.91785 22.8749 6.90601 22.8668 6.89062 22.8514C6.75 22.7889 6.61304 22.7226 6.48047 22.6524C6.34753 22.5819 6.21106 22.5077 6.07031 22.4296C6.05444 22.4143 6.03125 22.3986 6.00012 22.3827C5.96851 22.3673 5.94507 22.3516 5.92969 22.3359C5.80444 22.2578 5.67957 22.1836 5.55457 22.1132C5.42944 22.0429 5.31226 21.969 5.20312 21.8906C5.17163 21.8594 5.13647 21.8319 5.09766 21.8086C5.05835 21.7851 5.02332 21.758 4.99219 21.7264C4.88269 21.6486 4.77319 21.5705 4.66406 21.4921C4.55457 21.4141 4.45325 21.3281 4.35938 21.2344C4.34363 21.219 4.32776 21.2073 4.3125 21.1992C4.29675 21.1915 4.28101 21.1874 4.26562 21.1874L3.89075 20.8594V20.8359C3.29663 20.2891 2.75757 19.6874 2.27344 19.0312C1.78894 18.3595 1.37878 17.6484 1.04285 16.8984C0.706787 16.1484 0.453003 15.3673 0.28125 14.5547C0.09375 13.7266 0 12.8751 0 11.9999C0 10.3439 0.312256 8.789 0.9375 7.3359C1.57812 5.8827 2.44116 4.6134 3.52734 3.5273C4.61316 2.4415 5.88293 1.5784 7.33594 0.9375C8.78906 0.312698 10.3438 0 12 0C13.656 0 15.2109 0.312698 16.6641 0.9375C18.1172 1.5784 19.3864 2.4415 20.4727 3.5273C21.5585 4.6134 22.4216 5.8827 23.0625 7.3359C23.6873 8.789 24 10.3439 24 11.9999ZM0.867065 11.9999C0.867065 12.8283 0.952881 13.6251 1.125 14.3906C1.29675 15.1721 1.54285 15.9103 1.86316 16.6054C2.18335 17.3009 2.57825 17.9611 3.04688 18.5859C3.49988 19.1952 4.00793 19.7577 4.57031 20.2734C4.63257 20.2423 4.69116 20.2071 4.74609 20.1679C4.80066 20.1291 4.85144 20.094 4.89844 20.0624L8.34375 18.1874C8.49976 18.0937 8.625 17.9728 8.71875 17.8242C8.81262 17.6759 8.85938 17.5077 8.85938 17.3202V16.0781C8.71875 15.8906 8.50378 15.5507 8.21484 15.0585C7.92554 14.5664 7.6875 13.9768 7.5 13.289C7.3125 13.133 7.16785 12.9455 7.06641 12.7265C6.9646 12.5079 6.91406 12.2812 6.91406 12.0467V10.5C6.91406 10.3125 6.94922 10.1289 7.01953 9.9492C7.08984 9.7696 7.18726 9.6092 7.3125 9.4687V7.4297C7.29675 7.3206 7.3125 7.0001 7.35938 6.4687C7.40625 5.9376 7.66394 5.4064 8.13281 4.875C8.53894 4.4219 9.06628 4.078 9.71484 3.8437C10.363 3.6093 11.1248 3.492 12 3.492C12.8749 3.492 13.6366 3.6093 14.2852 3.8437C14.9333 4.078 15.4607 4.4219 15.8671 4.875C16.3359 5.4064 16.5938 5.9376 16.6407 6.4687C16.6875 7.0001 16.7029 7.3206 16.6875 7.4297V9.4687C16.8124 9.6092 16.9102 9.7696 16.9803 9.9492C17.0508 10.1289 17.0859 10.3125 17.0859 10.5V12.0467C17.0859 12.3596 17.0039 12.6445 16.8398 12.9022C16.6758 13.1602 16.4531 13.3516 16.1719 13.4765C16.0312 13.883 15.8632 14.2734 15.668 14.6484C15.4724 15.0234 15.2579 15.383 15.0236 15.7265C14.9766 15.7891 14.9296 15.8518 14.8828 15.914C14.8359 15.9766 14.7968 16.0312 14.7657 16.0781V17.3672C14.7657 17.5547 14.8125 17.7268 14.9062 17.8827C15 18.0391 15.1326 18.1563 15.3047 18.2344L18.9844 20.0859C19.0468 20.1173 19.1133 20.1525 19.1836 20.1914C19.2539 20.2306 19.3202 20.2734 19.3828 20.3202C19.9607 19.8046 20.4764 19.2421 20.9297 18.6327C21.3984 18.008 21.7928 17.3437 22.1133 16.6406C22.4333 15.9374 22.6875 15.1955 22.8751 14.414C23.0468 13.6329 23.1328 12.8283 23.1328 11.9999C23.1328 10.4689 22.8358 9.0234 22.2422 7.664C21.6639 6.3204 20.8711 5.1445 19.8633 4.1367C18.8553 3.1288 17.6796 2.336 16.3359 1.7578C14.9766 1.1642 13.5312 0.867104 12 0.867104C10.4685 0.867104 9.02356 1.1642 7.66394 1.7578C6.31995 2.336 5.14453 3.1288 4.13672 4.1367C3.12903 5.1445 2.33569 6.3204 1.75781 7.664C1.16382 9.0234 0.867065 10.4689 0.867065 11.9999Z" fill="url(#paint0_linear_626_2782)" />
							<defs>
								<linearGradient id="paint0_linear_626_2782" x1="12" y1="0" x2="12" y2="23.9999" gradientUnits="userSpaceOnUse">
									<stop stop-color="#8117EE" />
									<stop offset="1" stop-color="#1F97D4" />
								</linearGradient>
							</defs>
						</svg>
					</a>
				<?php endif; ?>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo esc_url(wc_get_account_endpoint_url(get_option('woocommerce_logout_endpoint', 'customer-logout'))); ?>" class="shrink-0 rounded-[14px] py-1.5 px-7 bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white text-center shadow-sm shadow-black/15"><?php echo __('Log out', 'woocommerce') ?></a>
				<?php else : ?>
					<a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="shrink-0 rounded-[14px] py-1.5 px-7 bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white text-center shadow-sm shadow-black/15"><?php esc_html_e('Log in', 'smoothh'); ?></a>
				<?php endif; ?>
			</nav><!-- #site-navigation -->
		</div>
	</div>


</header><!-- #masthead -->