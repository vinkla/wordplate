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

	add_submenu_page($parent, $title, $title, $permission, $slug, function() use ($wpdb, $config)
	{
		require $config['template_dir'].'/framework/views/server-settings.php';
	});
});


/**
 * Remove menu items deppended on user role.
 *
 * @return void
 */
add_action('admin_head', function()
{
	$elements = implode(', ', [
		// '#menu-posts',
		// '#menu-pages',
		'#menu-dashboard',
		'#menu-comments',
		'#menu-media',

		// Include update messages.
		'#footer-upgrade',
		'#wp-admin-bar-updates',
		'.update-nag',
	]);

	if (!is_admin())
	{
		$elements .= ','.implode(', ', [
			'#menu-settings',
			'#menu-appearance',
			'#menu-plugins',
			'#menu-users',
			'#menu-tools'
		]);
	}

	echo "<style> $elements { display: none !important; } </style>";
});

/**
 * Remove unwanted dashboard widgets.
 *
 * @return void
 */
add_action('wp_dashboard_setup', function()
{
	global $wp_meta_boxes;

	$positions = [
		'side' => [
			'dashboard_primary',
			'dashboard_secondary',
			'dashboard_quick_press',
			'dashboard_recent_drafts'
		],
		'normal' => [
			'dashboard_plugins',
			'dashboard_recent_comments',
			'dashboard_incoming_links',
			'dashboard_right_now'
		]
	];

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
add_action('admin_bar_menu', function($wp_admin_bar)
{
	$nodes = [
		'comments',
		'wp-logo',
		'edit',
		'appearance',
		'view',
		'new-content',
		'updates',
		'search'
	];

	foreach($nodes as $node)
	{
		$wp_admin_bar->remove_node($node);
	}
}, 999);

/**
 * Remove help tab.
 *
 * @return void
 */
add_action('admin_head', function()
{
	$screen = get_current_screen();
	$screen->remove_help_tabs();
});

/**
 * Remove meta boxes in post edit.
 *
 * @return void
 */
add_action('admin_menu', function()
{
	$types = [
		'link' => [
			'linktargetdiv',
			'linkxfndiv',
			'linkadvanceddiv',
		],
		'post' => [
			'postexcerpt',
			'trackbacksdiv',
			'postcustom',
			'commentstatusdiv',
			'commentsdiv',
			'revisionsdiv',
			'authordiv',
			'sqpt-meta-tags'
		]
	];

	foreach ($types as $type => $boxes)
	{
		foreach ($boxes as $box)
		{
			remove_meta_box($box, $type, 'normal');
		}
	}
});

