/*
Text Domain: smoothh
*/

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
import { Autoplay, Navigation } from 'swiper/modules';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Fuse from 'fuse.js';
import SlimSelect from 'slim-select';
import { CountUp } from 'countup.js';

AOS.init();
AOS.init({
	disable: false,
	startEvent: 'DOMContentLoaded',
	initClassName: 'aos-init',
	animatedClassName: 'aos-animate',
	useClassNames: false,
	disableMutationObserver: false,
	debounceDelay: 50,
	throttleDelay: 99,

	offset: 200,
	delay: 0,
	duration: 400,
	easing: 'ease',
	once: true,
	mirror: false,
	anchorPlacement: 'top-bottom',
});

document.addEventListener('DOMContentLoaded', () => {
	initMenuCollapse();
	initHeroMarqueeSwiper();
	initMobileSwipers();
	initMobileNarrowSwipers();
	initLogosSwipers();
	initDefaultSwipers();
	initWideSwipers();
	initIconsSwipers();
	initDropdowns();
	initCvFileLabelText();
	initRelatedPosts();
	initCart();
	initPopups();
	initProdSelectStyles();
	initCalculatorFields();
	initProdSelectRedirect();
	initInputsValidation();
	registerClientFieldsToggle();
	initJobListing();
	initCounter();
	initCalculator();
	initFloatingNavBar();
	initMenuSubmenus();
});

function initMenuCollapse() {
	const toggleBtn = document.querySelector('[data-js="nav-toggle"]');
	const menuContainer = document.querySelector('[data-js="nav-container"]');

	let menuExpanded =
		toggleBtn.getAttribute('aria-expanded') === 'true' || false;

	toggleBtn.addEventListener('click', function () {
		// toggleDropdown(!menuExpanded, toggleBtn, menuContainer);

		menuExpanded = !menuExpanded;
		if (menuExpanded) {
			toggleBtn.setAttribute('aria-expanded', true);
			menuContainer.style.height = `calc(100dvh - ${menuContainer.offsetTop}px)`;
			document.body.classList.add('overflow-hidden');
		} else {
			toggleBtn.setAttribute('aria-expanded', false);
			menuContainer.style.height = 0;
			document.body.classList.remove('overflow-hidden');
		}
	});

	window.addEventListener('resize', () => {
		if (window.innerWidth >= 1180) {
			toggleBtn.setAttribute('aria-expanded', false);
			menuContainer.style.removeProperty('height');
			document.body.classList.remove('overflow-hidden');
		}
	});
}

function initHeroMarqueeSwiper() {
	const swiperContainer = document.querySelector(
		'[data-js="swiper-hero-marquee"]'
	);
	if (swiperContainer) {
		new Swiper(swiperContainer, {
			modules: [Autoplay],
			spaceBetween: 0,
			speed: 12000,
			autoplay: {
				delay: 1,
			},
			loop: true,
			slidesPerView: 'auto',
			allowTouchMove: false,
			disableOnInteraction: true,
		});
	}
}

function initMobileSwipers() {
	const swiperContainers = document.querySelectorAll(
		'[data-js="swiper-tiles-mobile"]'
	);
	swiperContainers.forEach((el) => {
		new Swiper(el, {
			spaceBetween: 20,
			slidesPerView: 1.2,
			enabled: true,
			breakpoints: {
				560: {
					slidesPerView: 1.5,
					spaceBetween: 20,
					enabled: true,
				},
				768: {
					slidesPerView: 2.2,
					spaceBetween: 25,
					enabled: true,
				},
				1000: {
					slidesPerView: 2.5,
					spaceBetween: 35,
					enabled: true,
				},
				1280: {
					slidesPerView: 'auto',
					spaceBetween: 0,
					enabled: false,
				},
			},
		});
	});
}
function initMobileNarrowSwipers() {
	const swiperContainers = document.querySelectorAll(
		'[data-js="swiper-tiles-mobile-narrow"]'
	);
	swiperContainers.forEach((el) => {
		new Swiper(el, {
			spaceBetween: 20,
			slidesPerView: 1.4,
			enabled: true,
			breakpoints: {
				560: {
					slidesPerView: 2.5,
					spaceBetween: 20,
					enabled: true,
				},
				// 768: {
				// 	slidesPerView: 3.5,
				// 	spaceBetween: 20,
				// 	enabled: true,
				// },
				// 1000: {
				// 	slidesPerView: 4.5,
				// 	spaceBetween: 20,
				// 	enabled: true,
				// },
				1380: {
					slidesPerView: 'auto',
					spaceBetween: 0,
					enabled: false,
				},
			},
		});
	});
}

function initDefaultSwipers() {
	const swiperContainers = document.querySelectorAll(
		'[data-js="swiper-tiles-default"]'
	);
	swiperContainers.forEach((el) => {
		new Swiper(el, {
			spaceBetween: 20,
			slidesPerView: 1.2,
			modules: [Navigation],
			watchSlidesProgress: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},

			breakpoints: {
				560: {
					slidesPerView: 1.5,
					spaceBetween: 20,
				},
				768: {
					slidesPerView: 2.2,
					spaceBetween: 25,
				},
				1180: {
					slidesPerView: 2.5,
					spaceBetween: 35,
				},
				1380: {
					slidesPerView: 3.2,
					spaceBetween: 40,
				},
			},
		});
	});
}

