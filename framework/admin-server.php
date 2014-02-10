<?php
/**
 * OS
 * Server
 * Server Hostname
 * Server IP:Port
 * Server Document Root
 * Server Admin
 * Server Load
 * Server Date/Time
 *
 * MySQL
 * Database Index Disk Usage
 * Database Data Disk Usage
 * MYSQL Maximum Packet Size
 * MYSQL Maximum No. Connection
 *
 * PHP version
 * PHP Memory Limit
 * PHP Max Upload Size
 * PHP Max Post Size
 * PHP Max Script Execute Time
 */
add_action('admin_menu', function()
{
	$parent = 'options-general.php';
	$title = 'Server Information';
	$permission = 'update_core';
	$slug = 'server-information';

	add_submenu_page($parent, $title, $title, $permission, $slug, function()
	{
		require TEMPLATE_DIR.'/framework/views/server-information.php';
	});
});
