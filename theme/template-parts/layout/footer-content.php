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
					<h3 class="!mb-[29px]"><?php esc_html_e('Follow us:', 'smoothh'); ?></h3>
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
								<a class="block transition duration-200" href="<?php echo esc_attr($social_links['linkedin']) ?>" target="_blank">
									<span class="hidden">Facebook</span>
									<svg class="group" xmlns="http://www.w3.org/2000/svg" width="39" height="38" viewBox="0 0 39 38" fill="none">
										<circle class="group-hover:fill-primary/10 transition duration-200" cx="19.4482" cy="18.9648" r="18.9404" fill="white" />
										<path d="M20.8838 27.6774H17.0212V19.449H15.0908V16.2782H17.0212V14.3761C17.0212 11.7911 18.111 10.2522 21.2074 10.2522H23.7851V13.4231H22.1745C20.9688 13.4231 20.8886 13.8657 20.8886 14.6928L20.8838 16.2782H23.8034L23.4614 19.449H20.8838V27.6774Z" fill="#8117EE" />
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

	<div class="">
		<div class="container relative flex flex-col md:flex-row md:items-center justify-between gap-5 py-5 md:py-10 text-[#A7A7A7] text-[14px] before:content-[''] before:w-full before:h-[1px] before:bg-[#A7A7A7] before:absolute before:top-0 before:left-0 before:container _border _border-t-[1px] _border-t-[#A7A7A7]">
			<div class="relative border border-t-[1px] border-t-red-600"></div>
			<?php
			$smoothh_blog_info = get_bloginfo('name');
			if (!empty($smoothh_blog_info)) :
			?>
				<span>Copyright © <?php echo date("Y"); ?> <?php bloginfo('name'); ?> - All Rights Reserved.</span>
			<?php
			endif;
			?>

			<div class="flex gap-12 items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="175" height="33" viewBox="0 0 175 33" fill="none">
					<path d="M3.37668 0.786133H45.8968C47.7588 0.786133 49.2736 2.27462 49.2736 4.10423V29.0018C49.2736 30.8315 47.7588 32.32 45.8968 32.32H3.37668C1.51478 32.32 0 30.8315 0 29.0018V4.10423C0 2.27462 1.51478 0.786133 3.37668 0.786133ZM45.8968 30.4261C46.7145 30.4261 47.3797 29.7871 47.3797 29.0018V4.10423C47.3797 3.31894 46.7145 2.68006 45.8968 2.68006H3.37668C2.55909 2.68006 1.89393 3.31894 1.89393 4.10423V29.0018C1.89393 29.7871 2.55909 30.4261 3.37668 30.4261H45.8968Z" fill="#A7A7A7" />
					<path d="M30.6849 10.1392C27.84 10.1392 25.2977 11.6142 25.2977 14.3392C25.2977 17.4645 29.8066 17.6803 29.8066 19.2503C29.8066 19.9114 29.0492 20.5032 27.7557 20.5032C25.9199 20.5032 24.5477 19.6763 24.5477 19.6763L23.9607 22.4263C23.9607 22.4263 25.5413 23.1247 27.6398 23.1247C30.7502 23.1247 33.1977 21.5773 33.1977 18.8056C33.1977 15.5033 28.67 15.2938 28.67 13.8365C28.67 13.3187 29.2917 12.7513 30.5816 12.7513C32.0369 12.7513 33.2243 13.3526 33.2243 13.3526L33.7989 10.6967C33.7989 10.6967 32.507 10.1392 30.6849 10.1392ZM4.65678 10.3396L4.58789 10.7405C4.58789 10.7405 5.78474 10.9596 6.86269 11.3967C8.25069 11.8979 8.34956 12.1897 8.58333 13.0958L11.1305 22.918H14.5452L19.8055 10.3396H16.3988L13.0186 18.8917L11.6394 11.6426C11.5128 10.8129 10.8721 10.3396 10.0879 10.3396H4.65678ZM21.1755 10.3396L18.503 22.918H21.7516L24.4146 10.3396H21.1755ZM39.2942 10.3396C38.5108 10.3396 38.0957 10.7591 37.7912 11.4922L33.0318 22.918H36.4385L37.0976 21.0137H41.2481L41.6488 22.918H44.6548L42.0324 10.3396H39.2942ZM39.7372 13.7379L40.747 18.4579H38.0417L39.7372 13.7379Z" fill="#A7A7A7" />
					<path d="M65.4157 0.414062H108.406C110.29 0.414062 111.823 1.92537 111.823 3.78302V29.0771C111.823 30.9348 110.29 32.4461 108.406 32.4461H65.4157C63.5317 32.4461 61.999 30.9348 61.999 29.0771V3.78302C61.999 1.92537 63.5317 0.414062 65.4157 0.414062ZM108.406 30.5261C109.232 30.5261 109.903 29.8761 109.903 29.0771V3.78302C109.903 2.98406 109.232 2.33406 108.406 2.33406H65.4157C64.5904 2.33406 63.919 2.98406 63.919 3.78302V29.0771C63.919 29.8761 64.5904 30.5261 65.4157 30.5261H108.406Z" fill="#A7A7A7" />
					<path d="M76.8721 28.6484V27.0174C76.8721 26.3935 76.4921 25.985 75.8397 25.985C75.5135 25.985 75.1588 26.0926 74.915 26.4473C74.7249 26.1496 74.4526 25.985 74.0441 25.985C73.7717 25.985 73.4993 26.0673 73.2839 26.365V26.0388H72.7139V28.6484H73.2839V27.2074C73.2839 26.745 73.5278 26.5266 73.9079 26.5266C74.2879 26.5266 74.4779 26.7704 74.4779 27.2074V28.6484H75.0479V27.2074C75.0479 26.745 75.3203 26.5266 75.6719 26.5266C76.0519 26.5266 76.2419 26.7704 76.2419 27.2074V28.6484H76.8721ZM85.3281 26.0388H84.4033V25.2502H83.8332V26.0388H83.317V26.555H83.8332V27.7521C83.8332 28.3507 84.0771 28.7022 84.7295 28.7022C84.9734 28.7022 85.2457 28.6199 85.4357 28.5122L85.2711 28.0213C85.1064 28.129 84.9164 28.1575 84.7802 28.1575C84.5078 28.1575 84.4001 27.9928 84.4001 27.7237V26.555H85.3249V26.0388H85.3281ZM90.1673 25.9818C89.841 25.9818 89.6225 26.1465 89.4864 26.3618V26.0356H88.9163V28.6453H89.4864V27.1758C89.4864 26.7418 89.6764 26.4949 90.0311 26.4949C90.1388 26.4949 90.275 26.5233 90.3858 26.5487L90.5505 26.004C90.4364 25.9818 90.275 25.9818 90.1673 25.9818ZM82.8546 26.2542C82.5823 26.0641 82.2023 25.9818 81.7937 25.9818C81.1413 25.9818 80.7074 26.308 80.7074 26.8242C80.7074 27.2581 81.0336 27.5051 81.6037 27.5843L81.8761 27.6128C82.1737 27.6666 82.3384 27.749 82.3384 27.8851C82.3384 28.0751 82.1199 28.2113 81.7399 28.2113C81.3598 28.2113 81.059 28.0751 80.8689 27.939L80.5966 28.3729C80.8943 28.5914 81.3028 28.6991 81.7114 28.6991C82.4714 28.6991 82.9085 28.3444 82.9085 27.8567C82.9085 27.3943 82.5537 27.1504 82.0122 27.0681L81.7399 27.0396C81.496 27.0111 81.306 26.9572 81.306 26.7957C81.306 26.6057 81.496 26.498 81.7969 26.498C82.1231 26.498 82.4492 26.6342 82.614 26.7166L82.8546 26.2542ZM98.0215 25.9818C97.6953 25.9818 97.4767 26.1465 97.3406 26.3618V26.0356H96.7704V28.6453H97.3406V27.1758C97.3406 26.7418 97.5306 26.4949 97.8853 26.4949C97.9929 26.4949 98.1291 26.5233 98.24 26.5487L98.4046 26.0103C98.2938 25.9818 98.1323 25.9818 98.0215 25.9818ZM90.7373 27.3436C90.7373 28.1322 91.2821 28.7022 92.1245 28.7022C92.5045 28.7022 92.7769 28.6199 93.0492 28.4045L92.7769 27.9421C92.5583 28.1068 92.343 28.186 92.0959 28.186C91.6336 28.186 91.3074 27.8598 91.3074 27.3436C91.3074 26.8527 91.6336 26.5266 92.0959 26.5012C92.3399 26.5012 92.5583 26.5835 92.7769 26.745L93.0492 26.2826C92.7769 26.0641 92.5045 25.985 92.1245 25.985C91.2821 25.9818 90.7373 26.555 90.7373 27.3436ZM96.0104 27.3436V26.0388H95.4403V26.365C95.2503 26.1212 94.9779 25.985 94.6232 25.985C93.8885 25.985 93.3184 26.555 93.3184 27.3436C93.3184 28.1322 93.8885 28.7022 94.6232 28.7022C95.0033 28.7022 95.2757 28.5661 95.4403 28.3222V28.6484H96.0104V27.3436ZM93.917 27.3436C93.917 26.8812 94.2147 26.5012 94.7056 26.5012C95.168 26.5012 95.4942 26.8559 95.4942 27.3436C95.4942 27.806 95.168 28.186 94.7056 28.186C94.2179 28.1575 93.917 27.8028 93.917 27.3436ZM87.0952 25.9818C86.3352 25.9818 85.7905 26.5266 85.7905 27.3404C85.7905 28.1575 86.3352 28.6991 87.1238 28.6991C87.5038 28.6991 87.8839 28.5914 88.1847 28.3444L87.9123 27.9358C87.6938 28.1005 87.4214 28.2082 87.1523 28.2082C86.7976 28.2082 86.446 28.0435 86.3637 27.5843H88.2924C88.2924 27.502 88.2924 27.4481 88.2924 27.3658C88.3177 26.5266 87.8268 25.9818 87.0952 25.9818ZM87.0952 26.4727C87.45 26.4727 87.6938 26.6912 87.7477 27.0966H86.389C86.4428 26.745 86.6867 26.4727 87.0952 26.4727ZM101.258 27.3436V25.0063H100.688V26.365C100.498 26.1212 100.226 25.985 99.871 25.985C99.1362 25.985 98.5662 26.555 98.5662 27.3436C98.5662 28.1322 99.1362 28.7022 99.871 28.7022C100.251 28.7022 100.523 28.5661 100.688 28.3222V28.6484H101.258V27.3436ZM99.1647 27.3436C99.1647 26.8812 99.4624 26.5012 99.9533 26.5012C100.416 26.5012 100.742 26.8559 100.742 27.3436C100.742 27.806 100.416 28.186 99.9533 28.186C99.4624 28.1575 99.1647 27.8028 99.1647 27.3436ZM80.0803 27.3436V26.0388H79.5103V26.365C79.3203 26.1212 79.0479 25.985 78.6932 25.985C77.9584 25.985 77.3884 26.555 77.3884 27.3436C77.3884 28.1322 77.9584 28.7022 78.6932 28.7022C79.0732 28.7022 79.3456 28.5661 79.5103 28.3222V28.6484H80.0803V27.3436ZM77.9616 27.3436C77.9616 26.8812 78.2593 26.5012 78.7502 26.5012C79.2126 26.5012 79.5388 26.8559 79.5388 27.3436C79.5388 27.806 79.2126 28.186 78.7502 28.186C78.2593 28.1575 77.9616 27.8028 77.9616 27.3436Z" fill="#A7A7A7" />
					<path d="M71.1553 13.8833C71.1553 19.2805 75.5366 23.6547 80.9267 23.6547C82.8457 23.6547 84.7295 23.0762 86.3239 22.025C81.1807 17.8412 81.216 9.94652 86.3239 5.76278C84.7295 4.7045 82.8457 4.13303 80.9267 4.13303C75.5366 4.12598 71.1553 8.50723 71.1553 13.8833ZM86.9589 21.5593C91.9328 17.679 91.9116 10.1158 86.9589 6.21431C82.0061 10.1158 81.985 17.686 86.9589 21.5593ZM102.763 13.8833C102.763 8.50723 98.3813 4.12598 92.9911 4.12598C91.0721 4.12598 89.1884 4.7045 87.5939 5.75572C92.6806 9.93948 92.7583 17.8554 87.5939 22.0179C89.1884 23.0762 91.0862 23.6477 92.9911 23.6477C98.3813 23.6547 102.763 19.2805 102.763 13.8833Z" fill="#A7A7A7" />
					<path d="M128.433 0.414062H171.227C173.164 0.414062 174.74 1.98998 174.74 3.92704V28.9011C174.74 30.8381 173.164 32.4141 171.227 32.4141H128.433C126.496 32.4141 124.92 30.8381 124.92 28.9011V3.92704C124.92 1.98998 126.496 0.414062 128.433 0.414062ZM171.227 30.4979C172.108 30.4979 172.824 29.7816 172.824 28.9011V3.92704C172.824 3.04656 172.108 2.33023 171.227 2.33023H128.433C127.552 2.33023 126.836 3.04656 126.836 3.92704V28.9011C126.836 29.7816 127.552 30.4979 128.433 30.4979H171.227Z" fill="#A7A7A7" />
					<path d="M135.675 11.2631C135.138 10.8943 134.438 10.7095 133.574 10.7095H130.231C129.966 10.7095 129.82 10.8419 129.792 11.1064L128.434 19.6323C128.42 19.716 128.441 19.7926 128.497 19.8622C128.552 19.932 128.622 19.9667 128.706 19.9667H130.294C130.572 19.9667 130.725 19.8346 130.753 19.5697L131.129 17.2712C131.143 17.1598 131.192 17.0692 131.276 16.9995C131.359 16.9299 131.464 16.8843 131.589 16.8634C131.715 16.8427 131.833 16.8323 131.944 16.8323C132.056 16.8323 132.188 16.8394 132.342 16.8532C132.495 16.8671 132.592 16.8739 132.634 16.8739C133.832 16.8739 134.772 16.5364 135.455 15.8605C136.138 15.1849 136.479 14.2482 136.479 13.0499C136.479 12.228 136.211 11.6325 135.675 11.2631ZM133.951 13.8231C133.881 14.3108 133.7 14.631 133.407 14.7843C133.115 14.9378 132.697 15.0141 132.154 15.0141L131.464 15.035L131.819 12.7991C131.847 12.646 131.938 12.5693 132.091 12.5693H132.488C133.045 12.5693 133.449 12.6496 133.7 12.8095C133.951 12.9698 134.034 13.3078 133.951 13.8231ZM170.959 10.7095H169.412C169.259 10.7095 169.168 10.7861 169.141 10.9394L167.782 19.6324L167.761 19.6741C167.761 19.7441 167.789 19.81 167.845 19.8727C167.9 19.9353 167.97 19.9667 168.054 19.9667H169.433C169.698 19.9667 169.844 19.8346 169.872 19.5697L171.23 11.0228V11.002C171.23 10.807 171.14 10.7095 170.959 10.7095ZM152.277 14.0737C152.277 14.0042 152.249 13.9379 152.194 13.8753C152.138 13.8127 152.075 13.7811 152.005 13.7811H150.396C150.243 13.7811 150.118 13.8512 150.02 13.9901L147.805 17.2501L146.886 14.1156C146.816 13.8929 146.663 13.7811 146.426 13.7811H144.859C144.789 13.7811 144.726 13.8126 144.671 13.8753C144.615 13.9379 144.587 14.0043 144.587 14.0737C144.587 14.1018 144.723 14.5125 144.995 15.3066C145.266 16.1009 145.559 16.9576 145.872 17.8772C146.186 18.7965 146.349 19.2843 146.363 19.3397C145.221 20.9001 144.65 21.736 144.65 21.8473C144.65 22.0285 144.74 22.119 144.921 22.119H146.53C146.684 22.119 146.809 22.0495 146.907 21.9101L152.235 14.22C152.263 14.1923 152.277 14.1438 152.277 14.0737ZM167.26 13.7811H165.672C165.476 13.7811 165.358 14.0111 165.317 14.4709C164.954 13.9138 164.293 13.6349 163.331 13.6349C162.328 13.6349 161.475 14.0111 160.772 14.7634C160.068 15.5157 159.716 16.4005 159.716 17.4173C159.716 18.2394 159.957 18.8941 160.437 19.3815C160.918 19.8695 161.562 20.1129 162.37 20.1129C162.774 20.1129 163.185 20.0292 163.603 19.8622C164.021 19.695 164.348 19.4722 164.585 19.1935C164.585 19.2075 164.571 19.2701 164.543 19.3815C164.515 19.4931 164.502 19.5769 164.502 19.6322C164.502 19.8554 164.592 19.9665 164.773 19.9665H166.215C166.48 19.9665 166.633 19.8345 166.675 19.5696L167.532 14.1155C167.545 14.0319 167.524 13.9554 167.469 13.8857C167.413 13.8161 167.344 13.7811 167.26 13.7811ZM164.533 17.8979C164.178 18.2462 163.749 18.4203 163.248 18.4203C162.844 18.4203 162.517 18.309 162.266 18.086C162.015 17.8634 161.889 17.5569 161.889 17.1665C161.889 16.6514 162.064 16.2157 162.412 15.8605C162.76 15.5052 163.192 15.3276 163.708 15.3276C164.097 15.3276 164.421 15.4426 164.679 15.6723C164.937 15.9023 165.066 16.2193 165.066 16.6233C165.066 17.1248 164.888 17.5498 164.533 17.8979ZM143.521 13.7811H141.933C141.738 13.7811 141.62 14.0111 141.578 14.4709C141.202 13.9138 140.54 13.6349 139.593 13.6349C138.59 13.6349 137.736 14.0111 137.033 14.7634C136.329 15.5157 135.978 16.4005 135.978 17.4173C135.978 18.2394 136.218 18.8941 136.699 19.3815C137.179 19.8695 137.823 20.1129 138.631 20.1129C139.021 20.1129 139.426 20.0292 139.843 19.8622C140.261 19.695 140.596 19.4722 140.847 19.1935C140.791 19.3606 140.763 19.507 140.763 19.6322C140.763 19.8554 140.853 19.9665 141.035 19.9665H142.476C142.741 19.9665 142.894 19.8345 142.936 19.5696L143.793 14.1155C143.807 14.0319 143.786 13.9554 143.73 13.8857C143.674 13.8161 143.605 13.7811 143.521 13.7811ZM140.794 17.9083C140.439 18.25 140.003 18.4203 139.488 18.4203C139.084 18.4203 138.76 18.309 138.517 18.086C138.273 17.8634 138.151 17.5569 138.151 17.1665C138.151 16.6514 138.325 16.2157 138.673 15.8605C139.021 15.5052 139.453 15.3276 139.969 15.3276C140.359 15.3276 140.683 15.4426 140.941 15.6723C141.198 15.9023 141.327 16.2193 141.327 16.6233C141.327 17.1388 141.15 17.5673 140.794 17.9083ZM159.413 11.2631C158.877 10.8943 158.177 10.7095 157.313 10.7095H153.991C153.712 10.7095 153.558 10.8419 153.531 11.1064L152.173 19.6323C152.159 19.716 152.179 19.7926 152.235 19.8622C152.291 19.932 152.361 19.9667 152.444 19.9667H154.158C154.325 19.9667 154.436 19.8762 154.492 19.6951L154.868 17.2712C154.882 17.1598 154.931 17.0692 155.014 16.9995C155.098 16.9299 155.202 16.8843 155.328 16.8634C155.453 16.8427 155.571 16.8323 155.683 16.8323C155.794 16.8323 155.927 16.8394 156.08 16.8532C156.233 16.8671 156.331 16.8739 156.373 16.8739C157.571 16.8739 158.511 16.5364 159.194 15.8605C159.876 15.1849 160.218 14.2482 160.218 13.0499C160.218 12.228 159.949 11.6325 159.413 11.2631ZM157.271 14.7007C156.965 14.9097 156.505 15.0141 155.892 15.0141L155.223 15.035L155.579 12.799C155.606 12.6459 155.697 12.5692 155.85 12.5692H156.226C156.533 12.5692 156.777 12.5832 156.958 12.6109C157.139 12.639 157.313 12.7259 157.48 12.8721C157.648 13.0184 157.731 13.231 157.731 13.5095C157.731 14.0947 157.578 14.4916 157.271 14.7007Z" fill="#A7A7A7" />
				</svg>
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