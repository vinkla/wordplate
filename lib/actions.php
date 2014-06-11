<?php

/**
 * Custom login logo.
 *
 * @return void
 */
add_action('login_head', function() use ($config)
{
	$path 	= $config['login_image_path'];
	$width 	= $config['login_image_width'];

	echo "<style> h1 a { background-image:url($path) !important; background-size: 100% auto !important; width: $width !important; } </style>";
});

/**
 * Cleanup WordPress wp_head().
 */
add_action('init', function()
{
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
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

	if (current_user_can('manage_options'))
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

