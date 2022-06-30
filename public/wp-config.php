<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

// Load the environment variables.
Dotenv::createImmutable(realpath(__DIR__ . '/../'))->safeLoad();

// Set the environment type.
define('WP_ENVIRONMENT_TYPE', $_ENV['WP_ENVIRONMENT_TYPE'] ?? 'production');

// For developers: WordPress debugging mode.
$isDebugModeEnabled = $_ENV['WP_DEBUG'] ?? false;
define('WP_DEBUG', $isDebugModeEnabled);
define('WP_DEBUG_LOG', $_ENV['WP_DEBUG_LOG'] ?? false);
define('WP_DEBUG_DISPLAY', $_ENV['WP_DEBUG_DISPLAY'] ?? $isDebugModeEnabled);
define('SCRIPT_DEBUG', $_ENV['SCRIPT_DEBUG'] ?? $isDebugModeEnabled);

// The database configuration with database name, username, password,
// hostname charset and database collae type.
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_HOST', $_ENV['DB_HOST'] ?? '127.0.0.1');
define('DB_CHARSET', $_ENV['DB_CHARSET'] ?? 'utf8mb4');
define('DB_COLLATE', $_ENV['DB_COLLATE'] ?? 'utf8mb4_unicode_ci');

// Detect HTTPS behind a reverse proxy or a load balancer.
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// Set the unique authentication keys and salts.
define('AUTH_KEY', $_ENV['AUTH_KEY']);
define('SECURE_AUTH_KEY', $_ENV['SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY', $_ENV['LOGGED_IN_KEY']);
define('NONCE_KEY', $_ENV['NONCE_KEY']);
define('AUTH_SALT', $_ENV['AUTH_SALT']);
define('SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT', $_ENV['LOGGED_IN_SALT']);
define('NONCE_SALT', $_ENV['NONCE_SALT']);

// Set the home url to the current domain.
define('WP_HOME', $_ENV['WP_HOME'] ?? Request::createFromGlobals()->getSchemeAndHttpHost());

// Set the WordPress directory path.
define('WP_SITEURL', $_ENV['WP_SITEURL'] ?? sprintf('%s/%s', WP_HOME, $_ENV['WP_DIR'] ?? 'wordpress'));

// Set the WordPress content directory path.
define('WP_CONTENT_DIR', $_ENV['WP_CONTENT_DIR'] ?? realpath(__DIR__ . '/../public'));
define('WP_CONTENT_URL', $_ENV['WP_CONTENT_URL'] ?? WP_HOME);

// Set the trash to less days to optimize WordPress.
define('EMPTY_TRASH_DAYS', $_ENV['EMPTY_TRASH_DAYS'] ?? 7);

// Set the default WordPress theme.
define('WP_DEFAULT_THEME', $_ENV['WP_DEFAULT_THEME'] ?? 'wordplate');

// Constant to configure core updates.
define('WP_AUTO_UPDATE_CORE', $_ENV['WP_AUTO_UPDATE_CORE'] ?? 'minor');

// Specify the number of post revisions.
define('WP_POST_REVISIONS', $_ENV['WP_POST_REVISIONS'] ?? 2);

// Cleanup WordPress image edits.
define('IMAGE_EDIT_OVERWRITE', $_ENV['IMAGE_EDIT_OVERWRITE'] ?? true);

// Prevent file edititing from the dashboard.
define('DISALLOW_FILE_EDIT', $_ENV['DISALLOW_FILE_EDIT'] ?? true);

// Disable technical issues emails.
define('WP_DISABLE_FATAL_ERROR_HANDLER', $_ENV['WP_DISABLE_FATAL_ERROR_HANDLER'] ?? false);

// Set the absolute path to the WordPress directory.
if (!defined('ABSPATH')) {
    define('ABSPATH', sprintf('%s/%s/', realpath(__DIR__ . '/../public'), $_ENV['WP_DIR'] ?? 'wordpress'));
}

// Set the database table prefix.
$table_prefix = $_ENV['DB_TABLE_PREFIX'] ?? 'wp_';

require_once ABSPATH . 'wp-settings.php';
