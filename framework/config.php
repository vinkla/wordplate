<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Custom Post Types
	|--------------------------------------------------------------------------
	|
	| Register custom post types. Remember to create the post types within
	| post-types directory before registering them here.
	|
	*/

	'custom_post_types' => array(
		// 'book'
	),

	/*
	|--------------------------------------------------------------------------
	| Footer Text
	|--------------------------------------------------------------------------
	|
	| Replace the default, Thank you for creating with WordPress, footer text.
	| Specially good when building themes for clients. Promoting yourself.
	|
	*/

	'footer_text' => 'Thank you for creating with <a href="http://vinkla.com">Vincent Klaiber</a>.',

	/*
	|--------------------------------------------------------------------------
	| Login Logo
	|--------------------------------------------------------------------------
	|
	| Replace the default login logo with clients logo or name will give your
	| custom built theme an extra touch.
	|
	*/

	'login_image_path' => get_template_directory().'/images/admin-login-logo.png',

	/*
	|--------------------------------------------------------------------------
	| Login Error Message
	|--------------------------------------------------------------------------
	|
	| It is good practice to replace the login error message for security
	| reasons. We don't wanna give unwanted guests any feedback except that
	| he/she can't login without the right credentials.
	|
	*/

	'login_error_message' => 'Whoops! Looks like you missed something there. Have another go.',

	/*
	|--------------------------------------------------------------------------
	| JPEG Quality
	|--------------------------------------------------------------------------
	|
	| WordPress does automatically compress JPEG images at 90% quality. Setting
	| it to 100 would mean that WordPress would compress the image at its
	| highest quality.
	|
	*/

	'jpeg_quality' => 100,

	/*
	|--------------------------------------------------------------------------
	| Block External HTTP Requests
	|--------------------------------------------------------------------------
	|
	| On each page load in the administrator area, WordPress sends HTTP
	| requests to check for new updates for themes and plugins. To block
	| external HTTP requests right in WordPress's core itself set this to true.
	|
	*/

	'http_block_external' => true,

	/*
	|--------------------------------------------------------------------------
	| Disallow File Edit
	|--------------------------------------------------------------------------
	|
	| Occasionally you may wish to disable the plugin or theme editor to
	| prevent overzealous users from being able to edit sensitive files and
	| potentially crash the site.
	|
	*/

	'disallow_file_edit' => true,

	/*
	|--------------------------------------------------------------------------
	| Show Admin Bar
	|--------------------------------------------------------------------------
	|
	| Set the display status of the Toolbar for the front side of your website
	| (you cannot turn off the toolbar on the WordPress dashboard).
	|
	*/

	'show_admin_bar' => false,

	/*
	|--------------------------------------------------------------------------
	| TinyMCE editor
	|--------------------------------------------------------------------------
	|
	| All tool bar options in WordPress default WYSIWYG editor that doesn't
	| have any custom styling should be removed.
	|
	| Full list of formats http://www.tinymce.com/wiki.php/Controls
	|
	*/

	'tinymce_blockformats' => array('p', 'h2', 'h3'),
	'tinymce_disabled' => array(
		'strikethrough',
		'underline',
		'forecolor',
		'justifyfull'
	),

	/*
	|--------------------------------------------------------------------------
	| Remove Menu Items
	|--------------------------------------------------------------------------
	|
	| Giving clients and users access to everything within the administrator
	| dashboard is bad practice. Try to give them access to what they actually
	| need and will use.
	|
	| Specified below which menu items should be deleted for which users.
	|
	| Available items: appearance, comments, dashboard, media, plugins, pages,
	| posts, settings, tools, users
	|
	*/

	'remove_menu_items' => array(
		// removed for user without administrator capabilities
		'default' => array(
			'appearance',
			'comments',
			'dashboard',
			'media',
			'plugins',
			'settings',
			'tools',
			'users'
		),
		// removed for user with administrator capabilities
		'administrator' => array(
			'comments',
			'dashboard',
			'media'
		)
	),

	/*
	|--------------------------------------------------------------------------
	| Remove Menu Bar Links
	|--------------------------------------------------------------------------
	|
	| The menu bar in WordPress administrator dashboard looks cluttered.
	| Remove unnecessary links, users should only see what the actually need.
	|
	*/

	'remove_menu_bar_links' => array(
		'comments',
		'wp-logo',
		'edit',
		'appearance',
		'view',
		'new-content',
		'updates',
		'search'
	),

	/*
	|--------------------------------------------------------------------------
	| Remove Dashboard Widgets
	|--------------------------------------------------------------------------
	|
	| Remove dashboard widgets to cleanup the administrator dashboard. Most
	| clients and user will never even bother using them. Instead, replace the
	| widgets with something more useful like Yahoo weather reports ;).
	|
	*/

	'remove_dashboard_widgets' => array(
		'side' => array(
			'dashboard_primary',
			'dashboard_secondary',
			'dashboard_quick_press',
			'dashboard_recent_drafts'
		),
		'normal' => array(
			'dashboard_plugins',
			'dashboard_recent_comments',
			'dashboard_incoming_links',
			'dashboard_right_now',
			'dashboard_activity'
		)
	),

	/*
	|--------------------------------------------------------------------------
	| Remove Meta Boxes
	|--------------------------------------------------------------------------
	|
	| Remove unnecessary custom fields and meta boxes to cleanup the edit posts
	| view. Lets be honest, how often do you even use some of these boxes?
	|
	*/

	'meta_boxes' => array(
		'link' => array(
			'linktargetdiv',
			'linkxfndiv',
			'linkadvanceddiv',
		),
		'post' => array(
			'postexcerpt',
			'trackbacksdiv',
			'postcustom',
			'commentstatusdiv',
			'commentsdiv',
			'revisionsdiv',
			'authordiv',
			'sqpt-meta-tags',
			'slugdiv',
			//'categorydiv',
			//'tagsdiv-post_tag'
		)
	),

	/*
	|--------------------------------------------------------------------------
	| Hide Panel Tabs
	|--------------------------------------------------------------------------
	|
	| Remove and hide screen options and help panel tab. This will make the
	| administrator interface more leaned up for users.
	|
	*/

	'panel_tabs' => array(
		'help' => true,
		'screen_options' => true
	)
);
