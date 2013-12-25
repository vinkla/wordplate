<?php

/**
 * Define Constants.
 */
define('TEMPLATE_DIR', get_template_directory());
define('TEMPLATE_URI', get_template_directory_uri());
define('ADMIN_DIR', TEMPLATE_DIR.'/admin');
define('ADMIN_URL', TEMPLATE_URI.'/admin');

define('AUTHOR', 'Vincent Klaiber');
define('AUTHOR_URL', 'http://vinkla.com');

define('LOGIN_IMAGE_PATH', TEMPLATE_DIR.'/images/admin-login-logo.png');
define('LOGIN_HEADER_URL', get_site_url());

/**
 * Load Admin Components.
 */
require_once(ADMIN_DIR .'/admin-remove.php');
require_once(ADMIN_DIR .'/admin-functions.php');
require_once(ADMIN_DIR .'/admin-acf.php');

/**
 * Custom Post Types.
 *
 * Read more about custom post type class:
 * https://github.com/jjgrainger/wp-custom-post-type-class
 */
require_once(ADMIN_DIR .'/custom-post-type/CPT.php');
