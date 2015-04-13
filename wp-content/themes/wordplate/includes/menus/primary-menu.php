<?php

/**
 * Add a primary WordPress menu.
 */
add_action('after_setup_theme', function () {
    register_nav_menu('primary-menu', __('Primary Menu', 'boilerplate'));
});
