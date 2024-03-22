/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
	initMenuCollapse();
	initHeroMarqueeSwiper();
	initTileSwipers();
	initDropdowns();
});

function initMenuCollapse() {
	const toggleBtn = document.querySelector('[data-js="nav-toggle"]');
	const menuContainer = document.querySelector('[data-js="nav-container"]');

	let menuExpanded = toggleBtn.getAttribute('aria-expanded') === 'true' || false;

	toggleBtn.addEventListener('click', function () {
		toggleDropdown(!menuExpanded, toggleBtn, menuContainer);
		menuExpanded = !menuExpanded;
	});

	window.addEventListener('resize', () => {
		if (window.innerWidth >= 768) {
			toggleDropdown(false, toggleBtn, menuContainer);
		}
	});
}

function initHeroMarqueeSwiper(){
	const swiperContainer = document.querySelector('[data-js="swiper-hero-marquee"]')
	if (swiperContainer) {
		new Swiper(swiperContainer,{
			modules:[Autoplay],
			spaceBetween: 0,
			speed: 12000,
			autoplay: {
			  delay: 1,
			},
			loop: true,
			slidesPerView:'auto',
			allowTouchMove: false,
			disableOnInteraction: true
		})
	}
}

function initTileSwipers(){
	const swiperContainers = document.querySelectorAll('[data-js="swiper-tiles-mobile"]')
	swiperContainers.forEach(el => {
		new Swiper(el,{
			spaceBetween: 20,
			slidesPerView: 1.2,
			enabled: true,
			breakpoints:{
				560:{
					slidesPerView: 1.5,
					spaceBetween: 20,
					enabled: true,
				},
				768:{
					slidesPerView: 2.2,
					spaceBetween: 25,
					enabled: true,
				},
				1000:{
					slidesPerView: 2.5,
					spaceBetween: 35,
					enabled: true,
				},
				1280:{
					slidesPerView: 'auto',
					spaceBetween: 0,
					enabled: false,
				},
			}
		})
	})
}

function initDropdowns(){
	const dropdowns = document.querySelectorAll('[data-js="dropdown"]');
	if (dropdowns.length) {
		dropdowns.forEach(dropdown => {
			const toggler = dropdown.querySelector('[data-js="dropdown-toggle"]')
			const container = dropdown.querySelector('[data-js="dropdown-container"]')
			if (!toggler || !container ) return
			
			let dropdownExpanded = toggler.getAttribute('aria-expanded') === 'true' || false;
			if (dropdownExpanded) toggleDropdown(true,toggler,container)

			toggler.addEventListener('click', function () {
				toggleDropdown(!dropdownExpanded,toggler,container);
				dropdownExpanded = !dropdownExpanded;
			});
		
			window.addEventListener('resize', () => {
				toggleDropdown(dropdownExpanded,toggler,container);
			});
		})
	}
}

function toggleDropdown(expanded,btn,container) {
	btn.setAttribute('aria-expanded', expanded);
	if (expanded) {
		container.style.height = container.scrollHeight + 'px';
	} else {
		container.style.removeProperty('height');
	}
}