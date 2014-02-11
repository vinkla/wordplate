<?php

/**
 * Add Server Information view to WP admin.
 */
add_action('admin_menu', function()
{
	global $wpdb;

	$parent = 'options-general.php';
	$title = 'Server Information';
	$permission = 'update_core';
	$slug = 'server-information';

	add_submenu_page($parent, $title, $title, $permission, $slug, function() use ($wpdb)
	{
		require TEMPLATE_DIR.'/framework/views/server-information.php';
	});
});
