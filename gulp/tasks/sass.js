var gulp = require('gulp');
var config = require('../util/config');
var sass = require('gulp-ruby-sass');
var prefix = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var csso = require('gulp-csso');
var ignore = require('gulp-ignore');
var handleErrors = require('../util/handleErrors');

gulp.task('sass', function() {
  return gulp.src(config.src.assets + '/styles/' + config.name + '.scss')
    .pipe(sass({
      loadPath: ['bower_components'],
      sourcemapPath: '../../../../../src/assets/styles'
    }))
    .on('error', handleErrors)
    .pipe(gulp.dest(config.build.assets + '/styles'))
    .pipe(ignore.exclude('*.map'))
    .pipe(prefix('last 1 version', '> 1%', 'ie 9', 'ie 8'))
    .pipe(csso())
    .pipe(gulp.dest(config.build.assets + '/styles'));
});
