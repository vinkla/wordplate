var gulp = require('gulp');
var config = require('../util/config');
var jshint = require('gulp-jshint');

gulp.task('jshint', function() {
  return gulp.src(config.src.assets + '/scripts/**')
    .pipe(jshint())
    .pipe(jshint.reporter(require('jshint-stylish')))
});
