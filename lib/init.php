<?php

/**
 * Setup global configuration variable.
 */
$config = require 'config.php';

/**
 * Register the Composer autoloader.
 */
require get_template_directory().'/vendor/autoload.php';

/**
 * Load Framework Components.
 */
require get_template_directory().'/lib/cleanup.php';
require get_template_directory().'/lib/editor.php';
require get_template_directory().'/lib/login.php';
require get_template_directory().'/lib/pages.php';
require get_template_directory().'/lib/updates.php';
require get_template_directory().'/lib/utils.php';

/**
 * Speed up page load in WordPress 3.8+.
 */
define('WP_HTTP_BLOCK_EXTERNAL', $config['http_block_external']);

/**
 * Prevent file edit from WordPress administrator dashboard.
 */
define('DISALLOW_FILE_EDIT', $config['disallow_file_edit']);

/**
 * Custom footer text.
 *
 * @return string
 */
add_filter('admin_footer_text', function() use ($config)
{
	return $config['footer_text'];
});
