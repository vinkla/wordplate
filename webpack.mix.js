const mix = require('laravel-mix').mix;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('resources/assets/scripts/app.js', 'public/themes/wordplate/assets/scripts')
   .sass('resources/assets/styles/app.scss', 'public/themes/wordplate/assets/styles')
   .version();
