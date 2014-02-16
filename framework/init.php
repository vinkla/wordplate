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
	require get_template_directory()."/framework/post-types/$type.php";
}

/**
 * Speed up page load in WordPress 3.8+.
 */
define('WP_HTTP_BLOCK_EXTERNAL', true);

/**
 * Prevent file edit from WP admin.
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * Remove Generator for Security reasons.
 */
remove_action('wp_head', 'wp_generator');

/**
 * Hide the admin bar.
 */
show_admin_bar(false);

/**
 * Remove core, plugins and themes update messages.
 */
remove_action('load-update-core.php', 'wp_update_plugins');
add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
add_filter('pre_option_update_core', create_function('$a', "return null;"));
add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;"));
add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));
