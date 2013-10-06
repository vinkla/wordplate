<?php

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
		'#menu-tools',
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
			'li#menu-users'
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

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
});

/**
 * Remove update messages.
 *
 * @return void
 */
add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
add_filter('pre_option_update_core', create_function('$a', "return null;"));

/**
 * Remove links from admin toolbar.
 *
 * @return void
 */
add_action('admin_bar_menu', function($wp_admin_bar)
{
	$nodes = array(
		'comments',
		'wp-logo',
		'edit',
		'appearance',
		'view',
		'new-content',
		'updates',
		'search'
	);

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
add_action('admin_head', function() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
});

/**
 * Remove meta boxes in post edit.
 *
 * @return void
 */
add_action( 'admin_menu', function()
{
	remove_meta_box('linktargetdiv', 'link', 'normal');
	remove_meta_box('linkxfndiv', 'link', 'normal');
	remove_meta_box('linkadvanceddiv', 'link', 'normal');
	remove_meta_box('postexcerpt', 'post', 'normal');
	remove_meta_box('trackbacksdiv', 'post', 'normal');
	remove_meta_box('postcustom', 'post', 'normal');
	remove_meta_box('commentstatusdiv', 'post', 'normal');
	remove_meta_box('commentsdiv', 'post', 'normal');
	remove_meta_box('revisionsdiv', 'post', 'normal');
	remove_meta_box('authordiv', 'post', 'normal');
	remove_meta_box('sqpt-meta-tags', 'post', 'normal');
});

/**
 * Remove Generator for Security
 */
remove_action('wp_head', 'wp_generator');
