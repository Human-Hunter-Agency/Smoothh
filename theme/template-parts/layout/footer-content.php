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
			<div class="prose-base [&_p]:text-[16px] [&_p]:!leading-[26px] [&_a]:text-foreground hover:[&_a]:text-primary [&_a]:transition [&_a]:duration-200">
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
								<a class="block rounded-full transition duration-200" href="<?php echo esc_attr($social_links['linkedin']) ?>" target="_blank">
									<span class="hidden">Linkedin</span>
									<svg class="group" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
										<circle class="group-hover:fill-primary/10 transition duration-200" cx="18.9404" cy="18.9648" r="18.9404" fill="white" />
										<path d="M24.0457 26.0287V20.3706C24.0457 19.0185 24.0255 17.2822 22.171 17.2822C20.2902 17.2822 20.0085 18.7558 20.0085 20.2698V26.0287H16.4009V14.3893H19.8539V15.9839H19.901C20.3843 15.0693 21.56 14.107 23.3198 14.107C26.9744 14.107 27.6527 16.5155 27.6527 19.6509V26.0287H24.0457ZM14.123 26.0287H10.5098V14.3893H14.1236L14.123 26.0287ZM10.2275 10.7028C10.2275 9.54504 11.1679 8.60352 12.3234 8.60352C13.4789 8.60352 14.4193 9.54504 14.4193 10.7028C14.4193 11.8599 13.4789 12.8014 12.3234 12.8014C11.1679 12.8014 10.2275 11.8599 10.2275 10.7028Z" fill="#8117EE" />
									</svg>
								</a>
							</li>
						<?php endif; ?>
						<?php if ($social_links['facebook']) : ?>
							<li class="shrink-0">
								<a class="block p-2 rounded-full bg-white hover:bg-primary/10 transition duration-200" href="<?php echo esc_attr($social_links['linkedin']) ?>" target="_blank">
									<span class="hidden">Facebook</span>
									<svg width="18" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.88278 17.6537H2.02018V9.42536H0.0898438V6.2545H2.02018V4.35238C2.02018 1.76746 3.10998 0.228516 6.20644 0.228516H8.78409V3.39937H7.17354C5.9678 3.39937 5.88762 3.84198 5.88762 4.66907L5.88278 6.2545H8.80244L8.46043 9.42536H5.88278V17.6537Z" fill="#8117EE" />
									</svg>
								</a>
							</li>
						<?php endif; ?>
						<?php if ($social_links['twitter']) : ?>
							<li class="shrink-0">
								<a class="block transition duration-200" href="<?php echo esc_attr($social_links['twitter']) ?>" target="_blank">
									<span class="hidden">Twitter</span>
									<svg class="group" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
										<circle class="group-hover:fill-primary/10 transition duration-200" cx="18.9561" cy="18.9648" r="18.9404" fill="white" />
										<path d="M24.4463 10.3357H27.374L20.9776 17.647L28.5029 27.5941H22.6109L17.9966 21.5604L12.7156 27.5941H9.78628L16.6282 19.7736L9.40918 10.3365H15.4508L19.6219 15.8514L24.4463 10.3357ZM23.4192 25.8422H25.0414L14.5693 11.9961H12.8286L23.4192 25.8422Z" fill="#8117EE" />
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