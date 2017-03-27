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
const themePath = 'public/themes/wordplate';
const assetsPath = `${themePath}/assets`;

mix.setPublicPath(assetsPath);
mix.setResourceRoot('../');

mix.browserSync({
    proxy: 'wordplate.dev',
    files: [
        `${themePath}/**/*.php`,
        `${assetsPath}/**/*.js`,
        `${assetsPath}/**/*.css`
    ]
});

mix.js(`${resources}/scripts/app.js`, `${assetsPath}/scripts`);

mix.sass(`${resources}/styles/app.scss`, `${assetsPath}/styles`, {
    includePaths: ['node_modules']
});

// Hash and version files in production.
if (mix.config.inProduction) {
    mix.version();
}
