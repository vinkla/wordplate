var gulp = require('gulp');
var config = require('../util/config');
var changed = require('gulp-changed');

gulp.task('extras', function() {
  return gulp.src([config.src.root + '/**/*.php', config.src.root + '/style.css'])
    .pipe(changed(config.build.root + '/'))
    .pipe(gulp.dest(config.build.root + '/'));
});
