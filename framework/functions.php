<?php

/**
 * Speed up page load in WordPress 3.8+.
 */
define('WP_HTTP_BLOCK_EXTERNAL', true);

/**
 * Custom login logo.
 *
 * @return void
 */
add_action('login_head', function()
{
	$path = LOGIN_IMAGE_PATH;
	echo "<style> h1 a { background-image:url($path) !important; background-size: auto auto !important; } </style>";
});

/**
 * Custom login logo url.
 *
 * @return string
 */
add_filter('login_headerurl', function()
{
	return LOGIN_HEADER_URL;
});

/**
 * Custom footer text.
 *
 * @return void
 */
add_filter('admin_footer_text', function()
{
	return FOOTER_TEXT;
});

/**
 * Force perfect JPG images.
 *
 * @return integer
 */
add_filter('jpeg_quality', function()
{
	return 100;
});

/**
 * Filters that allow shortcodes in text widgets.
 */
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

/**
 * Force slug to update on save.
 *
 * @return array
 */
add_filter('wp_insert_post_data', function($data, $postarr) {
	if (!in_array($data['post_status'], ['draft', 'pending', 'auto-draft']))
	{
		$title = remove_accents($data['post_title']);
		$data['post_name'] = sanitize_title_for_query($title);
	}

	return $data;
}, 99, 2);
