<?php

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');

    add_theme_support('title-tag');

    register_nav_menus([
        'navigation' => __('Navigation'),
    ]);
});

add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);
