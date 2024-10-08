<?php

/**
 * Smoothh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Smoothh
 */

if (!defined('SMOOTHH_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('SMOOTHH_VERSION', '0.1.0');
}

if (!defined('SMOOTHH_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `smoothh_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'SMOOTHH_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary prose-img:w-full prose-figure:w-full md:prose-figure:w-auto md:prose-figure:mt-1 prose-a:break-words md:prose-a:break-normal'
	);
}

if (!function_exists('smoothh_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function smoothh_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Smoothh, use a find and replace
		 * to change 'smoothh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('smoothh', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'smoothh'),
				'menu-2' => __('Footer Col 1 Menu', 'smoothh'),
				'menu-3' => __('Footer Col 2 Menu', 'smoothh'),
				'menu-4' => __('Footer Bottom Menu', 'smoothh'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');

		remove_theme_support('html5', 'comment-form');

		remove_action('woocommerce_add_to_cart','wac_apply_coupons',10);
		remove_action('woocommerce_cart_loaded_from_session','wac_apply_coupons',10);
	}
endif;
add_action('after_setup_theme', 'smoothh_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smoothh_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'smoothh'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'smoothh'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'smoothh_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function smoothh_scripts()
{
	wp_enqueue_style('smoothh-style', get_stylesheet_uri(), array(), SMOOTHH_VERSION);
	wp_enqueue_script('smoothh-alpinejs', '//cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js', array(), SMOOTHH_VERSION, true);
	wp_enqueue_script('smoothh-script', get_template_directory_uri() . '/js/script.min.js', array('wp-i18n', 'smoothh-alpinejs'), SMOOTHH_VERSION, true);
	wp_set_script_translations('smoothh-script', 'smoothh');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'smoothh_scripts');

/**
 * Enqueue the block editor script.
 */
function smoothh_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'smoothh-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		SMOOTHH_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'smoothh_enqueue_block_editor_script');

/**
 * Enqueue the script necessary to support Tailwind Typography in the block
 * editor, using an inline script to create a JavaScript array containing the
 * Tailwind Typography classes from SMOOTHH_TYPOGRAPHY_CLASSES.
 */
function smoothh_enqueue_typography_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'smoothh-typography',
			get_template_directory_uri() . '/js/tailwind-typography-classes.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			SMOOTHH_VERSION,
			true
		);
		wp_add_inline_script('smoothh-typography', "tailwindTypographyClasses = '" . esc_attr(SMOOTHH_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'smoothh_enqueue_typography_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function smoothh_tinymce_add_class($settings)
{
	$settings['body_class'] = SMOOTHH_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'smoothh_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

add_action('rest_api_init', 'register_rest_images');
function register_rest_images()
{
	register_rest_field(
		array('post', 'case-study'),
		'fimg_url',
		array(
			'get_callback'    => 'get_rest_featured_image',
			'update_callback' => null,
			'schema'          => null,
		)
	);
}
function get_rest_featured_image($object, $field_name, $request)
{
	if (isset($object['featured_media']) && $object['featured_media']) {
		$img = wp_get_attachment_image_src($object['featured_media'], 'app-thumb');
		return $img[0];
	}
	return false;
}

function smoothh_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'smoothh_add_woocommerce_support');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5, 0);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10, 0);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20, 0);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 0);

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10, 0);

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

remove_action('woocommerce_after_single_product_summary', 'comments_template', 10);

add_action('wp_enqueue_scripts', 'smoothh_disable_woocommerce_cart_fragments', 200);

function smoothh_disable_woocommerce_cart_fragments()
{
	wp_enqueue_script('wc-cart-fragments');
}

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
	global $woocommerce;

	ob_start();

?>
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
	<?php
	$fragments['a.cart-icon-mobile'] = ob_get_clean();
	ob_start();
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
	<?php
	$fragments['a.cart-icon-desktop'] = ob_get_clean();
	return $fragments;
}

function is_category_guest_available($category)
{
	$guest_categories = get_field('guest_categories', 'option');
	$guest_available = false;
	$category_id = $category->term_id;

	if ($guest_categories && is_array($guest_categories)) {
		$guest_available = in_array($category_id, $guest_categories);
	}

	return $guest_available;
}

function is_prod_guest_available($product)
{
	$guest_categories = get_field('guest_categories', 'option');

	$guest_available = false;

	if ($guest_categories && is_array($guest_categories)) {
		$prod_categories = $product->get_category_ids();
		$common_values = array_intersect($prod_categories, $guest_categories);
		$guest_available = !empty($common_values);
	}

	return $guest_available;
}

