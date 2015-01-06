<?php

/**
 * Setup global configuration variable.
 */
$config = require 'config.php';

/**
 * Register the Composer autoloader.
 */
require WP_CONTENT_DIR.'/../vendor/autoload.php';

/**
 * Load Framework Components.
 */
require get_template_directory().'/library/cleanup.php';
require get_template_directory().'/library/editor.php';
require get_template_directory().'/library/login.php';
require get_template_directory().'/library/pages.php';
require get_template_directory().'/library/updates.php';
require get_template_directory().'/library/utils.php';

/**
 * Enable Gzip if available.
 */
if (extension_loaded('zlib') && (ini_get('output_handler') !== 'ob_gzhandler'))
{
	add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));
}

/**
 * Speed up page load in WordPress 3.8+.
 */
if (!defined('WP_HTTP_BLOCK_EXTERNAL'))
{
	define('WP_HTTP_BLOCK_EXTERNAL', $config['http_block_external']);
}

/**
 * Prevent file edit from WordPress administrator dashboard.
 */
if (!defined('DISALLOW_FILE_EDIT'))
{
	define('DISALLOW_FILE_EDIT', $config['disallow_file_edit']);
}

/**
 * Custom footer text.
 *
 * @return string
 */
add_filter('admin_footer_text', function() use ($config)
{
	return $config['footer_text'];
});
