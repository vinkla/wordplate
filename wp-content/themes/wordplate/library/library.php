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
 * Load helper methods.
 */
require __DIR__.'/helpers.php';

/**
 * Setup global configuration variable.
 */
require __DIR__.'/config.php';

/**
 * Load Framework Components.
 */
foreach (glob(__DIR__.'/modules/*.php') as $file) {
    require $file;
}