// Custom account fields
function woocommerce_smoothh_account_extra_fields()
{
	return apply_filters('woocommerce_forms_field', array(
		'first_name' => array(
			'type'        => 'text',
			'placeholder' => __('First name', 'woocommerce') . '*',
			'required'    => true,
			'custom_attributes' => array('required' => 'required'),
			'autocomplete' => 'given-name'
		),
		'last_name' => array(
			'type'        => 'text',
			'placeholder' => __('Last name', 'woocommerce') . '*',
			'required'    => true,
			'custom_attributes' => array('required' => 'required'),
			'autocomplete' => 'family-name'
		),
		'billing_company' => array(
			'type'        => 'text',
			'placeholder' => __('Company Name', 'smoothh') . '*',
			'required' => true,
			'custom_attributes' => array('required' => 'required'),
		),
		'billing_company_nip' => array(
			'type'        => 'text',
			'placeholder' => __('NIP Number', 'smoothh') . '*',
			'required' => true,
			'custom_attributes' => array(
				'required' => 'required',
				'pattern'  => '^([0-9]){10}$',
				'title'    => __('NIP number requires 10 digits', 'smoothh')
			),
		),
	));
}
function smoothh_save_extra_fields($customer_id)
{
	if (isset($_POST['first_name'])) {
		// WordPress default first name field.
		update_user_meta($customer_id, 'name', sanitize_text_field($_POST['first_name']));
		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['first_name']));
		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['first_name']));
	}
	if (isset($_POST['last_name'])) {
		// WordPress default last name field.
		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['last_name']));
		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['last_name']));
	}

	// Custom account_type client/candidate
	if (isset($_POST['account_type'])) {
		update_user_meta($customer_id, 'account_type', sanitize_text_field($_POST['account_type']));

		if ($_POST['account_type'] == 'client') {
			// WooCommerce billing_company
			if (isset($_POST['billing_company'])) {
				update_user_meta($customer_id, 'billing_company', sanitize_text_field($_POST['billing_company']));
			}
			if (isset($_POST['billing_company_nip'])) {
				update_user_meta($customer_id, 'billing_company_nip', sanitize_text_field($_POST['billing_company_nip']));
			}
		}
	}
}
function smoothh_validate_extra_fields($errors)
{
	if (isset($_POST['first_name']) && empty($_POST['first_name'])) {
		$errors->add('first_name_error', __('First name is required.', 'woocommerce'));
	}
	if (isset($_POST['last_name']) && empty($_POST['last_name'])) {
		$errors->add('last_name_error', __('Last name is required.', 'woocommerce'));
	}

	if (!isset($_POST['account_type']) || empty($_POST['account_type']) || (!($_POST['account_type'] == 'client') && !($_POST['account_type'] == 'candidate'))) {
		$errors->add('account_type_error', __('Account type is required.', 'smoothh'));
	}
	if (isset($_POST['account_type']) && $_POST['account_type'] == 'client' && empty($_POST['billing_company'])) {
		$errors->add('billing_company_error', __('Company is required.', 'smoothh'));
	}
	if (isset($_POST['account_type']) && $_POST['account_type'] == 'client' && empty($_POST['billing_company_nip'])) {
		$errors->add('billing_company_nip_error', __('Company NIP is required.', 'smoothh'));
	}
}

// Register page
function smoothh_my_account_page_woocommerce()
{
	$fields = woocommerce_smoothh_account_extra_fields();
	foreach ($fields as $key => $field_args) {
		woocommerce_form_field($key, $field_args);
	}
}
function smoothh_after_register_actions($username, $email, $validation_errors)
{
	smoothh_validate_extra_fields($validation_errors);

	if (!isset($_POST['terms'])) {
		$validation_errors->add('terms_error', __('Terms and condition are not checked!', 'smoothh'));
	}

	if (isset($_POST['terms']) && $_POST['terms'] === 'yes') {
		$dataSubject = gdpr('data-subject')->getByEmail($_POST['email']);
		$dataSubject->giveConsent('terms');
	}
}

function smoothh_terms_and_conditions_to_registration()
{

	if (wc_get_page_id('terms') > 0) {
	?>
		<p class="form-row terms wc-terms-and-conditions">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox flex items-start justify-center gap-x-2 [&_a]:text-primary [&_a]:font-semibold [&_a:hover]:underline">
				<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox mt-1 accent-secondary " name="terms" id="terms" required value="yes" />
				<span>
					<?php printf(__('I have read and agree to the website <a href="%s" target="_blank">terms and conditions</a>', 'smoothh'), esc_url(wc_get_page_permalink('terms'))); ?></span> <span class="required !visible ">*</span>
			</label>
		</p>
	<?php
	}
}

function smoothh_save_user_default_type($user_id)
{
	$default_type = 'candidate';
	update_user_meta($user_id, 'account_type', $default_type);
}


function smoothh_filter_woocommerce_form_field_checkbox($field, $key, $args, $value)
{
	if ($key == 'gdpr_woo_consent' || $key == 'consent_digital_commerce' || $key == 'consent_consultation') {
		$field = str_replace('<input ', '<input required="required" ', $field);
	}
	return $field;
}
add_filter('woocommerce_form_field_checkbox', 'smoothh_filter_woocommerce_form_field_checkbox', 10, 4);

add_action('woocommerce_register_form_start', 'smoothh_my_account_page_woocommerce', 15);
add_action('woocommerce_register_form', 'smoothh_terms_and_conditions_to_registration', 1);
add_action('woocommerce_register_post', 'smoothh_after_register_actions', 10, 3);
add_action('woocommerce_created_customer', 'smoothh_save_extra_fields');
add_action('user_register', 'smoothh_save_user_default_type', 10, 1);

