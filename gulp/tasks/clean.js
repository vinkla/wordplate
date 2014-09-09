var gulp = require('gulp');
var config = require('../util/config');
var del = require('del');

gulp.task('clean', del.bind(null, [config.build.root]));
