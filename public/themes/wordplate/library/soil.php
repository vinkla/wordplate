<?php

/*
 |--------------------------------------------------------------------------
 | Soil
 |--------------------------------------------------------------------------
 |
 | Soild is a WordPress plugin which contains a collection of modules to
 | apply theme-agnostic front-end modifications.
 |
 | Please see https://github.com/roots/soil
 |
 */

/*
 * Use cleaner WordPress markup.
 */
add_theme_support('soil-clean-up');

/*
 * Disable asset versioning.
 */
add_theme_support('soil-disable-asset-versioning');

/*
 * Disable trackbacks.
 */
add_theme_support('soil-disable-trackbacks');

/*
 * Move all JS to the footer.
 */
add_theme_support('soil-js-to-footer');

/*
 * Convert search results from /?s=query to /search/query/.
 */
add_theme_support('soil-nice-search');

/*
 * Root relative URLs.
 */
add_theme_support('soil-relative-urls');
