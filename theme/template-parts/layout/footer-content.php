<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Smoothh
 */

$brand_location = get_field('brand_location', 'option');
$brand_contact = get_field('brand_contact', 'option');
$social_links = get_field('social_links', 'option');

?>

<footer id="page-footer">
	<div class="container pb-10 md:pb-[60px] pt-[140px] flex flex-wrap">
		<div class="w-full mb-6 sm:pr-5 sm:w-2/5 lg:w-3/12">
			<h3><?php esc_html_e('Company and contact details', 'smoothh'); ?></h3>
			<div class="prose-base [&_p]:!leading-8 [&_a]:text-foreground hover:[&_a]:text-primary [&_a]:transition [&_a]:duration-200">
				<?php echo $brand_location ?>
				<?php echo $brand_contact ?>
			</div>
		</div>

		<div class="h-full w-full sm:w-3/5 lg:w-5/12 flex flex-wrap">
			<div class="w-full mb-6 sm:pr-5 sm:w-1/2 lg:w-2/5">
				<?php if (has_nav_menu('menu-2')) :
					$menu_name = wp_get_nav_menu_name("menu-2");
				?>
					<h3><?php echo $menu_name ?></h3>

					<nav aria-label="<?php esc_attr_e('Footer Col 1 Menu', 'smoothh'); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_class'     => 'footer-menu',
								'depth'          => 1,
							)
						);
						?>
					</nav>
				<?php endif; ?>
			</div>

			<div class="w-full mb-6 sm:pr-5 sm:w-1/2 lg:w-3/5">
				<?php if (has_nav_menu('menu-3')) :
					$menu_name = wp_get_nav_menu_name("menu-3");
				?>
					<h3><?php echo $menu_name ?></h3>

					<nav aria-label="<?php esc_attr_e('Footer Col 2 Menu', 'smoothh'); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-3',
								'menu_class'     => 'footer-menu',
								'depth'          => 1,
							)
						);
						?>
					</nav>
				<?php endif; ?>
			</div>

			<div class="w-full sm:pr-5 mb-6">
				<?php
				$socials_count = count(array_filter(array_values($social_links)));
				if ($socials_count > 0) :
				?>
					<h3 class="!mb-[5px]"><?php esc_html_e('Follow us:', 'smoothh'); ?></h3>
					<ul class="flex gap-3">
						<?php if ($social_links['linkedin']) : ?>
							<li class="shrink-0">
								<a class="block p-2 rounded-full bg-white hover:bg-primary/10 transition duration-200" href="<?php echo esc_attr($social_links['linkedin']) ?>" target="_blank">
									<span class="hidden">Linkedin</span>
									<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M14.0447 18.0048V12.3467C14.0447 10.9946 14.0245 9.2583 12.1701 9.2583C10.2893 9.2583 10.0075 10.7319 10.0075 12.2459V18.0048H6.39995V6.3654H9.85294V7.96H9.89999C10.3834 7.04536 11.559 6.08311 13.3188 6.08311C16.9734 6.08311 17.6517 8.49153 17.6517 11.627V18.0048H14.0447ZM4.12203 18.0048H0.508851V6.3654H4.12259L4.12203 18.0048ZM0.226562 2.67883C0.226562 1.52111 1.16696 0.57959 2.32244 0.57959C3.47792 0.57959 4.41832 1.52111 4.41832 2.67883C4.41832 3.836 3.47792 4.77752 2.32244 4.77752C1.16696 4.77752 0.226562 3.836 0.226562 2.67883Z" fill="#6739E7" />
									</svg>
								</a>
							</li>
						<?php endif; ?>
						<?php if ($social_links['facebook']) : ?>
							<li class="shrink-0">
								<a class="block p-2 rounded-full bg-white hover:bg-primary/10 transition duration-200" href="<?php echo esc_attr($social_links['linkedin']) ?>" target="_blank">
									<span class="hidden">Facebook</span>
									<svg width="18" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.88278 17.6537H2.02018V9.42536H0.0898438V6.2545H2.02018V4.35238C2.02018 1.76746 3.10998 0.228516 6.20644 0.228516H8.78409V3.39937H7.17354C5.9678 3.39937 5.88762 3.84198 5.88762 4.66907L5.88278 6.2545H8.80244L8.46043 9.42536H5.88278V17.6537Z" fill="#6739E7" />
									</svg>
								</a>
							</li>
						<?php endif; ?>
						<?php if ($social_links['twitter']) : ?>
							<li class="shrink-0">
								<a class="block p-2 rounded-full bg-white hover:bg-primary/10 transition duration-200" href="<?php echo esc_attr($social_links['twitter']) ?>" target="_blank">
									<span class="hidden">Twitter</span>
									<svg width="18" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.6748 2.5356C20.8855 2.88569 20.0356 3.12241 19.1453 3.22955C20.0546 2.68386 20.7529 1.82172 21.0813 0.793873C20.2301 1.29845 19.288 1.66474 18.2841 1.86159C17.4809 1.00567 16.3368 0.471191 15.0701 0.471191C12.6379 0.471191 10.6653 2.44216 10.6653 4.87411C10.6653 5.22046 10.7057 5.5556 10.7802 5.87828C7.12053 5.69514 3.87628 3.94095 1.70419 1.27727C1.32408 1.92762 1.10813 2.68386 1.10813 3.49119C1.10813 5.01863 1.88604 6.36666 3.0668 7.1553C2.34445 7.13288 1.66504 6.93478 1.07277 6.60463C1.07277 6.62331 1.07277 6.642 1.07277 6.66069C1.07277 8.79362 2.58945 10.5727 4.60494 10.9776C4.23493 11.0786 3.84724 11.1321 3.44439 11.1321C3.16151 11.1321 2.88495 11.1047 2.61596 11.0524C3.17667 12.8016 4.80321 14.0749 6.73031 14.111C5.22247 15.2909 3.32316 15.9948 1.25967 15.9948C0.904811 15.9948 0.553741 15.9748 0.208984 15.9337C2.15755 17.1833 4.47234 17.9122 6.96015 17.9122C15.06 17.9122 19.4901 11.2031 19.4901 5.38492C19.4901 5.19305 19.485 5.00492 19.4775 4.81555C20.3375 4.19511 21.0851 3.41893 21.6748 2.53685V2.5356Z" fill="#6739E7" />
									</svg>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>

		</div>

		<div class="w-full lg:w-4/12">
			<h3><?php esc_html_e('Sign up for the newsletter and stay up to date', 'smoothh'); ?></h3>
			<div class="mb-6">
				<?php echo do_shortcode('[contact-form-7 id="49bd164" title="Newsletter"]') ?>
			</div>

			<h3 class="mb-6"><?php esc_html_e('Check how they rate us:', 'smoothh'); ?></h3>
			<ul class="flex gap-2.5">
				<?php for ($i = 0; $i < 5; $i++) : ?>
					<li class="grow-0 shrink-0">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 5C0 2.23858 2.23858 0 5 0H35C37.7614 0 40 2.23858 40 5V35C40 37.7614 37.7614 40 35 40H5C2.23858 40 0 37.7614 0 35V5Z" fill="#288CD7" />
							<path d="M20.1313 8L31.5016 26.7112L8.76095 26.7112L20.1313 8Z" fill="white" />
							<path d="M20.1285 32.9536L8.75814 14.2424L31.4988 14.2424L20.1285 32.9536Z" fill="white" />
						</svg>
					</li>
				<?php endfor; ?>
			</ul>

		</div>

	</div>

	<div class="bg-gradient-to-b from-primary to-secondary">
		<div class="container flex flex-col md:flex-row md:items-center justify-between gap-5 py-5 md:py-10 text-white">
			<?php
			$smoothh_blog_info = get_bloginfo('name');
			if (!empty($smoothh_blog_info)) :
			?>
				<span>Copyright © <?php echo date("Y"); ?> <?php bloginfo('name'); ?> - All Rights Reserved.</span>
			<?php
			endif;
			?>

			<div>
				<?php if (has_nav_menu('menu-4')) : ?>
					<nav aria-label="<?php esc_attr_e('Footer Bottom Menu', 'smoothh'); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-4',
								'menu_class'     => 'footer-bottom-menu',
								'depth'          => 1,
							)
						);
						?>
					</nav>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>