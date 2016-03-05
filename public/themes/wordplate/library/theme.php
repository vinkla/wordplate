<?php

/*
 * Set custom theme defaults.
 */
add_action('after_setup_theme', function () {
    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Show the admin bar.
    show_admin_bar(false);

    // Add support for post formats.
    //add_theme_support('post-formats', ['aside', 'audio', 'gallery', 'image', 'link', 'quote', 'video']);

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 support.
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'widgets']);
});

/*
 * Register Soil modules.
 */
add_theme_support('soil-clean-up');
add_theme_support('soil-disable-asset-versioning');
add_theme_support('soil-disable-trackbacks');
add_theme_support('soil-google-analytics', env('GOOGLE_ANALYTICS'), 'wp_head');
add_theme_support('soil-js-to-footer');
add_theme_support('soil-nice-search');
add_theme_support('soil-relative-urls');

/*
 * Set custom excerpt more.
 */
add_filter('excerpt_more', function () {
    return '...';
});

/*
 * Set custom excerpt length.
 */
add_filter('excerpt_length', function () {
    return 101;
});
