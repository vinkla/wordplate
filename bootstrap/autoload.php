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
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| TODO: Add documentation.
|
*/
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bind Paths
|--------------------------------------------------------------------------
|
| TODO: Add documentation.
|
*/
$paths = require __DIR__.'/paths.php';

/*
|--------------------------------------------------------------------------
| Load The Environment Variables
|--------------------------------------------------------------------------
|
| TODO: Add documentation.
|
*/
Dotenv::load(__DIR__.'/..');
