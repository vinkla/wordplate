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
 * Force slug to update on save.
 *
 * @return $string
 */
add_filter('wp_insert_post_data', function($data, $postarr)
{
    if (!in_array($data['post_status'], ['draft', 'pending', 'auto-draft']))
    {
        $data['post_name'] = sanitize_title_with_dashes($data['post_title']);
    }

    return $data;
}, 99, 2 );

/**
 * Force Perfect JPG Images.
 *
 * @return  integer
 */
add_filter('jpeg_quality', function()
{
	return 100;
});
