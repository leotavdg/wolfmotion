<?php
if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Theme child functions and definitions.
 *
 * A child theme allows you to change small aspects of your site’s appearance
 * yet still preserve your theme’s look and functionality. To understand how child themes work it is first important
 * to understand the relationship between parent and child themes.
 *
 * In case the child theme's stylesheet is not showing the changes in the frontend, you can increase the
 * version in style.css, eg: 1.0.1 .
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
*/

// Hook into Scripts to append custom stylesheet
add_action( 'wp_enqueue_scripts', function () {

	// Load custom stylesheet
	wp_enqueue_style( 'rey-wp-style-child', get_stylesheet_uri(), [], wp_get_theme()->get('Version') );

	// Wolfmotion Google Fonts
	wp_enqueue_style(
		'wolfmotion-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=JetBrains+Mono:wght@400;500&display=swap',
		[],
		null
	);

	// Wolfmotion CSS
	wp_enqueue_style(
		'wolfmotion-styles',
		get_stylesheet_directory_uri() . '/assets/css/wolfmotion.css',
		[],
		wp_get_theme()->get('Version')
	);

	// Wolfmotion JS
	wp_enqueue_script(
		'wolfmotion-scripts',
		get_stylesheet_directory_uri() . '/assets/js/wolfmotion.js',
		[],
		wp_get_theme()->get('Version'),
		true
	);

}, PHP_INT_MAX /* load late */ );

// Also enqueue in Elementor editor preview
add_action( 'elementor/preview/enqueue_styles', function () {
	wp_enqueue_style(
		'wolfmotion-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=JetBrains+Mono:wght@400;500&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'wolfmotion-styles',
		get_stylesheet_directory_uri() . '/assets/css/wolfmotion.css',
		[],
		wp_get_theme()->get('Version')
	);
});

add_action( 'elementor/preview/enqueue_scripts', function () {
	wp_enqueue_script(
		'wolfmotion-scripts',
		get_stylesheet_directory_uri() . '/assets/js/wolfmotion.js',
		[],
		wp_get_theme()->get('Version'),
		true
	);
});

// Register Wolfmotion widget category
add_action('elementor/elements/categories_registered', function ($elements_manager) {
	$elements_manager->add_category('wolfmotion', [
		'title' => 'Wolfmotion',
		'icon'  => 'fa fa-paw',
	]);
});

// Register all Wolfmotion Elementor widgets
add_action('elementor/widgets/register', function ($widgets_manager) {

	$widgets = [
		'background-widget.php'     => 'WolfMotion_Background_Widget',
		'hero-widget.php'           => 'WolfMotion_Hero_Widget',
		'ticker-widget.php'         => 'WolfMotion_Ticker_Widget',
		'fullbody-widget.php'       => 'WolfMotion_FullBody_Widget',
		'setup-widget.php'          => 'WolfMotion_Setup_Widget',
		'product-widget.php'        => 'WolfMotion_Product_Widget',
		'compatibility-widget.php'  => 'WolfMotion_Compatibility_Widget',
		'faq-widget.php'            => 'WolfMotion_FAQ_Widget',
		'final-cta-widget.php'      => 'WolfMotion_FinalCTA_Widget',
		'footer-widget.php'         => 'WolfMotion_Footer_Widget',
	];

	$dir = get_stylesheet_directory() . '/widgets/';

	foreach ($widgets as $file => $class) {
		require_once $dir . $file;
		$widgets_manager->register(new $class());
	}
});
