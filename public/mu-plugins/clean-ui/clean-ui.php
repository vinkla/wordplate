<?php

/*
 * Plugin Name: Clean UI
 * Description: Take control over the administration dashboard.
 * Author: Vincent Klaiber
 * Author URI: https://github.com/vinkla
 * Version: 1.0.0
 * Plugin URI: https://github.com/vinkla/wordplate
 */

// Remove administrator menu items.
function clean_ui_menu_items(): void
{
    remove_menu_page('edit-comments.php'); // Comments
    // remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('index.php'); // Dashboard
    // remove_menu_page('upload.php'); // Media
}

add_action('admin_init', 'clean_ui_menu_items');

// Remove administrator toolbar menu items.
function clean_ui_toolbar_items($menu): void
{
    $menu->remove_node('comments'); // Comments
    $menu->remove_node('customize'); // Customize
    $menu->remove_node('dashboard'); // Dashboard
    $menu->remove_node('edit'); // Edit
    $menu->remove_node('menus'); // Menus
    $menu->remove_node('new-content'); // New Content
    $menu->remove_node('search'); // Search
    // $menu->remove_node('site-name'); // Site Name
    $menu->remove_node('themes'); // Themes
    $menu->remove_node('updates'); // Updates
    $menu->remove_node('view-site'); // Visit Site
    $menu->remove_node('view'); // View
    $menu->remove_node('widgets'); // Widgets
    $menu->remove_node('wp-logo'); // WordPress Logo
}

add_action('admin_bar_menu', 'clean_ui_toolbar_items', 999);

// Remove administrator dashboard widgets.
function clean_ui_dashboard_widgets(): void
{
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // Activity
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // At a Glance
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']); // Site Health Status
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Events and News
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Draft
}

add_action('wp_dashboard_setup', 'clean_ui_dashboard_widgets');

// Add custom login form logo.
function clean_ui_logo(): void
{
    $url = get_theme_file_uri('favicon.svg');
    $width = 200;

    $styles = [
        sprintf('background-image: url(%s);', $url),
        sprintf('width: %dpx;', $width),
        'background-position: center;',
        'background-size: contain;',
    ];

    echo sprintf(
        '<style> .login h1 a { %s } </style>',
        implode('', $styles)
    );
}

add_action('login_head', 'clean_ui_logo');
