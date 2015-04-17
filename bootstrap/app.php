<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
|--------------------------------------------------------------------------
| Tells WordPress to load the WordPress theme and output it
|--------------------------------------------------------------------------
|
| TODO: Add documentation.
|
*/
define('WP_USE_THEMES', true);

/*
|--------------------------------------------------------------------------
| Loads the WordPress Environment and Template
|--------------------------------------------------------------------------
|
| TODO: Add documentation.
|
*/
require($paths['wordpress'].'/wp-blog-header.php');

/*
|--------------------------------------------------------------------------
| Initiate WordPlate Application
|--------------------------------------------------------------------------
|
| TODO: Add documentation.
|
*/
new WordPlate\Foundation\Application($paths['config']);
