<?php

/**
 * Define Constants.
 */
define('ADMIN_DIR', get_template_directory() .'/admin');
define('ADMIN_URL', get_template_directory_uri() .'/admin');

define('AUTHOR', 'Vincent Klaiber');
define('AUTHOR_URL', 'http://vinkla.com');

define('LOGIN_HEADER_URL', 'http://vinkla.com');

/**
 * Load Admin Components.
 */
require_once(ADMIN_DIR .'/admin-remove.php');
require_once(ADMIN_DIR .'/admin-functions.php');
