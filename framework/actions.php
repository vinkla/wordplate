<?php

/**
 * Custom login logo.
 *
 * @return void
 */
add_action('login_head', function() use ($config)
{
	$path = $config['login_image_path'];
	echo "<style> h1 a { background-image:url($path) !important; background-size: auto auto !important; } </style>";
});

/**
 * Add Server Information view to WP admin.
 */
add_action('admin_menu', function() use ($config)
{
	global $wpdb;

	$parent = 'options-general.php';
	$title = 'Server';
	$permission = 'update_core';
	$slug = 'server-settings';

	add_submenu_page($parent, $title, $title, $permission, $slug, function() use ($wpdb)
	{
		require get_template_directory().'/framework/views/server-settings.php';
	});
});


/**
 * Remove menu items deppended on user role.
 *
 * @return void
 */
add_action('admin_head', function() use ($config)
{
	$elements = '#menu-';
	$separator = ', #menu-';

	if (is_admin())
	{
		$elements .= implode(
			$separator,
			$config['remove_menu_items']['administrator']
		);
	}
	else
	{
		$elements .= implode(
			$separator,
			$config['remove_menu_items']['default']
		);
	}

	echo "<style> $elements { display: none !important; } </style>";
});

/**
 * Remove unwanted dashboard widgets.
 *
 * @return void
 */
add_action('wp_dashboard_setup', function() use ($config)
{
	global $wp_meta_boxes;

	$positions = $config['remove_dashboard_widgets'];

	foreach ($positions as $position => $boxes)
	{
		foreach ($boxes as $box)
		{
			unset($wp_meta_boxes['dashboard'][$position]['core'][$box]);
		}
	}
});

/**
 * Remove links from admin toolbar.
 *
 * @return void
 */
add_action('admin_bar_menu', function($wp_admin_bar) use ($config)
{
	$nodes = $config['remove_menu_bar_links'];

	foreach ($nodes as $node)
	{
		$wp_admin_bar->remove_node($node);
	}
}, 999);

/**
 * Remove help panel tab.
 *
 * @return void
 */
add_action('admin_head', function() use ($config)
{
	if (!$config['panel_tabs']['help'])
	{
		$screen = get_current_screen();
		$screen->remove_help_tabs();
	}
});

/**
 * Remove meta boxes in post edit.
 *
 * @return void
 */
add_action('admin_menu', function() use ($config)
{
	$types = $config['meta_boxes'];

	foreach ($types as $type => $boxes)
	{
		foreach ($boxes as $box)
		{
			remove_meta_box($box, $type, 'normal');
		}
	}
});

