<?php

/**
 * Load admin dependencies.
 */
$tempdir = get_template_directory();
require_once($tempdir.'/admin/init.php');

/**
 * Theme set up settings.
 */
add_action('after_setup_theme', function()
{
	// Configure WP 2.9+ Thumbnails.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(50, 50, true);
	add_image_size('thumbnail-large', 500, '', false);

	// Add support for post formats.
	add_theme_support('post-formats', ['aside', 'gallery', 'image', 'link', 'quote', 'video', 'audio']);
});

/**
 * Configure Default Title.
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
 */
add_filter('wp_trim_excerpt', function($excerpt)
{
	return str_replace('[...]', '…', $excerpt);
});

/**
 * Change Default Excerpt Length.
 */
add_filter('excerpt_length', function($length)
{
	return 55;
});
