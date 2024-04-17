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
import { Autoplay,Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
	initMenuCollapse();
	initHeroMarqueeSwiper();
	initMobileSwipers();
	initMobileNarrowSwipers();
	initLogosSwipers();
	initDefaultSwipers();
	initDropdowns();
	initCvFileLabelText();
	initRelatedPosts();
	initCart();
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

function initMobileSwipers(){
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
function initMobileNarrowSwipers(){
	const swiperContainers = document.querySelectorAll('[data-js="swiper-tiles-mobile-narrow"]')
	swiperContainers.forEach(el => {
		new Swiper(el,{
			spaceBetween: 20,
			slidesPerView: 2.5,
			enabled: true,
			breakpoints:{
				560:{
					slidesPerView: 2.5,
					spaceBetween: 20,
					enabled: true,
				},
				768:{
					slidesPerView: 3.5,
					spaceBetween: 20,
					enabled: true,
				},
				1000:{
					slidesPerView: 4.5,
					spaceBetween: 20,
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


function initDefaultSwipers(){
	const swiperContainers = document.querySelectorAll('[data-js="swiper-tiles-default"]')
	swiperContainers.forEach(el => {
		new Swiper(el,{
			spaceBetween: 20,
			slidesPerView: 1.2,
			modules: [Navigation],
			watchSlidesProgress: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			  },
			  
			breakpoints:{
				560:{
					slidesPerView: 1.5,
					spaceBetween: 20,
				},
				768:{
					slidesPerView: 2.2,
					spaceBetween: 25,
				},
				1000:{
					slidesPerView: 2.5,
					spaceBetween: 35,
				},
				1280:{
					slidesPerView: 3,
					spaceBetween: 90,
				},
			}
		})
	})
}

function initLogosSwipers(){
	const swiperContainers = document.querySelectorAll('[data-js="swiper-logos"]')
	swiperContainers.forEach(el => {
		new Swiper(el,{
			spaceBetween: 20,
			slidesPerView: 2.5,
			modules: [Navigation,Autoplay],
			autoplay: true,
			watchSlidesProgress: true,
			speed: 600,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			  },
			breakpoints:{
				560:{
					slidesPerView: 2.5,
					spaceBetween: 20,
				},
				768:{
					slidesPerView: 3.5,
					spaceBetween: 20,
				},
				1000:{
					slidesPerView: 5.2,
					spaceBetween: 20,
				},
				1280:{
					slidesPerView: 6,
					spaceBetween: 40,
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

function initCvFileLabelText(){
	const labelEl = document.querySelector('[data-js="cv-file"]')
	const inputEl = document.querySelector('input#your-file')
	if (!labelEl || !inputEl) return
	
	const textEl = labelEl.querySelector('[data-js="cv-file-name"]')
	const labelBtn = document.querySelector('[data-js="cv-file-icon"]')
	inputEl.addEventListener('change',(e)=>{
		const file = e.target.files[0]
		if (file) {
			textEl.innerText = file.name
			labelBtn.classList.add('hidden')
		}else{
			textEl.innerText = 'Załącz CV'
			labelBtn.classList.remove('hidden')
		}
	})
}

function initRelatedPosts(){
	const container = document.getElementById('posts-related')
	if (!container) return

	const tabButtons = document.querySelectorAll('[data-js-tab-btn]')
	const tabs = Array.from(tabButtons).reduce((acc,val) => {
		const id = val.dataset.jsTabBtn;
		const contentEl = document.querySelector(`[data-js="tab-content-${id}"]`)
		const loadMoreBtn = document.querySelector(`[data-js="tab-loadmore-${id}"]`)
		const loaderEl = document.querySelector(`[data-js="tab-loader-${id}"]`)
		const postCount = contentEl.querySelectorAll('.post-tile').length
		return ({ ...acc, [id]: {
			id: id,
			tabBtn: val,
			contentEl: contentEl,
			contentUlEl: contentEl.querySelector('ul'),
			loaderEl: loaderEl,
			loadMoreBtn: loadMoreBtn,
			postCount: postCount,
			page: postCount > 0 ? 1 : 0
		}})
	},{})

	Object.values(tabs).forEach(tab => {
		tab.tabBtn.addEventListener('click',async ()=>{
			Object.values(tabs).forEach(tab => {
				tab.tabBtn.classList.remove('active');
				tab.contentEl.classList.add('hidden')
			})

			tab.tabBtn.classList.add('active')
			tab.contentEl.classList.remove('hidden')
			if (tab.postCount == 0) {
				loadMore(tab)
			}
		})

		tab.loadMoreBtn.addEventListener('click',() => loadMore(tab))
	})

	const urlParams = new URLSearchParams(window.location.search)
	const catSlug = urlParams.get('tab')
	if (!catSlug) return
	container.scrollIntoView({behavior:'instant',})
	const yOffset = container.getBoundingClientRect().top + window.scrollY - 200
	window.scrollTo({top: yOffset,behavior:'instant'})
	switchTabBySlug(catSlug,tabButtons)
}

function switchTabBySlug(slug,buttons){

	if (slug.endsWith('/')) {
		slug = slug.slice(0, -1);
	}

	const tabBtn = Object.values(buttons).find(btn => btn.dataset.jsTabSlug === slug)
	tabBtn && tabBtn.click()
	
}

async function loadMore(tab){
	const currentPostEl = document.querySelector('[data-js-post-id]')
	let currentPostId = ''
	if (currentPostEl) {
		currentPostId = currentPostEl.dataset.jsPostId
	}
	tab.loaderEl.classList.remove('hidden')
	tab.loadMoreBtn.setAttribute('disabled',true)
	const postsData = await loadPosts(tab.id,++tab.page,currentPostId)
	if (postsData.posts) {
		let postsList = postsData.posts
		insertPosts(tab.contentUlEl,postsList)
		tab.postCount += postsList.length

		if (postsData.totalPages > tab.page) {
			tab.loadMoreBtn.classList.remove('!hidden')
		}else{
			tab.loadMoreBtn.classList.add('!hidden')
		}
	}
	tab.loaderEl.classList.add('hidden')
	tab.loadMoreBtn.removeAttribute('disabled')

}

async function loadPosts(catId,page,exclude=''){
	const perPage = 6
	const baseUrl = 'https://smoothh.domain.org.pl/wp-json/wp/v2/posts'
	const params = `/?_fields=excerpt,title,link,featured_media,fimg_url&categories=${catId}&exclude=${exclude}&per_page=${perPage}&page=${page}`
	const url = baseUrl + params

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

function insertPosts(container,posts){
	let combinedHTML = ''
	posts.forEach(post=>{
		combinedHTML += 
		`<li class="post-tile">
			<img src="${post.fimg_url || ''}" alt="${post.title.rendered}">
			<h3>${post.title.rendered}</h3>
			${post.excerpt.rendered}
			<a href="${post.link}">Czytaj więcej</a>
		</li>`

	})
	container.insertAdjacentHTML('beforeend',combinedHTML)
}

function initQtyInputs(){
	const qtyWrappers = document.querySelectorAll('[data-js="qty-control"]')
	qtyWrappers.forEach(wrapper => {
		const inputField = wrapper.querySelector('input.qty');
		const upBtn = wrapper.querySelector('[data-js="up"]');
		const downBtn = wrapper.querySelector('[data-js="down"]');

		if (!inputField || !upBtn || !downBtn) return

		upBtn.addEventListener('click', ()=>{
			let currentValue = parseInt(inputField.value); 
			let maxValue = parseInt(inputField.max) || Infinity; 
		
			if (currentValue < maxValue) {
				inputField.value = currentValue + 1;
				inputField.dispatchEvent(new Event('change',{bubbles: true}))
			}
		})
		downBtn.addEventListener('click', ()=>{
			let currentValue = parseInt(inputField.value); 
			let minValue = parseInt(inputField.min) || 0; 
		
			if (currentValue > minValue) {
				inputField.value = currentValue - 1;
				inputField.dispatchEvent(new Event('change',{bubbles: true}))
			}
		})
	})
}

function initCartUpdate(){
	const DELAY = 400;
	const cartForm = document.querySelector('form.woocommerce-cart-form')
	const updateBtn = document.querySelector('button[name="update_cart"]')
	
	if (!cartForm || !updateBtn) return

	let timeout;

	cartForm.addEventListener('change',(e)=>{
		if (e.target.matches('input.qty')) {
			if ( timeout !== undefined ) {
				clearTimeout( timeout );
			}
			timeout = setTimeout(()=>{
				updateBtn.click()
			},DELAY)
		}
	})
}

function initCart(){
	initQtyInputs();
	initCartUpdate();

	if (typeof jQuery !== 'undefined') {
		jQuery(document.body).on('updated_cart_totals', () => {
			initQtyInputs();
			initCartUpdate();
		} );
	}
}