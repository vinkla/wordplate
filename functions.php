<?php

/**
 * Load admin dependencies
 */
$tempdir = get_template_directory();
require_once($tempdir.'/admin/init.php');

/**
 * Filter wp_title with name and description.
 */
add_filter('wp_title', function($title)
{
	$name = get_bloginfo('name');
	$description = get_bloginfo('description');

	if (is_front_page()) { return "$name - $description"; }

	return trim($title).' - '.$name;
});