add_filter('woocommerce_billing_fields', 'smoothh_billing_address_add_nip');
function smoothh_billing_address_add_nip($fields)
{
	$user_id = get_current_user_id();
	if ($user_id) {
		$account_type = get_user_meta($user_id, 'account_type', true);
		if ($account_type == 'client') {
			$fields['billing_company']['class'] = array('form-row-first');
			$fields['billing_company']['required'] = true;
			$fields['billing_company_nip']   = array(
				'type'		   => 'text',
				'label'  => __('NIP Number', 'smoothh'),
				'priority' => 35,
				'required' => true,
				'class' => array('form-row-last'),
				'custom_attributes' => array(
					'required' => 'required',
					'pattern'  => '^([0-9]){10}$',
					'title'    => __('NIP number requires 10 digits', 'smoothh')
				),
			);
		}
	}

	$fields['billing_phone']['required'] = false;
	$fields['billing_phone']['custom_attributes'] = array();

	return $fields;
}

add_filter('woocommerce_shipping_fields', 'smoothh_shipping_address_add_nip');
function smoothh_shipping_address_add_nip($fields)
{

	$user_id = get_current_user_id();
	if ($user_id && ($account_type = get_user_meta($user_id, 'account_type', true)) && $account_type == 'client') {
		$fields['shipping_company']['class'] = array('form-row-first');
		$fields['shipping_company']['required'] = true;
		$fields['shipping_company_nip'] = array(
			'type'		   => 'text',
			'label'  => __('NIP Number', 'smoothh'),
			'priority' => 35,
			'required' => true,
			'class' => array('form-row-last'),
			'custom_attributes' => array(
				'required' => 'required',
				'pattern'  => '^([0-9]){10}$',
				'title'    => __('NIP number requires 10 digits', 'smoothh')
			),
		);
	}

	$fields['shipping_phone'] = array(
		'type'        => 'tel',
		'label' => __('Phone Number', 'woocommerce'),
		'autocomplete' => 'tel'
	);

	return $fields;
}

// Display custom fields in user BO
function smoothh_show_extra_account_details($user)
{
	$company_nip = get_user_meta($user->ID, 'billing_company_nip', true);
	$account_type = get_user_meta($user->ID, 'account_type', true);

	?>
	<h3><?php esc_html_e('Extra account details', 'smoothh'); ?></h3>
	<table class="form-table">
		<?php
		if (!empty($company_nip)) :
		?>

			<tr>
				<th><?php esc_html_e('Company NIP', 'smoothh'); ?></label></th>
				<td>
					<p><?php echo esc_html($company_nip); ?></p>
				</td>
			</tr>

		<?php endif; ?>
		<?php
		if (!empty($account_type)) :
		?>
			<tr>
				<th><?php esc_html_e('Account type', 'smoothh'); ?></label></th>
				<td>
					<p><?php echo esc_html($account_type); ?></p>
				</td>
			</tr>
		<?php endif; ?>

	</table>
	<?php
}

add_action('show_user_profile', 'smoothh_show_extra_account_details', 15);
add_action('edit_user_profile', 'smoothh_show_extra_account_details', 15);


function smoothh_override_checkout_fields($fields)
{

	$user_id = get_current_user_id();
	if ($user_id && ($account_type = get_user_meta($user_id, 'account_type', true)) && $account_type == 'client') {
		$fields['shipping']['shipping_company_nip'] = array(
			'type'		   => 'text',
			'label'  => __('NIP Number', 'smoothh'),
			'priority' => 35,
			'required' => true,
			'class' => array('form-row-last'),
			'custom_attributes' => array(
				'required' => 'required',
				'pattern'  => '^([0-9]){10}$',
				'title'    => __('NIP number requires 10 digits', 'smoothh')
			),
		);

		$fields['billing']['billing_company_nip'] = array(
			'type'		   => 'text',
			'label'  => __('NIP Number', 'smoothh'),
			'placeholder' => __('_ _ _ _ _ _ _ _ _ _', 'smoothh'),
			'priority' => 35,
			'required' => true,
			'class' => array('form-row-last'),
			'custom_attributes' => array(
				'required' => 'required',
				'pattern'  => '^([0-9]){10}$',
				'title'    => __('NIP number requires 10 digits', 'smoothh')
			),
		);

		$fields['shipping']['shipping_company']['class'] = array('form-row-first');
		$fields['billing']['billing_company']['class'] = array('form-row-first');
		$fields['billing']['billing_company']['placeholder'] = __('Company name', 'smoothh');
	} else {
		unset($fields['shipping']['shipping_company']);
		unset($fields['billing']['billing_company']);
	}

	$fields['billing']['billing_first_name']['placeholder'] = __('Enter your first name', 'smoothh');
	$fields['billing']['billing_last_name']['placeholder'] = __('Enter your last name', 'smoothh');
	$fields['billing']['billing_postcode']['placeholder'] = __('_ _ - _ _ _', 'smoothh');
	$fields['billing']['billing_city']['placeholder'] = __('City', 'smoothh');
	$fields['billing']['billing_email']['placeholder'] = __('Enter your email', 'smoothh');
	$fields['billing']['billing_phone']['placeholder'] = __('Enter your phone number', 'smoothh');

	$fields['shipping']['shipping_email']['class'] = array('form-row-first');
	$fields['billing']['billing_email']['class'] = array('form-row-first');

	$fields['shipping']['shipping_phone']['class'] = array('form-row-last');
	$fields['billing']['billing_phone']['class'] = array('form-row-last');
	$fields['shipping']['shipping_phone']['priority'] = 120;
	$fields['billing']['billing_phone']['priority'] = 120;
	$fields['shipping']['shipping_phone']['required'] = false;
	$fields['billing']['billing_phone']['required'] = false;
	unset($fields['shipping']['shipping_phone']['custom_attributes']);
	unset($fields['billing']['billing_phone']['custom_attributes']);

	return $fields;
}

