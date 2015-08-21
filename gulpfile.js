var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your WordPlate application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.publicPath = 'public/themes/wordplate/assets';
elixir.config.css.outputFolder = elixir.config.css.sass.folder = 'styles';
elixir.config.js.folder = elixir.config.js.outputFolder = 'scripts';

elixir(function(mix) {
    mix.sass('app.scss')
        .browserify('app.js')
        .copy(elixir.config.assetsPath + '/images', elixir.config.publicPath + '/images');
});
