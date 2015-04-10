<?php

/*
 * This file is part of WordPress Boilerplate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!function_exists('dd')) {

    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     */
    function dd()
    {
        array_map(function ($x) { var_dump($x); }, func_get_args());
        die;
    }
}

if (!function_exists('format_bytes')) {

    /**
     * Format bytes to kilobytes, megabytes, gigabytes.
     *
     * @param int $bytes
     * @param  int $precision
     * @return string
     */
    function format_bytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return sprintf('%s %s', round($bytes, $precision), $units[$pow]);
    }
}