function initIconsSwipers() {
	const swiperContainers = document.querySelectorAll(
		'[data-js="swiper-tiles-icons"]'
	);
	swiperContainers.forEach((el) => {
		new Swiper(el, {
			spaceBetween: 20,
			slidesPerView: 1.2,
			modules: [Navigation],
			watchSlidesProgress: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},

			breakpoints: {
				560: {
					slidesPerView: 1.5,
					spaceBetween: 20,
				},
				768: {
					slidesPerView: 2.2,
					spaceBetween: 25,
				},
				1180: {
					slidesPerView: 2.5,
					spaceBetween: 20,
				},
				1380: {
					slidesPerView: 4,
					spaceBetween: 20,
				},
			},
		});
	});
}

function initWideSwipers() {
	const swiperContainers = document.querySelectorAll(
		'[data-js="swiper-tiles-wide"]'
	);
	swiperContainers.forEach((el) => {
		new Swiper(el, {
			spaceBetween: 20,
			slidesPerView: 1.2,
			modules: [Navigation],
			watchSlidesProgress: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},

			breakpoints: {
				768: {
					slidesPerView: 1.5,
					spaceBetween: 25,
				},
				1280: {
					slidesPerView: 2.5,
					spaceBetween: 60,
				},
			},
		});
	});
}

function initLogosSwipers() {
	const swiperContainers = document.querySelectorAll(
		'[data-js="swiper-logos"]'
	);
	swiperContainers.forEach((el) => {
		new Swiper(el, {
			spaceBetween: 20,
			slidesPerView: 2.5,
			modules: [Navigation, Autoplay],
			autoplay: true,
			watchSlidesProgress: true,
			speed: 600,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			breakpoints: {
				560: {
					slidesPerView: 2.5,
					spaceBetween: 20,
				},
				768: {
					slidesPerView: 3.5,
					spaceBetween: 20,
				},
				1000: {
					slidesPerView: 5.2,
					spaceBetween: 20,
				},
				1280: {
					slidesPerView: 6,
					spaceBetween: 40,
				},
			},
		});
	});
}

function initDropdowns() {
	const dropdowns = document.querySelectorAll('[data-js="dropdown"]');
	if (dropdowns.length) {
		dropdowns.forEach((dropdown) => {
			const toggler = dropdown.querySelector(
				'[data-js="dropdown-toggle"]'
			);
			const container = dropdown.querySelector(
				'[data-js="dropdown-container"]'
			);
			if (!toggler || !container) return;

			let dropdownExpanded =
				toggler.getAttribute('aria-expanded') === 'true' || false;
			if (dropdownExpanded) toggleDropdown(true, toggler, container);

			toggler.addEventListener('click', function () {
				toggleDropdown(!dropdownExpanded, toggler, container);
				dropdownExpanded = !dropdownExpanded;
			});

			window.addEventListener('resize', () => {
				toggleDropdown(dropdownExpanded, toggler, container);
			});
		});
	}
}

function toggleDropdown(expanded, btn, container) {
	btn.setAttribute('aria-expanded', expanded);
	if (expanded) {
		container.style.height = container.scrollHeight + 'px';
	} else {
		container.style.removeProperty('height');
	}
}

function initCvFileLabelText() {
	const labelEl = document.querySelector('[data-js="cv-file"]');
	const inputEl = document.querySelector('input#your-file');
	if (!labelEl || !inputEl) return;

	const textEl = labelEl.querySelector('[data-js="cv-file-name"]');
	const labelBtn = document.querySelector('[data-js="cv-file-icon"]');
	inputEl.addEventListener('change', (e) => {
		const file = e.target.files[0];
		if (file) {
			textEl.innerText = file.name;
			labelBtn.classList.add('hidden');
		} else {
			textEl.innerText = translations['Include CV'] ?? 'Include CV*';
			labelBtn.classList.remove('hidden');
		}
	});
}

