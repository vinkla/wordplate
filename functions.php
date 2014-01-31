<?php

/**
 * Load admin dependencies.
 */
require get_template_directory().'/admin/init.php';

/**
 * Theme set up settings.
 *
 * @return void
 */
add_action('after_setup_theme', function()
{
	// Configure WP 2.9+ Thumbnails.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(50, 50, true);

	// add_image_size('thumbnail-large', 500, '', false);

	// Add support for post formats.
	add_theme_support('post-formats', ['aside', 'gallery', 'image', 'link', 'quote', 'video', 'audio']);
});

/**
 * Enqueue and register scripts the right way.
 *
 * @return  void
 */
add_action('wp_enqueue_scripts', function()
{
	wp_deregister_script('jquery');

	// Example;
	// wp_enqueue_script('main', TEMPLATE_URI . '/scripts/main.min.js', '', '', true);
});

/**
 * Configure Default Title.
 *
 * @return string
 */
add_filter('wp_title', function($title)
{
	$name = get_bloginfo('name');
	$description = get_bloginfo('description');

	if (is_front_page()) { return "$name - $description"; }

	return trim($title).' - '.$name;
});

/**
 * Configure Excerpt String.
 *
 * @return string
 */
add_filter('excerpt_more', function($excerpt)
{
	return '…';
});

/**
 * Change Default Excerpt Length (default: 55).
 *
 * @return integer
 */
add_filter('excerpt_length', function($length)
{
	return 55;
});
