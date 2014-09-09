var gulp = require('gulp');
var config = require('../util/config');
var browserify = require('browserify');
var watchify = require('watchify');
var bundleLogger = require('../util/bundleLogger');
var handleErrors = require('../util/handleErrors');
var source = require('vinyl-source-stream');

gulp.task('browserify', ['jshint'], function() {
  var bundler = browserify({
    // Required watchify args
    cache: {}, packageCache: {}, fullPaths: true,
    // Specify the entry point of your app
    entries: [config.src.assets + '/scripts/app.js'],
    // Enable source maps!
    debug: true
  });

  var bundle = function() {
    // Log when bundling starts
    bundleLogger.start();

    bundler.transform({
      global: true
    }, 'uglifyify');

    return bundler
      .bundle()
      // Report compile errors
      .on('error', handleErrors)
      // Use vinyl-source-stream to make the
      // stream gulp compatible. Specifiy the
      // desired output filename here.
      .pipe(source(config.name + '.js'))
      // Specify the output destination
      .pipe(gulp.dest(config.build.assets + '/scripts/'))
      // Log when bundling completes!
      .on('end', bundleLogger.end);
  };

  if (global.isWatching) {
    bundler = watchify(bundler);
    // Rebundle with watchify on changes.
    bundler.on('update', bundle);
  }

  return bundle();
});