function initRelatedPosts() {
	const container = document.getElementById('posts-related');
	if (!container) return;

	const tabButtons = document.querySelectorAll('[data-js-tab-btn]');
	const tabs = Array.from(tabButtons).reduce((acc, val) => {
		const id = val.dataset.jsTabBtn;
		const contentEl = document.querySelector(
			`[data-js="tab-content-${id}"]`
		);
		const loadMoreBtn = document.querySelector(
			`[data-js="tab-loadmore-${id}"]`
		);
		const loaderEl = document.querySelector(`[data-js="tab-loader-${id}"]`);
		const postCount = contentEl.querySelectorAll('.post-tile').length;
		return {
			...acc,
			[id]: {
				id: id,
				tabBtn: val,
				contentEl: contentEl,
				contentUlEl: contentEl.querySelector('ul'),
				loaderEl: loaderEl,
				loadMoreBtn: loadMoreBtn,
				postCount: postCount,
				page: postCount > 0 ? 1 : 0,
			},
		};
	}, {});

	Object.values(tabs).forEach((tab) => {
		tab.tabBtn.addEventListener('click', async () => {
			Object.values(tabs).forEach((tab) => {
				tab.tabBtn.classList.remove('active');
				tab.contentEl.classList.add('hidden');
			});

			tab.tabBtn.classList.add('active');
			tab.contentEl.classList.remove('hidden');
			if (tab.postCount == 0) {
				loadMore(tab);
			}
		});

		tab.loadMoreBtn.addEventListener('click', () => loadMore(tab));
	});

	const urlParams = new URLSearchParams(window.location.search);
	const catSlug = urlParams.get('tab');
	if (!catSlug) return;
	switchTabBySlug(catSlug, tabButtons, container);
}

function switchTabBySlug(slug, buttons, container) {
	if (slug.endsWith('/')) {
		slug = slug.slice(0, -1);
	}

	const tabBtn = Object.values(buttons).find(
		(btn) => btn.dataset.jsTabSlug === slug
	);
	if (tabBtn) {
		tabBtn.click();
		const yOffset = container.offsetTop - 100;
		window.scrollTo({ top: yOffset, behavior: 'smooth' });
	}
}

async function loadMore(tab) {
	const currentPostEl = document.querySelector('[data-js-post-id]');
	let currentPostId = '';
	if (currentPostEl) {
		currentPostId = currentPostEl.dataset.jsPostId;
	}
	tab.loaderEl.classList.remove('hidden');
	tab.loadMoreBtn.setAttribute('disabled', true);
	const postsData = await loadPosts(tab.id, ++tab.page, currentPostId);
	if (postsData.posts) {
		let postsList = postsData.posts;
		insertPosts(tab.contentUlEl, postsList);
		tab.postCount += postsList.length;

		if (postsData.totalPages > tab.page) {
			tab.loadMoreBtn.classList.remove('!hidden');
		} else {
			tab.loadMoreBtn.classList.add('!hidden');
		}
	}
	tab.loaderEl.classList.add('hidden');
	tab.loadMoreBtn.removeAttribute('disabled');
}

async function loadPosts(catId, page, exclude = '') {
	const perPage = 6;
	const baseUrl = 'https://smoothh.domain.org.pl/wp-json/wp/v2/posts';
	const params = `/?_fields=excerpt,title,link,featured_media,fimg_url&categories=${catId}&exclude=${exclude}&per_page=${perPage}&page=${page}`;
	const url = baseUrl + params;

	try {
		const response = await fetch(url);
		if (!response.ok) {
			throw new Error('Failed to fetch data');
		}
		const totalPages = response.headers.get('X-WP-TotalPages');
		const data = await response.json();
		return { posts: data, totalPages: totalPages };
	} catch (error) {
		console.error('Error fetching posts:', error.message);
		return { posts: null, totalPages: null };
	}
}

function insertPosts(container, posts) {
	let combinedHTML = '';
	posts.forEach((post) => {
		combinedHTML += `<li class="post-tile">
			<a href="${post.link}">
				<img src="${post.fimg_url || ''}" alt="${post.title.rendered}">
				<h3>${post.title.rendered}</h3>
				${post.excerpt.rendered}
				<span>${translations['Read more'] ?? 'Read more'}</span>
			</a>
		</li>`;
	});
	container.insertAdjacentHTML('beforeend', combinedHTML);
}

function initQtyInputs() {
	const qtyWrappers = document.querySelectorAll('[data-js="qty-control"]');
	qtyWrappers.forEach((wrapper) => {
		const inputField = wrapper.querySelector('input.qty');
		const upBtn = wrapper.querySelector('[data-js="up"]');
		const downBtn = wrapper.querySelector('[data-js="down"]');

		if (!inputField || !upBtn || !downBtn) return;

		upBtn.addEventListener('click', () => {
			let currentValue = parseInt(inputField.value);
			let maxValue = parseInt(inputField.max) || Infinity;

			if (currentValue < maxValue) {
				inputField.value = currentValue + 1;
				inputField.dispatchEvent(
					new Event('change', { bubbles: true })
				);
			}
		});
		downBtn.addEventListener('click', () => {
			let currentValue = parseInt(inputField.value);
			let minValue = parseInt(inputField.min) || 0;

			if (currentValue > minValue) {
				inputField.value = currentValue - 1;
				inputField.dispatchEvent(
					new Event('change', { bubbles: true })
				);
			}
		});
	});
}

function initCartUpdate() {
	const DELAY = 400;
	const cartForm = document.querySelector('form.woocommerce-cart-form');
	const updateBtn = document.querySelector('button[name="update_cart"]');

	if (!cartForm || !updateBtn) return;

	let timeout;

	cartForm.addEventListener('change', (e) => {
		if (e.target.matches('input.qty')) {
			if (timeout !== undefined) {
				clearTimeout(timeout);
			}
			timeout = setTimeout(() => {
				updateBtn.click();
			}, DELAY);
		}
	});
}

