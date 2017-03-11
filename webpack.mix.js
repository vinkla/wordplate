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
const public = 'public';
const theme_name = 'wordplate';
const theme_dir = `themes/${theme_name}`;
const theme_assets = `${theme_dir}/assets`;

mix.setPublicPath(`${public}/${theme_assets}`);
mix.setResourceRoot(`../../../../${theme_assets}/`);

mix.js(`${resources}/js/app.js`, `js`)
  .sass(`${resources}/scss/app.scss`, `css`)
  .version();
