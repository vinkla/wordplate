var elixir = require('laravel-elixir');

elixir.config.publicPath = 'public/themes/wordplate/assets';
elixir.config.css.outputFolder = elixir.config.css.sass.folder = 'styles';
elixir.config.js.folder = elixir.config.js.outputFolder = 'scripts';

elixir(function(mix) {
    mix.sass('app.scss')
        .browserify('app.js')
        .copy(elixir.config.assetsPath + '/images', elixir.config.publicPath + '/images');
});
