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
require __DIR__.'/modules/app.php';
require __DIR__.'/modules/dashboard.php';
require __DIR__.'/modules/editor.php';
require __DIR__.'/modules/footer.php';
require __DIR__.'/modules/login.php';
require __DIR__.'/modules/menus.php';
require __DIR__.'/modules/plugins.php';
require __DIR__.'/modules/server.php';
require __DIR__.'/modules/updates.php';
require __DIR__.'/modules/widgets.php';
