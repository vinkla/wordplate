<?php

/**
 * Add Server Information view to WordPress admin.
 *
 * @return void
 */
add_action('admin_menu', function () {
    global $wpdb;

    $parent = 'options-general.php';
    $title = 'Server';
    $permission = 'update_core';
    $slug = 'server-settings';

    add_submenu_page($parent, $title, $title, $permission, $slug, function () use ($wpdb) {
        require sprintf('%s/library/views/info.php', get_template_directory());
    });
});
