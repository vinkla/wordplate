/* Notes:
   - gulp/tasks/browserify.js handles js recompiling with watchify
   - gulp/tasks/browserSync.js watches and reloads compiled files
*/

var gulp = require('gulp');
var config = require('../util/config');

gulp.task('watch', ['setWatch', 'browserSync'], function() {
  gulp.watch(config.src.assets + '/styles/**', ['sass']);
  gulp.watch(config.src.assets + '/images/**', ['images']);
  gulp.watch(config.src.assets + '/fonts/**', ['fonts']);
  gulp.watch(config.src.root + '/**/*.php', ['extras']);
});
