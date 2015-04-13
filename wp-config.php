<?php

/*
 * This file is part of WordPress Boilerplate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/** Register the Composer autoloader. */
require __DIR__.'/vendor/autoload.php';

/** Load .env file into WordPress. */
Dotenv::load(__DIR__);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', env('DB_NAME'));

/** MySQL database username. */
define('DB_USER', env('DB_USER'));

/** MySQL database password. */
define('DB_PASSWORD', env('DB_PASSWORD'));

/** MySQL hostname. */
define('DB_HOST', env('DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', env('DB_CHARSET', 'utf8'));

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', env('DB_COLLATE', ''));

/** Custom content directory. */
define('WP_CONTENT_DIR', __DIR__.'/wp-content');
define('WP_CONTENT_URL', 'http://'.$_SERVER['HTTP_HOST'].'/wp-content');

/** Set the trash to less days to optimize WordPress. */
define('EMPTY_TRASH_DAYS', env('EMPTY_TRASH_DAYS', 7));

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = env('TABLE_PREFIX', 'wp_');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', env('WP_DEBUG', false));
define('WP_DEBUG_DISPLAY', env('WP_DEBUG', false));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__.'/wordpress');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