add_filter('woocommerce_checkout_fields', 'smoothh_override_checkout_fields');


add_action('woocommerce_review_order_before_submit', 'smoothh_custom_input_and_info', 30);
function smoothh_custom_input_and_info()
{
	echo wc_registration_privacy_policy_text();

	echo woocommerce_form_field('consent_digital_commerce', array(
		'type'      => 'checkbox',
		'label'     => __('I confirm that if I purchase a service or digital content, I want their performance or delivery to commence before the deadline for withdrawal from the contract expires.', 'smoothh'),
		'required' => true,
	));
	echo '<p class="text-xs mt-0">' . __('Fully performing the service or starting the delivery of digital content before this date results in the loss of the right to withdraw from the contract referred to in the Act of May 30, 2014 on consumer rights (Journal of Laws of 2014, item 827, as amended).', 'smoothh') . '</p>';

	$categories_with_consultations = [28, 26];

	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		$product = wc_get_product($cart_item['product_id']);
		$prod_categories = $product->get_category_ids();
		$intersection = array_intersect($prod_categories, $categories_with_consultations);
		if (count($intersection) > 0) {
			echo woocommerce_form_field('consent_consultation', array(
				'type'      => 'checkbox',
				'label'     => __('I consent to the processing of my personal data by the service provider for the purpose of arranging a consultation.', 'smoothh'),
				'required' => true,
			));
			break;
		}
	}
}

function smoothh_checkout_extra_validation($data, $errors)
{
	if (!isset($_POST['consent_digital_commerce'])) {
		$errors->add('consent_digital_commerce_error', __('Digital content purchase is not checked!', 'smoothh'));
	}

	$includes_consultation = false;
	$catgrories_with_consultations = [28, 26];

	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		$product = wc_get_product($cart_item['product_id']);
		$prod_categories = $product->get_category_ids();
		$intersection = array_intersect($prod_categories, $catgrories_with_consultations);
		if (count($intersection) > 0) {
			$includes_consultation = true;
			break;
		}
	}

	if ($includes_consultation && !isset($_POST['consent_consultation'])) {
		$errors->add('consent_consultation_error', __('Consultation consent is not checked!', 'smoothh'));
	}
}

add_action('woocommerce_after_checkout_validation', 'smoothh_checkout_extra_validation', 10, 2);

function smoothh_checkout_fields_update_order_meta($order_id)
{
	if (isset($_POST['billing_company_nip']) && !empty($_POST['billing_company_nip'])) {
		$order = wc_get_order($order_id);
		$order->update_meta_data('billing_company_nip', sanitize_text_field($_POST['billing_company_nip']));
		$order->save_meta_data();
	}

	if (isset($_POST['terms']) && $_POST['terms'] === 'on') {
		$dataSubject = gdpr('data-subject')->getByEmail($_POST['billing_email']);
		$dataSubject->giveConsent('terms');
	}

	if (isset($_POST['consent_digital_commerce']) && $_POST['consent_digital_commerce'] === '1') {
		$dataSubject = gdpr('data-subject')->getByEmail($_POST['billing_email']);
		$dataSubject->giveConsent('consent_digital_commerce');
	}

	if (isset($_POST['consent_consultation']) && $_POST['consent_consultation'] === '1') {
		$dataSubject = gdpr('data-subject')->getByEmail($_POST['billing_email']);
		$dataSubject->giveConsent('consent_consultation');
	}
}

add_action('woocommerce_checkout_update_order_meta', 'smoothh_checkout_fields_update_order_meta');

// Display the custom-field in admin orders view
function my_custom_checkout_field_display_admin_order_meta_billing($order)
{
	echo '<p><strong>' . __('NIP Number', 'smoothh') . ' *: </strong><span>' . $order->get_meta('billing_company_nip') . '</span></p>';
}
add_action('woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta_billing', 10, 1);

function smoothh_override_default_locale_fields($fields)
{
	$user_id = get_current_user_id();
	if ($user_id && ($account_type = get_user_meta($user_id, 'account_type', true)) && $account_type == 'client') {
		$fields['company_nip']['priority'] = 35;
	} else {
		unset($fields['company']);
	}

	$fields['postcode']['class'] = array('form-row-first');
	$fields['city']['class'] = array('form-row-last');
	$fields['country']['priority'] = 75;
	unset($fields['address_2']);

	return $fields;
}
add_filter('woocommerce_default_address_fields', 'smoothh_override_default_locale_fields');


