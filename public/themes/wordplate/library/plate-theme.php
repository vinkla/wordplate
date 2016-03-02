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
 * Theme setup defaults.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    // Add support for post formats.
    add_theme_support('post-formats', ['aside', 'audio', 'gallery', 'image', 'link', 'quote', 'video']);

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 support.
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'widgets']);
});

/**
 * Configure excerpt string.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return '...';
});

/**
 * Change default excerpt length (default: 55).
 *
 * @return int
 */
add_filter('excerpt_length', function () {
    return 101;
});
