<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually".
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new WordPlate application instance
| which serves as the "glue" for all the components of WordPlate, and is
| the container for the system binding all of the various parts.
|
*/

$application = new WordPlate\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Custom WordPress Constants
|--------------------------------------------------------------------------
|
| Below you can add custom WordPress constants which aren't specified in
| application class. You may of course use the env() helper function.
|
*/

// define('WP_ALLOW_MULTISITE', env('WP_ALLOW_MULTISITE', true));

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can start the engine. This bootstraps
| the framework and gets it ready for use, then it will load up this
| application so that we can run it and send the responses back to the
| browser and delight our users.
|
*/

$application->run();

/*
|--------------------------------------------------------------------------
| WordPress Database Table Prefix
|--------------------------------------------------------------------------
|
| You can have multiple installations in one database if you give each
| a unique prefix. Only numbers, letters, and underscores please!
|
*/

$table_prefix = env('WP_PREFIX', 'wp_');

/*
|--------------------------------------------------------------------------
| Bootstrap WordPress Framework
|--------------------------------------------------------------------------
|
| The settings file is used to set up and fix common variables and include
| the WordPress procedural and class library. We also need to keep this
| include here in order to support WP-CLI.
|
*/

require_once ABSPATH.'wp-settings.php';