function initCart() {
	initQtyInputs();
	initCartUpdate();

	if (typeof jQuery !== 'undefined') {
		jQuery(document.body).on(
			'removed_from_cart updated_cart_totals',
			() => {
				initQtyInputs();
				initCartUpdate();
				jQuery(document.body).trigger('wc_fragment_refresh');
			}
		);
	}
}

function initPopups() {
	const togglers = document.querySelectorAll('[data-js-popup-toggle]');
	togglers.forEach((toggle) => {
		toggle.addEventListener('click', () => {
			const popupContainerName = toggle.dataset.jsPopupToggle;
			if (!popupContainerName) return;

			const popupContainer = document.querySelector(
				`[data-js-popup-container='${popupContainerName}']`
			);
			if (!popupContainer) return;

			popupContainer.classList.toggle('popup-hidden');
		});
	});
}

function initProdSelectStyles() {
	const customProdSelect = document.querySelector('.dropdown-custom');
	const options = {
		select: customProdSelect,
		settings: {
			showSearch: false,
		},
		events: {
			afterChange: () => {
				let changeEvent = new Event('change', { bubbles: true });
				customProdSelect.dispatchEvent(changeEvent);
			},
		},
	};
	new SlimSelect(options);
}

function initCalculatorFields() {
	const simpleSelectFields = document.querySelectorAll(
		`[data-uniqid="6662fcfdc3d441.95856961"] select,
		[data-uniqid="6662fdb4c3d466.61257484"] select,
		[data-uniqid="666febd02fcf31.57374088"] select,
		[data-uniqid="666febd02fcf64.88984826"] select,
		[data-uniqid="667024ab7bd120.95046821"] select,
		[data-uniqid="667026ee7bd1f5.04499964"] select,
		[data-uniqid="66702e257bd420.53200121"] select`
	);

	simpleSelectFields.forEach((fieldEl) => {
		const options = {
			select: fieldEl,
			settings: {
				showSearch: false,
				placeholderText: fieldEl.dataset.placeholder
					? fieldEl.dataset.placeholder
					: '',
			},
			events: {
				afterChange: () => {
					let changeEvent = new Event('change', { bubbles: true });
					fieldEl.dispatchEvent(changeEvent);
				},
			},
		};
		new SlimSelect(options);
	});

	const searchSelectFields = document.querySelectorAll(
		`[data-uniqid="6662fc70c3d429.14367225"] select,
		[data-uniqid="666febd02fcf49.12361043"] select`
	);
	searchSelectFields.forEach((fieldEl) => {
		const options = {
			select: fieldEl,
			settings: {
				showSearch: true,
			},
			events: {
				afterChange: () => {
					let changeEvent = new Event('change', { bubbles: true });
					fieldEl.dispatchEvent(changeEvent);
				},
			},
		};
		new SlimSelect(options);
	});
}

function initProdSelectRedirect() {
	const select = document.getElementById('product-select-from-cat');
	if (!select) return;
	select.addEventListener('change', (e) => {
		window.location.href = e.target.value;
	});
}

function initInputsValidation() {
	const inputs = document.querySelectorAll(
		'.smoothh-inputs-validation input'
	);
	if (inputs.length < 1) return;

	inputs.forEach((input) => {
		input.addEventListener('change', () => {
			if (!input.checkValidity()) {
				input.classList.add('input-invalid');

				let validationMessage = input.validationMessage;

				if (
					input.name == 'billing_company_nip' ||
					input.name == 'shipping_company_nip'
				) {
					validationMessage = input.title;
				}

				if (validationMessage) {
					const errorEl =
						input.parentElement.querySelector('.input-error');
					if (errorEl) {
						errorEl.innerText = validationMessage;
					} else {
						const errorElHTML = `<span class='input-error'>${validationMessage}</span>`;
						input.insertAdjacentHTML('afterend', errorElHTML);
					}
				}
			}
		});

		input.addEventListener('input', () => {
			if (input.checkValidity()) {
				input.classList.remove('input-invalid');
				const errorEl =
					input.parentElement.querySelector('.input-error');
				if (errorEl) errorEl.remove();
			}
		});
	});
}

