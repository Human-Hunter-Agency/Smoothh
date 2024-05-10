<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Smoothh
 */

?><!doctype html>
<?php
	$sections = get_field( 'sections' );
	$has_faq = false;
	if ($sections) {
		$has_faq = array_reduce($sections, function($carry, $section) {
			return $carry || $section['acf_fc_layout'] == 'list_faq';
		}, false);
	}

	$has_hero_img = false;
	if ($sections) {
		$hero_img_url = array_reduce($sections, function($carry, $section) {
			if ($section['acf_fc_layout'] == 'hero' && isset($section['hero_background']) && isset($section['hero_background']['url'])) {
				return $section['hero_background']['url'];
			}
			return $carry;
		}, false);
	}
	if($hero_img_url == false && get_post_thumbnail_id( $post->ID )){
		$hero_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
	}
	echo $hero_img_url;
?>
<html <?php language_attributes(); ?> <?php if($has_faq){ echo 'itemscope itemtype="https://schema.org/FAQPage"'; } ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if($has_hero_img): ?>
		<meta property="og:image" content="<?php echo $hero_img_url ?>" />
		<meta name="twitter:image" content="<?php echo $hero_img_url ?>"/>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page">
	<a href="#content" class="sr-only"><?php esc_html_e( 'Skip to content', 'smoothh' ); ?></a>

	<?php get_template_part( 'template-parts/layout/header', 'content' ); ?>

	<div id="content">
