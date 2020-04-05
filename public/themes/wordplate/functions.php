<?php

declare(strict_types=1);

add_action('after_setup_theme', function () {
    show_admin_bar(false);

    add_theme_support('post-thumbnails');

    add_theme_support('title-tag');

    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});

add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);