function registerClientFieldsToggle() {
	const registerForm = document.querySelector('.woocommerce-form-register');
	if (!registerForm) return;

	const hiddenContainer = document.querySelector('[data-js="hidden-inputs"]');
	const accountTypeRadios = registerForm.querySelectorAll(
		'input[name="account_type"]'
	);
	const clientInputs = {
		billing_company_field: registerForm.querySelector(
			'input[name="billing_company"]'
		),
		billing_company_nip_field: registerForm.querySelector(
			'input[name="billing_company_nip"]'
		),
	};

	toggleFieldsPlacement(false);
	accountTypeRadios.forEach(function (radio) {
		radio.addEventListener('change', function () {
			let value = document.querySelector(
				'input[name="account_type"]:checked'
			).value;
			toggleFieldsPlacement(value == 'client');
		});
	});

	function toggleFieldsPlacement(visible) {
		for (const fieldId in clientInputs) {
			const formFieldWrapper = registerForm.querySelector(
				`#${fieldId} .woocommerce-input-wrapper`
			);
			if (visible) {
				formFieldWrapper.parentElement.classList.remove('hidden');
				formFieldWrapper.appendChild(clientInputs[fieldId]);
			} else {
				formFieldWrapper.parentElement.classList.add('hidden');
				hiddenContainer.appendChild(clientInputs[fieldId]);
			}
		}
	}
}

async function initJobListing() {
	const container = document.querySelector('[data-js-jobs="container"]');
	if (!container) return;
	const loader = document.querySelector('[data-js-jobs="loader"]');
	const itemsPerPage = 6;

	const endpointUrl = container.dataset.jsEndpoint;
	const jobsDataRaw = await fetchJobs(endpointUrl);
	loader.classList.add('hidden');

	setupListingElements(jobsDataRaw, itemsPerPage);
}

function setupListingElements(data, itemsPerPage) {
	const searchbarEl = document.querySelector('[data-js-jobs="searchbar"]');
	const listEmptyEl = document.querySelector('[data-js-jobs="empty"]');

	if (data.length > 0) {
		const { categories, filters, offers } = formatJobsData(data);

		createCategoriesEl(categories);
		createFiltersEl(filters);
		createFilteredOffers(offers, itemsPerPage);
		initSearchEvents(offers, itemsPerPage);

		searchbarEl.classList.remove('!hidden');
	} else {
		listEmptyEl.classList.remove('hidden');
	}
}

function initSearchEvents(offers, itemsPerPage) {
	const searchbarForm = document.querySelector('[data-js-jobs="searchbar"]');
	searchbarForm.addEventListener('submit', (event) => {
		event.preventDefault();
		createFilteredOffers(offers, itemsPerPage);
	});

	const filterInputs = document.querySelectorAll(
		'[data-js-jobs="categories"] input,[data-js-jobs="filters"] input'
	);
	filterInputs.forEach((input) => {
		input.addEventListener('change', () => {
			createFilteredOffers(offers, itemsPerPage);
		});
	});

	const loadMoreBtn = document.querySelector('[data-js-jobs="load-more"]');
	loadMoreBtn.addEventListener('click', () => showMoreJobs(itemsPerPage));
}

function createFilteredOffers(offers, itemsPerPage) {
	const searchInput = document.querySelector(
		'[data-js-jobs="searchbar"] input'
	).value;
	const selectedCategory = document.querySelector(
		'[data-js-jobs="categories"] input:checked'
	).value;
	const filterInputs = document.querySelectorAll(
		'[data-js-jobs="filters"] input:checked'
	);
	let selectedFilters = [];
	for (var i = 0; i < filterInputs.length; i++) {
		if (filterInputs[i].checked) {
			selectedFilters.push(filterInputs[i].value);
		}
	}

	let filteredOffers = offers.filter(
		(offer) =>
			offer.category.includes(selectedCategory) &&
			(selectedFilters.some((filter) =>
				[offer.type].flat(2).includes(filter)
			) ||
				selectedFilters.length === 0 ||
				(offer.topOffer &&
					selectedFilters.includes(
						translations['#TOPoffer'] ?? '#TOPoffer'
					)))
	);

	if (searchInput.length >= 2) {
		const fuseOptions = {
			keys: ['name', 'location', 'type', 'category', 'details'],
		};
		const fuse = new Fuse(filteredOffers, fuseOptions);
		filteredOffers = fuse.search(searchInput).map((obj) => obj.item);
	}

	createOffersItems(filteredOffers, itemsPerPage);
}

function createCategoriesEl(categories) {
	const categoriesEl = document.querySelector('[data-js-jobs="categories"]');
	let inputsHtml = '';
	for (let i = 0; i < categories.length; i++) {
		const value = categories[i];
		let checkedAttr = i == 0 ? 'checked' : '';
		inputsHtml += `<label><input type="radio" name="category" value="${value}" ${checkedAttr}><span>${value}</span></label>`;
	}
	categoriesEl.innerHTML = inputsHtml;
	categoriesEl.classList.remove('!hidden');
}
function createFiltersEl(filters) {
	const filtersEl = document.querySelector('[data-js-jobs="filters"]');
	let inputsHtml = '';
	for (const value of filters) {
		inputsHtml += `<label><input type="checkbox" value="${value}">${value}</label>`;
	}
	filtersEl.innerHTML = inputsHtml;
	filtersEl.classList.remove('!hidden');
}

