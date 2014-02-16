<?php

return array(
	/**
	 * Register custom post types.
	 * Remember to create the post types within post-types directory.
	 */
	'custom_post_types' => array(
		// 'book'
	),

	/**
	 * Replace footer text.
	 */
	'footer_text' => 'Thank you for creating with <a href="http://vinkla.com">Vincent Klaiber</a>.',

	/**
	 * Replace login logo with custom image.
	 */
	'login_image_path' => get_template_directory().'/images/admin-login-logo.png',

	/**
	 * Replace login error message for security reseaons.
	 */
	'login_error_message' => 'Whoops! Looks like you missed something there. Have another go.',

	/**
	 * Modifying TinyMCE editor to remove unused items.
 	 * http://www.tinymce.com/wiki.php/Controls
	 */
	'tinymce_blockformats' => array('p', 'h2', 'h3'),
	'tinymce_disabled' => array(
		'strikethrough',
		'underline',
		'forecolor',
		'justifyfull'
	),

	/**
	 * Remove menu items in admin.
	 */
	'remove_menu_items' => array(
		// '#menu-posts',
		// '#menu-pages',
		// '#menu-media',
		'#menu-dashboard',
		'#menu-comments',
	),

	/**
	 * Remove menu items for everyone except admin user role.
	 */
	'remove_menu_items_except_admin' => array(
		'#menu-settings',
		'#menu-appearance',
		'#menu-plugins',
		'#menu-users',
		'#menu-tools'
	),

	/**
	 * Remove links from admin toolbar.
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

	/**
	 * Remove unwanted dashboard widgets.
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

	/**
	 * Remove meta boxes in post edit.
	 */
	'remove_post_edit_meta_boxes' => array(
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
			'sqpt-meta-tags'
		)
	)
);
