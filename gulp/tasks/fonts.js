var gulp = require('gulp');
var config = require('../util/config');

gulp.task('fonts', function() {
  return gulp.src([config.src.assets + '/fonts/**/*.{eot,svg,ttf,woff}'])
    .pipe(gulp.dest(config.build.assets + '/fonts'));
});
