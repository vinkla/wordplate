<?php

/**
 * Custom login logo.
 *
 * @return void
 */
add_action('login_head', function()
{
	$path = ADMIN_URL.'/images/admin-login-logo.png';
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
	return 'Thank you for creating with <a href="'.AUTHOR_URL.'">'.AUTHOR.'</a>.';
});

/**
 * Force Perfect JPG Images.
 *
 * @return  integer
 */
add_filter('jpeg_quality', function()
{
	return 100;
});

/**
 * Filters that allow shortcodes in Text Widgets
 */
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
