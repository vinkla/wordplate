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
 * @return integer
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

/**
 * Force slug to update on save.
 *
 * @return array
 */
add_filter('wp_insert_post_data', function($data, $postarr) {
    if (!in_array($data['post_status'], ['draft', 'pending', 'auto-draft'])) {

        $title = $data['post_title'];
        $characters = [
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
        ];
        $title = strtr($title, $table);
        $title = preg_replace('/[^a-zA-Z0-9]/', '-', $title);

        $data['post_name'] = sanitize_title_with_dashes($title);
    }

    return $data;
}, 99, 2 );