function login_page_redirects()
{
	$checkout_pageid = get_option('woocommerce_checkout_page_id');
	$is_guest = $_GET['is_guest'] ?? false;
	if (!is_user_logged_in() && is_page($checkout_pageid) && !$is_guest && !is_wc_endpoint_url('order-received')) {
		$url = add_query_arg(
			'redirect_to',
			get_permalink($checkout_pageid),
			site_url('/logowanie/')
		);
		wp_redirect($url);
		exit;
	}

	$login_page_id = 848;
	if (empty($_GET) && is_page($login_page_id)) {
		wp_redirect(get_permalink(wc_get_page_id('myaccount')));
		exit;
	}


	$client_panel_page_id = 650;
	$candidate_panel_page_id = 2743;

	if (!is_user_logged_in()) {
		if (is_page($client_panel_page_id) || is_page($candidate_panel_page_id)) {
			wp_redirect(get_permalink(wc_get_page_id('myaccount')));
			exit;
		}
	}

	if (is_user_logged_in()) {
		$user_id = get_current_user_id();
		$account_type = get_user_meta($user_id, 'account_type', true);

		if ($account_type === 'client' && is_page($candidate_panel_page_id)) {
			wp_redirect(get_permalink($client_panel_page_id));
			exit;
		}
		if ($account_type === 'candidate' && is_page($client_panel_page_id)) {
			wp_redirect(get_permalink($candidate_panel_page_id));
			exit;
		}
	}
}
add_action('template_redirect', 'login_page_redirects');


function after_login_redirect($redirect_to, $user = '') {
    $redirect_param = isset($_GET['redirect_to']) ? $_GET['redirect_to'] : false;
	$client_panel_page_id = 650;
	$client_panel_page_link = get_permalink($client_panel_page_id);
	$candidate_panel_page_id = 2743;
	$candidate_panel_page_link = get_permalink($candidate_panel_page_id);

    if (is_user_logged_in() && $redirect_param !== false) {
        return $redirect_param;
    }

    if (empty($_GET)) {
        if (isset($user) && is_a($user, 'WP_User') && $user->ID > 0) {
            $user_id = $user->ID;
        } else {
            $user_id = get_current_user_id();
        }
		$account_type = get_user_meta($user_id, 'account_type', true);
			if ($account_type == 'client'){
				return $client_panel_page_link;
			}elseif($account_type == 'candidate'){
				return $candidate_panel_page_link;
			}

    }

    return $redirect_to;
}
add_filter('woocommerce_login_redirect', 'after_login_redirect', 999,2);
add_action('woocommerce_registration_redirect', 'after_login_redirect', 2,2);

remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10);
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20);
remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);

function filter_wp_nav_menu_objects($sorted_menu_items, $args) {
	$user_id = get_current_user_id();
	$account_type = get_user_meta($user_id, 'account_type', true);

	// Hide calculator links for candidates
	if ($account_type === 'candidate') {
		$sorted_menu_items = array_filter($sorted_menu_items,function ($item) {
			return !str_contains($item->url,'#calculator');
		});
	}


	if ($args->menu->slug == 'dla-kandydata') {

		$client_panel_page_id = 650;
		$candidate_panel_page_id = 2743;

		// Show both for root user
		if ($user_id == 1) {
			return $sorted_menu_items;
		}

		$sorted_menu_items = array_filter($sorted_menu_items, function ($item) use ($account_type, $client_panel_page_id, $candidate_panel_page_id) {
			$menu_item_id = $item->object_id;
			if (empty($account_type)) {
				return $menu_item_id != $client_panel_page_id && $menu_item_id != $candidate_panel_page_id;
			} elseif ($account_type === 'client') {
				return $menu_item_id != $candidate_panel_page_id;
			} elseif ($account_type === 'candidate') {
				return $menu_item_id != $client_panel_page_id;
			}
			return true;
		});

	}


	return $sorted_menu_items;
}

add_filter( 'wp_nav_menu_objects', 'filter_wp_nav_menu_objects', 10, 2 );

// Add consents page
function register_new_item_endpoint()
{
	add_rewrite_endpoint('consents', EP_ROOT | EP_PAGES);
}
add_action('init', 'register_new_item_endpoint');

function new_item_query_vars($vars)
{
	$vars[] = 'consents';
	return $vars;
}
add_filter('query_vars', 'new_item_query_vars');

function add_new_item_tab($items)
{
	$items['consents'] = __('Consents', 'smoothh');
	return $items;
}
add_filter('woocommerce_account_menu_items', 'add_new_item_tab');

function add_new_item_content()
{
	echo do_shortcode('[gdpr_privacy_tools]');
}
add_action('woocommerce_account_consents_endpoint', 'add_new_item_content');



// Remove read more from excerpt
function change_excerpt($more)
{
	return '';
}
add_filter('excerpt_more', 'change_excerpt');

// Availability text
function filter_woocommerce_get_availability_text($availability, $product)
{
	// Only for 'outofstock'
	if ($product->get_stock_status() == 'outofstock') {
		// Get custom stock status
		$has_variable_price = get_field('variable_price', $product->get_id());

		if (isset($has_variable_price) && $has_variable_price == true) {
			return '';
		}
	}

	return $availability;
}
add_filter('woocommerce_get_availability_text', 'filter_woocommerce_get_availability_text', 10, 2);


