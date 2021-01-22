<?php

function wordplate_after_setup_theme()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus([
        'navigation' => __('Navigation'),
    ]);
}

add_action('after_setup_theme', 'wordplate_after_setup_theme');
