<?php

/**
 * Setup global configuration variable.
 */
$config = require 'config.php';

/**
 * Register the Composer autoloader.
 */
require $config['template_dir'].'/vendor/autoload.php';

/**
 * Load Framework Components.
 */
require $config['template_dir'].'/framework/helpers.php';
require $config['template_dir'].'/framework/actions.php';
require $config['template_dir'].'/framework/filters.php';

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
