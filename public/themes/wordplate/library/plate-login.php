<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Add custom login logo url.
 *
 * @return string
 */
add_filter('login_headerurl', function () {
    return get_bloginfo('url');
});

/**
 * Add custom login error message.
 *
 * @return string|null
 */
add_filter('login_errors', function () {
    return '<strong>Whoops!</strong> Looks like you missed something there. Have another go.';
});

/**
 * Add custom login logo.
 *
 * @return void
 */
add_action('login_head', function () {
    $path = sprintf('%s/%s', get_bloginfo('url'), 'logo.png');

    echo "<style> h1 a { background-image: url($path) !important; background-size: 100% auto !important; width: 200px !important; } </style>";
});
