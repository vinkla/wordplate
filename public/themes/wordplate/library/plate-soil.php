<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Register Soil modules, for more information
 * please see: https://github.com/roots/soil.
 *
 * @return void
 */
add_theme_support('soil-clean-up');
add_theme_support('soil-disable-asset-versioning');
add_theme_support('soil-disable-trackbacks');
add_theme_support('soil-google-analytics', env('GOOGLE_ANALYTICS'), 'wp_head');
add_theme_support('soil-js-to-footer');
add_theme_support('soil-nice-search');
add_theme_support('soil-relative-urls');
