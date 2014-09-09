var gulp = require('gulp');
var config = require('../util/config');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');

gulp.task('images', function() {
  var dest = './' + config.build.assets + '/images';

  return gulp.src('./' + config.src.assets + '/images/**')
    .pipe(changed(dest)) // Ignore unchanged files
    .pipe(imagemin({
      optimizationLevel: 3,
      progressive: true,
      interlaced: true
    })) // Optimize
    .pipe(gulp.dest(dest));
});
