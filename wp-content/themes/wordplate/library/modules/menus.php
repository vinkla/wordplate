<?php

/*
 * This file is part of WordPress Boilerplate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Remove menu items depending on user role.
 *
 * @return void
 */
add_action('admin_head', function () {
    $elements = '#menu-';
    $separator = ', #menu-';

    if (current_user_can('manage_options')) {
        $elements .= implode($separator, config('menus.remove_menu_items.administrator'));
    } else {
        $elements .= implode($separator, config('menus.remove_menu_items.default'));
    }

    echo sprintf('<style> %s { display: none !important; } </style>', $elements);
});

/**
 * Remove links from admin toolbar.
 *
 * @param $wp_admin_bar
 *
 * @return void
 */
add_action('admin_bar_menu', function ($wp_admin_bar) {
    $nodes = config('menus.remove_menu_bar_links');

    foreach ($nodes as $node) {
        $wp_admin_bar->remove_node($node);
    }
}, 999);

/**
 * Remove help panel tab.
 *
 * @return void
 */
add_action('admin_head', function () {
    if (!config('menus.panel_tabs.help')) {
        $screen = get_current_screen();
        $screen->remove_help_tabs();
    }
});

/**
 * Remove screen options tab.
 *
 * @return void
 */
add_filter('screen_options_show_screen', function () {
    return config('menus.panel_tabs.screen_options', true);
});
