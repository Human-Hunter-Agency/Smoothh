<?php
/**
 * Smoothh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Smoothh
 */

if ( ! defined( 'SMOOTHH_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'SMOOTHH_VERSION', '0.1.0' );
}

if ( ! defined( 'SMOOTHH_TYPOGRAPHY_CLASSES' ) ) {
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
		'prose prose-neutral max-w-none prose-a:text-primary prose-figure:mt-1'
	);
}

if ( ! function_exists( 'smoothh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function smoothh_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Smoothh, use a find and replace
		 * to change 'smoothh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'smoothh', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'smoothh' ),
				'menu-2' => __( 'Footer Col 1 Menu', 'smoothh' ),
				'menu-3' => __( 'Footer Col 2 Menu', 'smoothh' ),
				'menu-4' => __( 'Footer Bottom Menu', 'smoothh' ),
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
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'smoothh_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smoothh_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'smoothh' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'smoothh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'smoothh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function smoothh_scripts() {
	wp_enqueue_style( 'smoothh-style', get_stylesheet_uri(), array(), SMOOTHH_VERSION );
	wp_enqueue_script( 'smoothh-script', get_template_directory_uri() . '/js/script.min.js', array(), SMOOTHH_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'smoothh_scripts' );

/**
 * Enqueue the block editor script.
 */
function smoothh_enqueue_block_editor_script() {
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
add_action( 'enqueue_block_editor_assets', 'smoothh_enqueue_block_editor_script' );

/**
 * Enqueue the script necessary to support Tailwind Typography in the block
 * editor, using an inline script to create a JavaScript array containing the
 * Tailwind Typography classes from SMOOTHH_TYPOGRAPHY_CLASSES.
 */
function smoothh_enqueue_typography_script() {
	if ( is_admin() ) {
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
		wp_add_inline_script( 'smoothh-typography', "tailwindTypographyClasses = '" . esc_attr( SMOOTHH_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'smoothh_enqueue_typography_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function smoothh_tinymce_add_class( $settings ) {
	$settings['body_class'] = SMOOTHH_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'smoothh_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

add_action('rest_api_init', 'register_rest_images' );
function register_rest_images(){
    register_rest_field( array('post'),
        'fimg_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
function get_rest_featured_image( $object, $field_name, $request ) {
    if( isset($object['featured_media']) && $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}

function smoothh_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'smoothh_add_woocommerce_support' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5, 0 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10, 0 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10, 0 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20, 0 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 0 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10, 0 );


add_action( 'wp_enqueue_scripts', 'smoothh_disable_woocommerce_cart_fragments', 200 ); 
 
function smoothh_disable_woocommerce_cart_fragments() { 
   wp_enqueue_script( 'wc-cart-fragments' ); 
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a href="<?php echo wc_get_cart_url() ?>" class="cart-icon-mobile relative p-1 mr-1 md:hidden block">
		<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M19.4999 5.44214L21 24.942H0L1.5 5.44214H6C6.078 4.20804 6.53906 3.14934 7.38281 2.26634C8.22656 1.38374 9.2655 0.942139 10.5 0.942139C11.7341 0.942139 12.7736 1.38374 13.6172 2.26634C14.4609 3.14934 14.9216 4.20804 15 5.44214H19.4999ZM8.4375 3.33264C7.89038 3.92674 7.57788 4.62974 7.5 5.44214H13.5C13.4216 4.62974 13.1093 3.92674 12.5625 3.33264C12.0154 2.73904 11.3279 2.44214 10.5 2.44214C9.67163 2.44214 8.98425 2.73904 8.4375 3.33264ZM3 6.94214L1.5 23.442H19.4999L18 6.94214H3ZM7.80469 8.88734C8.10132 9.18434 8.24988 9.53604 8.24988 9.94214C8.24988 10.3485 8.10132 10.7002 7.80469 10.9968C7.50769 11.2937 7.15613 11.4421 6.75 11.4421C6.34351 11.4421 5.99194 11.2937 5.69531 10.9968C5.39832 10.7002 5.25 10.3485 5.25 9.94214C5.25 9.53604 5.39832 9.18434 5.69531 8.88734C5.99194 8.59074 6.34351 8.44214 6.75 8.44214C7.15613 8.44214 7.50769 8.59074 7.80469 8.88734ZM15.3047 8.88734C15.6013 9.18434 15.7499 9.53604 15.7499 9.94214C15.7499 10.3485 15.6013 10.7002 15.3047 10.9968C15.0077 11.2937 14.6561 11.4421 14.25 11.4421C13.8435 11.4421 13.4919 11.2937 13.1953 10.9968C12.8983 10.7002 12.75 10.3485 12.75 9.94214C12.75 9.53604 12.8983 9.18434 13.1953 8.88734C13.4919 8.59074 13.8435 8.44214 14.25 8.44214C14.6561 8.44214 15.0077 8.59074 15.3047 8.88734Z" fill="url(#paint0_linear_617_22331)"/>
			<defs>
			<linearGradient id="paint0_linear_617_22331" x1="10.5" y1="0.942139" x2="10.5" y2="24.942" gradientUnits="userSpaceOnUse">
			<stop stop-color="#8117EE"/>
			<stop offset="1" stop-color="#1F97D4"/>
			</linearGradient>
			</defs>
		</svg>
		<?php
			$count = WC()->cart->get_cart_contents_count();
			if ($count > 0 ) {
				echo '<span class="absolute z-10 top-0 -right-1 px-0.5 h-[17px] min-w-[17px] rounded-full text-center text-[11px] text-white font-semibold bg-gradient-to-b from-primary to-secondary">' . $count . '</span>';
			}
		?>
	</a>
	<?php
	$fragments['a.cart-icon-mobile'] = ob_get_clean();
	ob_start();
	?>
	<a href="<?php echo wc_get_cart_url() ?>" class="cart-icon-desktop relative p-1 hidden md:block">
		<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M19.4999 5.44214L21 24.942H0L1.5 5.44214H6C6.078 4.20804 6.53906 3.14934 7.38281 2.26634C8.22656 1.38374 9.2655 0.942139 10.5 0.942139C11.7341 0.942139 12.7736 1.38374 13.6172 2.26634C14.4609 3.14934 14.9216 4.20804 15 5.44214H19.4999ZM8.4375 3.33264C7.89038 3.92674 7.57788 4.62974 7.5 5.44214H13.5C13.4216 4.62974 13.1093 3.92674 12.5625 3.33264C12.0154 2.73904 11.3279 2.44214 10.5 2.44214C9.67163 2.44214 8.98425 2.73904 8.4375 3.33264ZM3 6.94214L1.5 23.442H19.4999L18 6.94214H3ZM7.80469 8.88734C8.10132 9.18434 8.24988 9.53604 8.24988 9.94214C8.24988 10.3485 8.10132 10.7002 7.80469 10.9968C7.50769 11.2937 7.15613 11.4421 6.75 11.4421C6.34351 11.4421 5.99194 11.2937 5.69531 10.9968C5.39832 10.7002 5.25 10.3485 5.25 9.94214C5.25 9.53604 5.39832 9.18434 5.69531 8.88734C5.99194 8.59074 6.34351 8.44214 6.75 8.44214C7.15613 8.44214 7.50769 8.59074 7.80469 8.88734ZM15.3047 8.88734C15.6013 9.18434 15.7499 9.53604 15.7499 9.94214C15.7499 10.3485 15.6013 10.7002 15.3047 10.9968C15.0077 11.2937 14.6561 11.4421 14.25 11.4421C13.8435 11.4421 13.4919 11.2937 13.1953 10.9968C12.8983 10.7002 12.75 10.3485 12.75 9.94214C12.75 9.53604 12.8983 9.18434 13.1953 8.88734C13.4919 8.59074 13.8435 8.44214 14.25 8.44214C14.6561 8.44214 15.0077 8.59074 15.3047 8.88734Z" fill="url(#paint0_linear_617_2233)"/>
			<defs>
			<linearGradient id="paint0_linear_617_2233" x1="10.5" y1="0.942139" x2="10.5" y2="24.942" gradientUnits="userSpaceOnUse">
			<stop stop-color="#8117EE"/>
			<stop offset="1" stop-color="#1F97D4"/>
			</linearGradient>
			</defs>
		</svg>
		<?php
			$count = WC()->cart->get_cart_contents_count();
			if ($count > 0 ) {
				echo '<span data-js="cart-count" class="absolute z-10 top-0 -right-1 px-0.5 h-[17px] min-w-[17px] rounded-full text-center text-[11px] text-white font-semibold bg-gradient-to-b from-primary to-secondary">' . $count . '</span>';
			}
		?>
	</a>
	<?php
	$fragments['a.cart-icon-desktop'] = ob_get_clean();
	return $fragments;
}

function is_category_guest_available($category){
	$guest_categories = get_field('guest_categories', 'option');
    $guest_available = false;
	$category_id = $category->term_id;

	if ($guest_categories && is_array($guest_categories)) {
        $guest_available = in_array($category_id,$guest_categories);
    }

	return $guest_available;
}

function is_prod_guest_available($product) {
    $guest_categories = get_field('guest_categories', 'option');

    $guest_available = false;

    if ($guest_categories && is_array($guest_categories)) {
        $prod_categories = $product->get_category_ids();
        $common_values = array_intersect($prod_categories, $guest_categories);
        $guest_available = !empty($common_values);
    }

    return $guest_available;
}