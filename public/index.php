<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Theming WordPress
|--------------------------------------------------------------------------
|
| We need to define and tell WordPress to load the WordPress theme and
| output it to the client's browser.
|
*/

define('WP_USE_THEMES', true);

/*
|--------------------------------------------------------------------------
| Booting WordPress
|--------------------------------------------------------------------------
|
| This is the front to the WordPress application. This file doesn't do
| anything, but loads wp-blog-header.php which does and tells WordPress to
| load the theme.
|
*/

require __DIR__ . '/wordpress/wp-blog-header.php';
