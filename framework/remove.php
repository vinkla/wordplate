<?php

/**
 * Speed up page load in WordPress 3.8+.
 */
define('WP_HTTP_BLOCK_EXTERNAL', true);

/**
 * Remove the admin bar.
 */
show_admin_bar(false);

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
 * Modifying TinyMCE editor to remove unused items.
 *
 * Controls: http://www.tinymce.com/wiki.php/Controls
 */
add_filter('tiny_mce_before_init', function($init)
{
	// Add block format elements you want to show in dropdown
	$init['theme_advanced_blockformats'] = TINYMCE_BLOCKFORMATS;
	$init['theme_advanced_disable'] = TINYMCE_DISABLED;

	return $init;
});

/**
 * Remove core, plugins and themes update messages.
 *
 * @return void
 */
remove_action('load-update-core.php', 'wp_update_plugins');
add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
add_filter('pre_option_update_core', create_function('$a', "return null;"));
add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;"));
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));

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
 * Remove screen options tab.
 *
 * @return void
 */
add_filter('screen_options_show_screen', function()
{
    return false;
});

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