function createOffersItems(offers, itemsPerPage) {
	const loadMoreBtn = document.querySelector('[data-js-jobs="load-more"]');
	const listEmptyEl = document.querySelector('[data-js-jobs="empty"]');
	const listEl = document.querySelector('[data-js-jobs="list"]');

	const now = new Date();
	const sevenDaysAgo = new Date(now);
	sevenDaysAgo.setDate(now.getDate() - 7);

	let itemsHtml = '';
	for (let i = 0; i < offers.length; i++) {
		const offer = offers[i];
		let isHidden = i >= itemsPerPage;
		itemsHtml += `
		<li class="job-offer-tile" data-js-job-hidden="${isHidden}">
			<a href="${offer.url}" target="_blank">
				<div class="offer-wrapper">
				${offer.date > sevenDaysAgo ? `<span class="offer-new">${translations['New'] ?? 'New'}</span>` : ''}
					<div>
						<h3 class="offer-title">${offer.name}</h3>
					</div>
					<span class="offer-location">${offer.location}</span>
				</div>
				<div class="offer-date-wrapper">
					<span class="offer-date">${offer.date.toLocaleDateString()}</span>
				</div>
			</a>
		</li>
		`;
	}
	listEl.innerHTML = itemsHtml;

	if (offers.length == 0) {
		listEmptyEl.classList.remove('hidden');
		loadMoreBtn.classList.add('!hidden');
	} else {
		listEmptyEl.classList.add('hidden');
		if (offers.length > itemsPerPage) {
			loadMoreBtn.classList.remove('!hidden');
		}
	}
}

function showMoreJobs(itemsPerPage) {
	const loadMoreBtn = document.querySelector('[data-js-jobs="load-more"]');
	const hiddenTiles = document.querySelectorAll(
		'[data-js-job-hidden="true"]'
	);

	for (let i = 0; i < Math.min(itemsPerPage, hiddenTiles.length); i++) {
		const tile = hiddenTiles[i];
		tile.dataset.jsJobHidden = false;
	}

	if (hiddenTiles.length - itemsPerPage < 0) {
		loadMoreBtn.classList.add('!hidden');
	}
}

async function fetchJobs(url) {
	try {
		const response = await fetch(url);
		if (!response.ok) {
			throw new Error('Failed to fetch data');
		}
		const data = await response.json();
		return data;
	} catch (error) {
		console.error('Error fetching posts:', error.message);
		return [];
	}
}

function formatJobsData(rawJobsData) {
	const categories = [
		...new Set(
			rawJobsData
				.map((offer) => offer.options.branches)
				.flat()
				.filter((item) => item !== undefined)
		),
	];
	categories.push(translations['All'] ?? 'All');
	const filters = [
		...new Set(
			rawJobsData
				.map((offer) => offer.options.job_type)
				.flat()
				.filter((item) => item !== undefined)
		),
	];
	filters.push(translations['#TOPoffer'] ?? '#TOPoffer');
	const offers = rawJobsData.map((offer) => {
		return {
			url: offer.url,
			name: offer.advert.name,
			details: offer.advert.values.find(
				(field) => field.field_id == 'description'
			),
			location: formatLocation(
				offer.advert.values.find(
					(field) => field.field_id == 'geolocation'
				)
			),
			date: new Date(offer.valid_start),
			topOffer: offer.awarded,
			category: [offer.options.branches, translations['All'] ?? 'All'],
			type: offer.options.job_type,
		};
	});

	return { categories, filters, offers };

	function formatLocation(location) {
		if (!location) return '';
		const locationParsed = JSON.parse(location.value);
		return locationParsed['region1'] + ' / ' + locationParsed['locality'];
	}
}

function initCounter() {
	let countersQty = document.querySelectorAll('[data-counter-qty]').length;

	for (let i = 1; i <= countersQty; i++) {
		new CountUp(
			`target${i}`,
			+document.querySelector(`[data-counter-target${i}]`).innerHTML,
			{
				separator: ' ',
				duration: 2,
				enableScrollSpy: true,
				scrollSpyOnce: true,
			}
		).start();
	}
}

