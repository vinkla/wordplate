var gulp = require('gulp');
var config = require('../util/config');
var browserSync = require('browser-sync');

gulp.task('browserSync', ['build'], function() {
  browserSync({
    files: [
      // Watch everything in build
      config.build.root + '/**',
      // Exclude sourcemap files
      '!' + config.build.root + '/**.map'
    ]
  });
});
