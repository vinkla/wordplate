<?php

/**
 * Prevent file edit from WP admin.
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * Remove Generator for Security.
 */
remove_action('wp_head', 'wp_generator');

/**
 * Add custom login error message.
 */
add_filter('login_errors', function()
{
	return LOGIN_ERROR_MESSAGE;
});
