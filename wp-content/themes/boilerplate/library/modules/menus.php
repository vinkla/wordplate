<?php

/**
 * Remove menu items depending on user role.
 *
 * @return void
 */
add_action('admin_head', function () use ($config) {
    $elements = '#menu-';
    $separator = ', #menu-';

    if (current_user_can('manage_options')) {
        $elements .= implode($separator, $config['menus']['remove_menu_items']['administrator']);
    } else {
        $elements .= implode($separator, $config['menus']['remove_menu_items']['default']);
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
add_action('admin_bar_menu', function ($wp_admin_bar) use ($config) {
    $nodes = $config['menus']['remove_menu_bar_links'];

    foreach ($nodes as $node) {
        $wp_admin_bar->remove_node($node);
    }
}, 999);

/**
 * Remove help panel tab.
 *
 * @return void
 */
add_action('admin_head', function () use ($config) {
    if (!$config['menus']['panel_tabs']['help']) {
        $screen = get_current_screen();
        $screen->remove_help_tabs();
    }
});

/**
 * Remove screen options tab.
 *
 * @return void
 */
add_filter('screen_options_show_screen', function () use ($config) {
    if (isset($config['menus']['panel_tabs']['screen_options'])) {
        return $config['menus']['panel_tabs']['screen_options'];
    }
});
