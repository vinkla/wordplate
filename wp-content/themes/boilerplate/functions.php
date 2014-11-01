<?php

/**
 * Load admin dependencies.
 */
require get_template_directory().'/library/init.php';

/**
 * Load admin includes.
 */
require get_template_directory().'/includes/init.php';

/**
 * Theme set up settings.
 *
 * @return void
 */
add_action('after_setup_theme', function()
{
	// Configure WP 2.9+ Thumbnails.
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(50, 50, true);
	// add_image_size('thumbnail-large', 500, '', false);

	// Add support for post formats.
	// $formats = ['aside', 'gallery', 'image', 'link', 'quote', 'video', 'audio'];
	// add_theme_support('post-formats', $formats);

	// Show the admin bar.
	show_admin_bar(false);
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
	// wp_enqueue_script('main', get_template_directory_uri().'/scripts/main.js', '', '', true);

  wp_enqueue_style('boilerplate', get_template_directory_uri().'/assets/styles/boilerplate.css');
  wp_register_script('boilerplate', get_template_directory_uri().'/assets/scripts/boilerplate.js', '', '', true);

  wp_enqueue_script('boilerplate');
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

	if (is_front_page())
	{
		if ($description) { return sprintf('%s - %s', $name, $description); }

		return $name;
	}

	return sprintf('%s - % s', trim($title), $name);
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
