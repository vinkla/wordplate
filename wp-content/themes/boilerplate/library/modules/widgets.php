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
 * Disable Default Widgets from WordPress admin.
 *
 * @return void
 */
add_action('widgets_init', function () {
    foreach (config('widgets.widgets') as $widget) {
        unregister_widget($widget);
    }
}, 1);

/**
 * Filters that allow shortcodes in text widgets.
 */
if (config('widgets.shortcodes')) {
    add_filter('widget_text', 'shortcode_unautop');
    add_filter('widget_text', 'do_shortcode');
}
