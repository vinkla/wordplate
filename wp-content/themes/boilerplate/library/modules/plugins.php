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
 * Add Roots Soil plugin features.
 */
if (count(config('plugins.soil.features')) > 0) {
    foreach (config('plugins.soil.features') as $feature) {
        add_theme_support($feature);
    }
}
