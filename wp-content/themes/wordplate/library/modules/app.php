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
 * Enable Gzip if available.
 */
if (extension_loaded('zlib') && (ini_get('output_handler') !== 'ob_gzhandler') && config('app.gzip')) {
    add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));
}

/**
 * Prevent file edit from WordPress administrator dashboard.
 */
if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', config('app.disallow_file_edit'));
}
