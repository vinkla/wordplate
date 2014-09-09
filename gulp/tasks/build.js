var gulp = require('gulp');

gulp.task('build', ['clean'], function() {
  gulp.start(['browserify', 'sass', 'images', 'fonts', 'extras']);
})