add_filter('shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3);

function custom_shortcode_atts_wpcf7_filter($out, $pairs, $atts)
{
	$custom_attrs = ['prod-id', 'prod-name'];

	foreach ($custom_attrs as $attr) {
		if (isset($atts[$attr])) {
			$out[$attr] = $atts[$attr];
		}
	}

	return $out;
}

add_filter('woocommerce_get_script_data', 'pwd_strength_meter_settings', 20, 2);

function pwd_strength_meter_settings($params, $handle)
{

	if ($handle === 'wc-password-strength-meter') {

		$params = array_merge($params, array(

			'min_password_strength' => 2,
		));
	}
	return $params;
}

add_action('init', 'gdpr_register_smoothh_consents');
function gdpr_register_smoothh_consents()
{

	if(is_callable('gdpr')){
		gdpr('consent')->register(
			'terms',
			sprintf(__('<a href="%s" target="_blank">Terms and Conditions</a> consent', 'smoothh'), get_permalink(wc_terms_and_conditions_page_id())),
			wc_replace_policy_page_link_placeholders(wc_get_terms_and_conditions_checkbox_text()),
			true
		);

		$policyPageUrl = get_permalink(wc_privacy_policy_page_id());
		gdpr('consent')->register(
			'gdpr_woo_consent',
			sprintf(__('<a href="%s" target="_blank">Policy privacy </a> consent', 'smoothh'), $policyPageUrl),
			wc_replace_policy_page_link_placeholders(wc_get_privacy_policy_text('registration')),
			true
		);

		gdpr('consent')->register(
			'consent_digital_commerce',
			__('I confirm that if I purchase a service or digital content, I want their performance or delivery to commence before the deadline for withdrawal from the contract expires.', 'smoothh'),
			__('Fully performing the service or starting the delivery of digital content before this date results in the loss of the right to withdraw from the contract referred to in the Act of May 30, 2014 on consumer rights (Journal of Laws of 2014, item 827, as amended).', 'smoothh'),
			true
		);

		gdpr('consent')->register(
			'consent_consultation',
			__('I consent to the processing of my personal data by the service provider for the purpose of arranging a consultation.', 'smoothh'),
			null,
			true
		);

		gdpr('consent')->register(
			'consent_marketing',
			__('I consent to the processing of my personal data (name, e-mail address) by the Service Provider (here please provide the name and surname / name and address of the Service Provider) for marketing purposes.', 'smoothh'),
			sprintf(
				__('Expressing consent is voluntary. I have the right to withdraw consent at any time without affecting the lawfulness of processing based on consent before its withdrawal. I have the right to access my data and rectify it, delete it, limit processing, and the right to transfer data on the terms contained in the %sprivacy policy%s of the website. Personal data on the website are processed in accordance with the %sprivacy policy%s. We encourage you to read the policy before agreeing.', 'smoothh'),
				"<a href='{$policyPageUrl}' target='_blank'>",
				"</a>",
				"<a href='{$policyPageUrl}' target='_blank'>",
				"</a>"
			),
			true
		);
	}
}

function get_product_tax_formatted($product, $quantity = 1)
{
	if ($product) {
		$price_incl_tax = wc_get_price_including_tax($product);

		$tax_amount = ($price_incl_tax) * $quantity;
		$tax_formatted = number_format($tax_amount, wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator());

		return '( ' . $tax_formatted . ' ' . get_woocommerce_currency_symbol() . ' ' . __('gross', 'smoothh') . ')';
	}
}

function smoothh_woocommerce_available_variation($variation_data, $product, $variation)
{
	$variation_data['tax_text'] = get_product_tax_formatted($variation);
	$variation_data['hourly_text'] = get_field('product_hourly', $product->get_id()) ? '/h' : '';
	return $variation_data;
}
add_filter('woocommerce_available_variation', 'smoothh_woocommerce_available_variation', 10, 3);

function find_cheapest_variation($product)
{
	$temp_price = PHP_FLOAT_MAX;
	$default_variaton = false;

	foreach ($product->get_available_variations() as $variation) {
		if (isset($variation['display_price']) && $variation['display_price'] < $temp_price) {
			$temp_price = $variation['display_price'];
			$default_variaton = $variation;
		}
	}

	return $default_variaton;
}

function get_product_regular_price_formatted($product)
{
	if ($product->is_type('variable')) {

		$default_variaton = find_cheapest_variation($product);
		$regular_price = (isset($default_variaton) && $default_variaton != false) ? $default_variaton['display_regular_price'] : $product->get_variation_regular_price('min', true);
	} else {
		$regular_price = $product->get_regular_price();
	}

	$price_formatted = number_format($regular_price, wc_get_price_decimals(), wc_get_price_decimal_separator(), wc_get_price_thousand_separator()) . ' ' . get_woocommerce_currency_symbol();

	return $price_formatted;
}

function has_sale($product)
{
	if ($product->is_type('variable')) {
		$default_variaton = find_cheapest_variation($product);
		if (isset($default_variaton) && $default_variaton != false) {
			return $default_variaton['display_regular_price'] != $default_variaton['display_price'];
		}
	} else {
		return $product->is_on_sale();
	}
}


add_filter('woocommerce_cart_product_price', 'smoothh_woocommerce_cart_product_price_filter', 10, 2);
function smoothh_woocommerce_cart_product_price_filter($wc_price, $product)
{
	$tax_element = '<span class="text-base text-right text-foreground font-normal">' . get_product_tax_formatted($product) . '</span>';
	return $wc_price . $tax_element;
}

add_filter('woocommerce_cart_product_subtotal', 'smoothh_woocommerce_cart_product_subtotal_filter', 10, 4);
function smoothh_woocommerce_cart_product_subtotal_filter($product_subtotal, $product, $quantity, $that)
{
	$tax_element = is_checkout() ? '' : '<span class="text-base text-right text-foreground font-normal">' . get_product_tax_formatted($product, $quantity) . '</span>';
	return $product_subtotal . $tax_element;
}

function smoothh_img_responsive($img, $classes, $dimensions, $loading = '')
{
	if (!isset($img) || !isset($img['url']) || !isset($img['ID'])) {
		return '';
	}
	$url = $img['url'];
	$ID = $img['ID'];
	$alt = isset($img['alt']) ? $img['alt'] : '';

	$default_size = 'full';
	$dimensions_string = '';
	if (isset($dimensions) && count($dimensions) == 2) {
		$dimensions_string = 'width="' . $dimensions[0] . '" height="' . $dimensions[1] . '" ';
		$default_size = get_best_fit_image_size($dimensions[0]);
	}

	$srcset_string = 'srcset="' . wp_get_attachment_image_srcset($ID, $default_size) . '" ';
	$sizes_string = 'sizes="' . wp_get_attachment_image_sizes($ID, $default_size, wp_get_attachment_metadata($ID)) . '" ';
	$alt_string = $alt == '' ? '' : ('alt="' . $alt . '" ');
	$loading_string = '';
	if ($loading != '') {
		$loading_string = 'loading="' . $loading . '" ';
	}

	return '<img class="' . $classes . '" ' . $dimensions_string . 'src="' . $url . '" ' . $srcset_string . $sizes_string . $alt_string . $loading_string . '/>';
}

function get_best_fit_image_size($custom_width)
{
	$image_sizes = array(
		'thumbnail' => 150,
		'medium' => 300,
		'medium_large' => 768,
		'large' => 1024,
	);

	$best_fit_size = 'full';

	foreach ($image_sizes as $size => $width) {
		if ($width > $custom_width) {
			break;
		}
		$best_fit_size = $size;
	}

	return $best_fit_size;
}

add_action('wpcf7_before_send_mail', 'smoothh_wpcf7_mail_before_send', 10, 3);

function smoothh_wpcf7_mail_before_send($contact_form, $abort, $submission)
{
	$form_id = $contact_form->id();
	if ($form_id == '1064') {
		$mail = $contact_form->prop('mail_2');

		$posted_data = $submission->get_posted_data();
		$prod_id = $posted_data['prod-id'];
		$product = wc_get_product($prod_id);

		$files = array();

		if ($product->is_downloadable()) {
			$downloads = $product->get_downloads();
			foreach ($downloads as $download) {
				$files[] = $download->get_file();
			}
		}

		$mail['body'] .= '<br>';
		$mail['body'] .= __('Download links: ', 'smoothh');
		$mail['body'] .= '<br>';
		$mail['body'] .= implode('<br>', $files);

		$contact_form->set_properties(array('mail_2' => $mail));
	}
}

add_action('comment_post', 'smoothh_review_set_gdpr', 10, 3);
function smoothh_review_set_gdpr($comment_id, $comment_approved, $commentdata)
{
	$author_email = $commentdata['comment_author_email'];
	if (isset($_POST['gdpr_woo_consent']) && $_POST['gdpr_woo_consent'] === 'yes') {
		$dataSubject = gdpr('data-subject')->getByEmail($author_email);
		$dataSubject->giveConsent('gdpr_woo_consent');
	}
}

function tm_epo_js_loader()
{
	do_action('woocommerce_tm_epo_enqueue_scripts');
}
add_action('wp_enqueue_scripts', 'tm_epo_js_loader');


// add_filter( 'awcdp_product_deposit_amount', 'awcdp_product_deposit_amount', 10, 2 );


// function awcdp_product_deposit_amount($amount, $product_id) {
// 	$DEPOSIT_AMOUNT_MIN = 990;
//     $product = wc_get_product($product_id);
//     $price = $product->get_price();
// 	$deposit_temp = $price * 0.1;
//     if($deposit_temp > $DEPOSIT_AMOUNT_MIN ){
//         return 10;
//     } else {
//         return $DEPOSIT_AMOUNT_MIN;
//     }
// }

// add_filter( 'awcdp_product_deposit_type', 'awcdp_product_deposit_type', 10, 2 );
// function awcdp_product_deposit_type($type,$product_id) {
// 	$DEPOSIT_AMOUNT_MIN = 990;
//     $product = wc_get_product($product_id);
//     $price = $product->get_price();
// 	$deposit_temp = $price * 0.1;
//     if($deposit_temp > $DEPOSIT_AMOUNT_MIN ){
//         return 'percent';
//     } else {
//         return 'fixed';
//     }
// }

function truncate($text, $length = 100, $options = array())
{
	$default = array(
		'ending' => '...', 'exact' => true, 'html' => false
	);
	$options = array_merge($default, $options);
	extract($options);

	if ($html) {
		if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
			return $text;
		}
		$totalLength = mb_strlen(strip_tags($ending));
		$openTags = array();
		$truncate = '';

		preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
		foreach ($tags as $tag) {
			if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
				if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
					array_unshift($openTags, $tag[2]);
				} else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
					$pos = array_search($closeTag[1], $openTags);
					if ($pos !== false) {
						array_splice($openTags, $pos, 1);
					}
				}
			}
			$truncate .= $tag[1];

			$contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
			if ($contentLength + $totalLength > $length) {
				$left = $length - $totalLength;
				$entitiesLength = 0;
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
					foreach ($entities[0] as $entity) {
						if ($entity[1] + 1 - $entitiesLength <= $left) {
							$left--;
							$entitiesLength += mb_strlen($entity[0]);
						} else {
							break;
						}
					}
				}

				$truncate .= mb_substr($tag[3], 0, $left + $entitiesLength);
				break;
			} else {
				$truncate .= $tag[3];
				$totalLength += $contentLength;
			}
			if ($totalLength >= $length) {
				break;
			}
		}
	} else {
		if (mb_strlen($text) <= $length) {
			return $text;
		} else {
			$truncate = mb_substr($text, 0, $length - mb_strlen($ending));
		}
	}
	if (!$exact) {
		$spacepos = mb_strrpos($truncate, ' ');
		if (isset($spacepos)) {
			if ($html) {
				$bits = mb_substr($truncate, $spacepos);
				preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
				if (!empty($droppedTags)) {
					foreach ($droppedTags as $closingTag) {
						if (!in_array($closingTag[1], $openTags)) {
							array_unshift($openTags, $closingTag[1]);
						}
					}
				}
			}
			$truncate = mb_substr($truncate, 0, $spacepos);
		}
	}
	$truncate .= $ending;

	if ($html) {
		foreach ($openTags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
	}

	return $truncate;
}

