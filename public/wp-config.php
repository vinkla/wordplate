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
| WP-CLI Compatibility
|--------------------------------------------------------------------------
|
| WP-CLI need 'wp-settings.php' to be required in 'wp-config.php'.
| WP-CL regex will parse the configuration file and replace
| 'wp-settings.php' with there own.
|
*/

if (class_exists('WP_CLI')) {
    $table_prefix = $application->tablePrefix;
    require_once ABSPATH.'wp-settings.php';
}