function initCalculator() {
	if (!document.querySelector('.calculator')) {
		return;
	}

	const tabButtons = document.querySelectorAll('[data-js-calc-tab-btn]');
	const calcTabs = document.querySelectorAll('[data-js-calc-content]');

	tabButtons.forEach((tabBtn) => {
		tabBtn.addEventListener('click', () => {
			tabButtons.forEach((btn) => {
				btn.classList.remove('active');
			});
			calcTabs.forEach((calc) => {
				calc.classList.add('hidden');
			});
			tabBtn.classList.add('active');
			document
				.querySelector(
					`[data-js-calc-content="${tabBtn.dataset.jsCalcTabBtn}"]`
				)
				.classList.remove('hidden');
		});
	});

	calcTabs.forEach((calcEl) => {
		const form = calcEl.querySelector('.calculator-details form');
		if (!form) return;

		const isCalcAdvanced = calcEl.dataset.jsCalcContent == 2;

		const container = calcEl.querySelector('[data-js-calc-container]');
		const calcBtn = calcEl.querySelector('[data-js-calc-btn]');
		const sumEl = calcEl.querySelector(
			!isCalcAdvanced
				? '[data-uniqid="666582c02fa7e2.99896643"] .tc-result'
				: '[data-uniqid="666febd02fcfa6.35759104"] .tc-result'
		);
		// const feeEl = document.querySelector('[data-uniqid="66659bd09aac33.89075695"] .tc-result')

		const tablePrice = calcEl.querySelector('[data-js-calc-price]');
		const tablePriceTaxed = calcEl.querySelector(
			'[data-js-calc-price-taxed]'
		);
		const tableSubtotal = calcEl.querySelector('[data-js-calc-subtotal]');
		const tableSubtotalTaxed = calcEl.querySelector(
			'[data-js-calc-subtotal-taxed]'
		);
		const tableTotal = calcEl.querySelector('[data-js-calc-total]');
		const tableTotalTaxed = calcEl.querySelector(
			'[data-js-calc-total-taxed]'
		);
		// const tableFee = document.querySelector('[data-js-calc-fee]');

		form.addEventListener('change', () => {
			container.classList.add('hidden');
		});

		calcBtn.addEventListener('click', () => {
			jQuery(form).tc_validate().form();
			if (form.checkValidity()) {
				tablePrice.innerHTML =
					tableSubtotal.innerHTML =
					tableTotal.innerHTML =
						stringToPriceFormat(sumEl.innerText);

				const taxEl = calcEl.querySelector(
					'.tm-vat-options-totals .price'
				);
				const priceTaxed =
					parseFloat(sumEl.innerText.replace(',', '.')) +
					parseFloat(taxEl.innerText.replace(',', '.'));

				tablePriceTaxed.innerHTML =
					tableSubtotalTaxed.innerHTML =
					tableTotalTaxed.innerHTML =
						stringToPriceFormat(priceTaxed);

				if (isCalcAdvanced) {
					const MIN_NEGOTIATE_PRICE = 25000;
					const MIN_NEGOTIATE_VACANCY = 3;
					const orderBtn = calcEl.querySelector(
						'.single_add_to_cart_button'
					);
					const positionSelect = calcEl.querySelector(
						'[data-uniqid="666febd02fcf49.12361043"] select'
					);
					const negotiateBtn = calcEl.querySelector(
						'[data-js-popup-toggle="negotiate-form"]'
					);

					const isPositionOther =
						positionSelect.value.startsWith('Inne');
					const priceNegotiable =
						parseFloat(sumEl.innerText.replace(',', '.')) >
						MIN_NEGOTIATE_PRICE;
					const vacancySurpassing =
						calcEl
							.querySelector(
								'[data-uniqid="66702e257bd420.53200121"] select'
							)
							.value.split('_')[0] > MIN_NEGOTIATE_VACANCY;

					orderBtn.disabled = isPositionOther;

					if (priceNegotiable || vacancySurpassing || positionOther) {
						negotiateBtn.classList.remove('!hidden');
						const textArea = document.querySelector(
							'textarea[name="calc-data"]'
						);
						const negotiateForm = document.querySelector(
							'[data-js-popup-container="negotiate-form"] form'
						);
						if (wpcf7) {
							wpcf7.reset(negotiateForm);
						}
						if (textArea) {
							copyFormToTextarea(form, textArea);
						}
					} else {
						negotiateBtn.classList.add('!hidden');
					}
				}

				// tableFee.innerHTML = feeEl.innerHTML
				container.classList.remove('hidden');
				document.querySelector('[data-calc-bg]').style.height = '75%';
			} else {
				container.classList.add('hidden');
			}
		});
	});

	const fileBtn = document.querySelector('[data-js-file-upload-btn]');
	const fileInput = document.querySelector(
		'[data-uniqid="667028857bd280.91689368"] input'
	);
	const fileRemoveBtn = document.querySelector('[data-js-file-remove]');
	const fileNameEl = document.querySelector('[data-js-file-name]');

	fileBtn.addEventListener('click', () => {
		fileInput.click();
	});
	fileRemoveBtn.addEventListener('click', () => {
		fileInput.value = '';
		fileInput.dispatchEvent(new Event('change', { bubbles: true }));
	});
	fileInput.addEventListener('change', (e) => {
		const file = e.target.files[0];
		if (file) {
			fileNameEl.innerText = file.name;
			fileRemoveBtn.classList.remove('!hidden');
			fileBtn.classList.add('!hidden');
		} else {
			fileRemoveBtn.classList.add('!hidden');
			fileBtn.classList.remove('!hidden');
		}
	});

	const selectMainBasic = document.querySelector(
		'[data-uniqid="6662fcfdc3d441.95856961"] select'
	);
	const selectSecondaryBasic = document.querySelector(
		'[data-uniqid="6662fc70c3d429.14367225"] select'
	);

	initDynamicOptions(selectMainBasic, selectSecondaryBasic);

	const selectMainAdvanced = document.querySelector(
		'[data-uniqid="666febd02fcf31.57374088"] select'
	);
	const selectSecondaryAdvanced = document.querySelector(
		'[data-uniqid="666febd02fcf49.12361043"] select'
	);

	initDynamicOptions(selectMainAdvanced, selectSecondaryAdvanced);

	const salaryInput = document.querySelector(
		'[data-uniqid="667029037bd2c3.23900713"] input'
	);
	const salaryDataSelect = document.querySelector(
		'[data-uniqid="66793187083b70.87204096"] select'
	);
	initDynamicSalaryValidation(
		salaryInput,
		selectSecondaryAdvanced,
		salaryDataSelect
	);
}

