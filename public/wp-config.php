<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

// Load the environment variables.
Dotenv::createImmutable(realpath(__DIR__ . '/../'))->safeLoad();

// Set the environment type.
define('WP_ENVIRONMENT_TYPE', env('WP_ENVIRONMENT_TYPE', 'production'));

// Set the default WordPress theme.
define('WP_DEFAULT_THEME', env('WP_DEFAULT_THEME', 'wordplate'));

// For developers: WordPress debugging mode.
$isDebugModeEnabled = env('WP_DEBUG', false);
define('WP_DEBUG', $isDebugModeEnabled);
define('WP_DEBUG_LOG', env('WP_DEBUG_LOG', false));
define('WP_DEBUG_DISPLAY', env('WP_DEBUG_DISPLAY', $isDebugModeEnabled));
define('SCRIPT_DEBUG', env('SCRIPT_DEBUG', $isDebugModeEnabled));

// The database configuration with database name, username, password,
// hostname charset and database collate type.
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST', '127.0.0.1'));
define('DB_CHARSET', env('DB_CHARSET', 'utf8mb4'));
define('DB_COLLATE', env('DB_COLLATE', 'utf8mb4_unicode_ci'));

// Set the unique authentication keys and salts.
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

// Detect HTTPS behind a reverse proxy or a load balancer.
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// Set the home url to the current domain.
define('WP_HOME', env('WP_HOME', Request::createFromGlobals()->getSchemeAndHttpHost()));

// Set the WordPress directory path.
define('WP_SITEURL', env('WP_SITEURL', sprintf('%s/%s', WP_HOME, env('WP_DIR', 'wordpress'))));

// Set the WordPress content directory path.
define('WP_CONTENT_DIR', env('WP_CONTENT_DIR', __DIR__));
define('WP_CONTENT_URL', env('WP_CONTENT_URL', WP_HOME));

// Disable WordPress auto updates.
define('AUTOMATIC_UPDATER_DISABLED', env('AUTOMATIC_UPDATER_DISABLED', true));

// Disable WP-Cron (wp-cron.php) for faster performance.
define('DISABLE_WP_CRON', env('DISABLE_WP_CRON', false));

// Prevent file edititing from the dashboard.
define('DISALLOW_FILE_EDIT', env('DISALLOW_FILE_EDIT', true));

// Disable plugin and theme updates and installation from the dashboard.
define('DISALLOW_FILE_MODS', env('DISALLOW_FILE_MODS', true));

// Cleanup WordPress image edits.
define('IMAGE_EDIT_OVERWRITE', env('IMAGE_EDIT_OVERWRITE', true));

// Disable technical issues emails.
define('WP_DISABLE_FATAL_ERROR_HANDLER', env('WP_DISABLE_FATAL_ERROR_HANDLER', false));

// Limit the number of post revisions.
define('WP_POST_REVISIONS', env('WP_POST_REVISIONS', 2));

// Set the absolute path to the WordPress directory.
if (!defined('ABSPATH')) {
    define('ABSPATH', sprintf('%s/%s/', __DIR__, env('WP_DIR', 'wordpress')));
}

// Set the database table prefix.
$table_prefix = env('DB_TABLE_PREFIX', 'wp_');

require_once ABSPATH . 'wp-settings.php';
