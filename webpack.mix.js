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

const resources = 'resources/assets';
const public = 'public/themes/wordplate/assets';

mix.setPublicPath(public);

mix.copy(`${resources}/images`, `${public}/images`);

mix.js(`${resources}/scripts/app.js`, `${public}/scripts`)
   .sass(`${resources}/styles/app.scss`, `${public}/styles`)
   .version();