function initDynamicOptions(selectMain, selectSecondary) {
	const selectMainSlim = selectMain.slim;
	const selectSecondarySlim = selectSecondary.slim;

	const slimData = selectSecondarySlim.getData();
	selectMain.addEventListener('change', () => {
		let value = selectMain.value.split('_')[0];

		const filteredSlimData = slimData.filter(
			(item) =>
				item.data.tmTooltipHtml == value ||
				item.value === '' ||
				value === ''
		);

		const currentSelectedValue = selectSecondarySlim.getSelected();
		const newSelectedValue = filteredSlimData.some(
			(item) => currentSelectedValue.includes(item.value) && value != ''
		)
			? currentSelectedValue
			: '';

		selectSecondarySlim.setData(filteredSlimData);
		selectSecondarySlim.setSelected(newSelectedValue);
	});

	selectSecondary.addEventListener('change', () => {
		secondaryCatValue = selectSecondarySlim
			.getData()
			.find((item) => item.selected).data.tmTooltipHtml;
		catValue =
			selectMainSlim
				.getData()
				.find((item) => item.value.startsWith(`${secondaryCatValue}_`))
				?.value ?? '';
		if (catValue != selectMain.value && catValue != '') {
			selectMainSlim.setSelected(catValue);
		}
	});
}

function initDynamicSalaryValidation(input, minValSelect, dataSelect) {
	minValSelect.addEventListener('change', () => {
		let minValueOption = dataSelect.querySelector(
			`[value="${minValSelect.slim.getSelected()[0]}"]`
		);
		if (minValueOption && minValueOption.dataset.tmTooltipHtml) {
			let minValue = parseFloat(minValueOption.dataset.tmTooltipHtml);
			jQuery(input).tc_rules('add', {
				min: minValue,
				messages: {
					min: 'Proponowane wynagrodzenie jest poniżej wartości oczekiwanych przez kandydatów na tym stanowisku pracy',
				},
			});
		} else {
			jQuery(input).tc_rules('remove', 'min');
		}
	});
}

function copyFormToTextarea(form, textarea) {
	const formData = new FormData(form);
	let textData = '';

	formData.forEach((value, key) => {
		const element = document.querySelector(`[name='${key}']`);
		if (!element) return;

		if (key.startsWith('tmcp') && !key.includes('hidden')) {
			const name = element.dataset.placeholder || element.placeholder;
			let valueFormatted = '';
			if (typeof value == 'object' && key.includes('upload')) {
				valueFormatted = value.name;
				const calcFileInput = document.querySelector(
					'[data-uniqid="667028857bd280.91689368"] input'
				);
				const negotiateFormFileInput = document.querySelector(
					'[data-js-popup-container="negotiate-form"] [name="appended-file"]'
				);
				negotiateFormFileInput.files = calcFileInput.files;
			} else {
				valueFormatted = value == '' ? '-' : value.split('_')[0];
			}

			textData += `${name}: ${valueFormatted} \r\n`;
		}
	});
	textarea.value = textData;
}

function stringToPriceFormat(val) {
	if (typeof val == 'string') {
		val = parseFloat(val.replace(',', '.'));
	}

	return val.toFixed(2).replace('.', ',');
}

function initFloatingNavBar() {
	const siteHeader = document.querySelector('#masthead');
	const siteContent = document.querySelector('#main');
	let siteHeaderHeight = siteHeader.offsetHeight;
	let refOffset = 0;

	const headerAppearsOnScrollUp = () => {
		const newOffset = window.scrollY || window.pageYOffset;

		if (newOffset > siteHeaderHeight) {
			if (newOffset > refOffset) {
				siteHeader.classList.remove('animateIn');
				siteHeader.classList.add('animateOut');
			} else {
				siteHeader.classList.remove('animateOut');
				siteHeader.classList.add('animateIn');
			}
			refOffset = newOffset;
		}
	};

	window.addEventListener('scroll', headerAppearsOnScrollUp, false);
}

function initMenuSubmenus() {
	dropdownIcons = document.querySelectorAll('.menu-item-has-children span');
	dropdownIcons.forEach((item) => {
		item.addEventListener('click', () => {
			const menuItem = item.parentElement.parentElement;
			menuItem.classList.toggle('expanded');
			const subMenu =
				item.parentElement.parentElement.querySelector('.sub-menu');
			if (menuItem.classList.contains('expanded')) {
				subMenu.style.height = subMenu.scrollHeight + 'px';
			} else {
				subMenu.style.height = 0;
			}
		});
	});
}
