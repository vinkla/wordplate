const mix = require('laravel-mix');

require('dotenv').config();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your WordPlate applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JavaScript files.
 |
 */

const theme = process.env.WP_DEFAULT_THEME;

mix.setResourceRoot('../');
mix.setPublicPath(`public/themes/${theme}/assets`);

mix.js('resources/scripts/index.js', 'index.js');
mix.sass('resources/styles/index.scss', 'index.css');
