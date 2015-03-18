<?php

/**
 * Custom footer text.
 *
 * @return string
 */
add_filter('admin_footer_text', function () use ($config) {
    return $config['footer']['footer_text'];
});
