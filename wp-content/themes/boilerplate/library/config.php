<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Footer Text
	|--------------------------------------------------------------------------
	|
	| Replace the default, Thank you for creating with WordPress, footer text.
	| Specially good when building themes for clients. Promoting yourself.
	|
	*/

	'footer_text' => 'Thank you for creating with <a href="http://github.com/vinkla/wordpress-boilerplate">wordpress-boilerplate</a>.',

	/*
	|--------------------------------------------------------------------------
	| Login Logo
	|--------------------------------------------------------------------------
	|
	| Replace the default login logo with clients logo or name will give your
	| custom built theme an extra touch.
	|
	| Define the width of your custom login logo in pixels.
	|
	*/

	'login_image_path' => sprintf('%s/images/admin-login-logo.png', get_template_directory_uri()),

	'login_image_width' =>  80,

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
	| TinyMCE editor
	|--------------------------------------------------------------------------
	|
	| All tool bar options in WordPress default WYSIWYG editor that doesn't
	| have any custom styling should be removed.
	|
	| Full list of formats http://www.tinymce.com/wiki.php/Controls
	|
	*/

	'tinymce_blockformats' => [
		'Paragraph=p',
		'Heading 2=h2',
		'Heading 3=h3'
	],

	'tinymce_disabled' => [
		'strikethrough',
		'underline',
		'forecolor',
		'justifyfull'
	],

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

	'remove_menu_items' => [
		// removed for user without administrator capabilities
		'default' => [
			'appearance',
			'comments',
			'dashboard',
			'media',
			'plugins',
			'settings',
			'tools',
			'users'
		],

		// removed for user with administrator capabilities
		'administrator' => [
			'comments',
			'dashboard',
			'media'
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Remove Menu Bar Links
	|--------------------------------------------------------------------------
	|
	| The menu bar in WordPress administrator dashboard looks cluttered.
	| Remove unnecessary links, users should only see what the actually need.
	|
	*/

	'remove_menu_bar_links' => [
		'comments',
		'wp-logo',
		'edit',
		'appearance',
		'view',
		'new-content',
		'updates',
		'search'
	],

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

	'remove_dashboard_widgets' => [
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
			'dashboard_right_now',
			'dashboard_activity'
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Remove Meta Boxes
	|--------------------------------------------------------------------------
	|
	| Remove unnecessary custom fields and meta boxes to cleanup the edit posts
	| view. Lets be honest, how often do you even use some of these boxes?
	|
	*/

	'meta_boxes' => [
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
			'sqpt-meta-tags',
			'slugdiv',
			//'categorydiv',
			//'tagsdiv-post_tag'
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Disable Default Widgets
	|--------------------------------------------------------------------------
	|
	| Hide and disable default widgets within WordPress core. Add widgets to
	| the list to leave them out of WordPress admin.
	|
	*/

	'widgets' => [
		'WP_Widget_Pages',
		'WP_Widget_Calendar',
		'WP_Widget_Archives',
		'WP_Widget_Meta',
		'WP_Widget_Search',
		'WP_Widget_Categories',
		'WP_Widget_Recent_Posts',
		'WP_Widget_Recent_Comments',
		'WP_Widget_RSS',
		'WP_Widget_Tag_Cloud'
	],

	/*
	|--------------------------------------------------------------------------
	| Hide Panel Tabs
	|--------------------------------------------------------------------------
	|
	| Remove and hide screen options and help panel tab. This will make the
	| administrator interface more cleaned up for users.
	|
	*/

	'panel_tabs' => [
		'help' => false,
		'screen_options' => false
	]
];
