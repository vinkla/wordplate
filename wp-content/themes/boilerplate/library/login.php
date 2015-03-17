<?php

/**
 * Custom login logo.
 *
 * @return void
 */
add_action('login_head', function () use ($config) {
    $path = $config['login_image_path'];
    $width = sprintf('%spx', $config['login_image_width']);

    echo "<style> h1 a { background-image:url($path) !important; background-size: 100% auto !important; width: $width !important; } </style>";
});

/**
 * Add custom login error message.
 */
add_filter('login_errors', function () use ($config) {
    return $config['login_error_message'];
});

/**
 * Custom login logo url.
 *
 * @return string
 */
add_filter('login_headerurl', function () {
    return get_site_url();
});
