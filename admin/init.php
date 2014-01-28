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
require ADMIN_DIR.'/admin-remove.php';
require ADMIN_DIR.'/admin-functions.php';
require ADMIN_DIR.'/admin-acf.php';