function is_in_cart($product_id)
{
	return in_array($product_id, array_column(WC()->cart->get_cart(), 'product_id'));
}


//MERCHANT - ADD CART FUNCTIONALITY
//add_action('woocommerce_cart_actions', 'add_button_for_merchant'); - in tpl
function add_button_for_merchant()
{
	if (is_user_logged_in() && is_site_admin()) {
	?>
		<a href="/merchant_actions?cart_as_order=1" class="w-full border-none !bg-gradient-to-b from-primary via-secondary to-secondary bg-size-200 bg-pos-0 hover:bg-pos-100 focus:bg-pos-100  disabled:!bg-[#C9C9C9] [&.disabled]:!bg-[#C9C9C9] disabled:!bg-none [&.disabled]:!bg-none disabled:!opacity-100 [&.disabled]:!opacity-100  transition-all duration-200 text-white whitespace-nowrap min-h-[55px] !px-5 xl:!px-10 !rounded-[15px] font-bold !flex items-center justify-center gap-5 checkout-button button alt wc-forward">
			Zakup w imieniu klienta<svg class="shrink-0 -rotate-90" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle class="stroke-black" cx="9.5" cy="9.5" r="9"></circle>
				<path class="fill-black" d="M9 12.986L5.75 7.5H7.7L9.468 10.451L11.314 7.5H13.16L9.845 12.986H9Z"></path>
			</svg>
		</a>
<?php
	}
}

