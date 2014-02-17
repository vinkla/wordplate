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
require get_template_directory().'/framework/helpers.php';
require get_template_directory().'/framework/actions.php';
require get_template_directory().'/framework/filters.php';

/**
 * Load Custom Post Types.
 */
foreach ($config['custom_post_types'] as $type)
{
	$path = get_template_directory()."/framework/post-types/$type.php";

	if (file_exists($path)) { require $path; }
}

/**
 * Speed up page load in WordPress 3.8+.
 */
define('WP_HTTP_BLOCK_EXTERNAL', $config['http_block_external']);

/**
 * Prevent file edit from WordPress administrator dashboard.
 */
define('DISALLOW_FILE_EDIT', $config['disallow_file_edit']);

/**
 * Remove Generator for Security reasons.
 */
remove_action('wp_head', 'wp_generator');

/**
 * Hide the admin bar.
 */
show_admin_bar(false);

/**
 * Remove option to update themes.
 */
remove_action('load-update-core.php','wp_update_themes');
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_update_themes');

/**
 * Prevent from seeing core updates.
 */
remove_action('admin_notices', 'update_nag', 3);
add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

/**
 * Removes plugin update notification.
 */
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_update_plugins');

