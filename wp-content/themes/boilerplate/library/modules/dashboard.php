<?php

/**
 * Remove unwanted dashboard widgets.
 *
 * @return void
 */
add_action('wp_dashboard_setup', function () use ($config) {
    global $wp_meta_boxes;

    $positions = $config['dashboard']['remove_dashboard_widgets'];

    foreach ($positions as $position => $boxes) {
        foreach ($boxes as $box) {
            unset($wp_meta_boxes['dashboard'][$position]['core'][$box]);
        }
    }
});