function is_site_admin()
{
	return in_array('administrator',  wp_get_current_user()->roles);
}
//https://smoothh.domain.org.pl/merchant_actions/?cart_as_order=1
add_action('init', 'init_url_custom_function');
function init_url_custom_function()
{
	add_rewrite_rule('^merchant_actions/?', 'index.php?cart_as_order=1', 'top');
	add_rewrite_tag('%cart_as_order%', '([^&]+)');
}

add_action('wp', 'check_url_merchant_function');
function check_url_merchant_function()
{
	global $cart_as_order;
	if (isset($cart_as_order) && $cart_as_order == "1" && is_user_logged_in() && is_site_admin())
		merchant_add_to_cart();
}

function merchant_add_to_cart()
{

	$cart = WC()->cart;
	$checkout = WC()->checkout();
	$order_id = $checkout->create_order(array());
	$order = wc_get_order($order_id);
	$order->set_payment_method('bacs');
	update_post_meta($order_id, '_customer_user', get_current_user_id());
	$order->calculate_totals();
	$cart->empty_cart();
	wp_redirect(admin_url('/admin.php?page=wc-orders&action=edit&id=' . $order_id, 'http'), 301);
}

function filter_wc_order_is_editable($editable, $order)
{
	// Compare
	if (in_array('merchant', wp_get_current_user()->roles)) {
		$editable = false;
	}

	return $editable;
}
add_filter('wc_order_is_editable', 'filter_wc_order_is_editable', 10, 2);


// Remove search
function disable_search_query( $query, $error = true ) {
	if ( is_search() && !is_admin() ) {
		$query->is_search       = false;
		$query->query_vars['s'] = false;
		$query->query['s']      = false;
		if ( $error ) {
			$query->is_404 = true;
		}
	}
}
add_action( 'parse_query', 'disable_search_query' );