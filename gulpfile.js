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
elixir.config.css.outputFolder = 'styles';
elixir.config.css.sass.folder = 'styles';
elixir.config.js.folder = 'scripts';
elixir.config.js.outputFolder = 'scripts';

elixir(function (mix) {
  mix.sass('app.scss');

  mix.browserify('app.js');

  mix.copy(elixir.config.assetsPath + '/images', elixir.config.publicPath + '/images');

  mix.version([
    elixir.config.publicPath + '/styles/*.css',
    elixir.config.publicPath + '/scripts/*.js'
  ]);

  mix.browserSync({
    proxy: 'wordplate.dev',
    files: [
      'public/themes/wordplate/**/*.php',
      elixir.config.publicPath + '/**/*.js',
      elixir.config.publicPath + '/**/*.css'
    ]
  });
});
