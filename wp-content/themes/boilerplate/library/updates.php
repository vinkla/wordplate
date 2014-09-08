<?php

/**
 * Remove option to update themes.
 */
remove_action('load-update-core.php', 'wp_update_themes');
wp_clear_scheduled_hook('wp_update_themes');

/**
 * Prevent from seeing core updates.
 */
wp_clear_scheduled_hook('wp_version_check');
remove_action('wp_maybe_auto_update', 'wp_maybe_auto_update');
remove_action('admin_init', 'wp_maybe_auto_update');
remove_action('admin_init', 'wp_auto_update_core');
wp_clear_scheduled_hook('wp_maybe_auto_update');

/**
 * Removes plugin update notification.
 */
remove_action('load-update-core.php', 'wp_update_plugins');
wp_clear_scheduled_hook('wp_update_plugins');

/**
 * Disable all automatic updates.
 */
add_filter('auto_update_translation', '__return_false');
add_filter('automatic_updater_disabled', '__return_true');
add_filter('allow_minor_auto_core_updates', '__return_false');
add_filter('allow_major_auto_core_updates', '__return_false');
add_filter('allow_dev_auto_core_updates', '__return_false');
add_filter('auto_update_core', '__return_false');
add_filter('wp_auto_update_core', '__return_false');
add_filter('auto_core_update_send_email', '__return_false');
add_filter('send_core_update_notification_email', '__return_false');
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');
add_filter('automatic_updates_send_debug_email', '__return_false');
add_filter('automatic_updates_is_vcs_checkout', '__return_true');
add_filter('pre_site_transient_update_plugins','__return_null');
