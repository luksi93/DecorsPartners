// Requirements
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    autoprefixer = require('gulp-autoprefixer');

//compile sass + autoprefixer into css and create a minified version
gulp.task('sass', function () {

return gulp.src('public/src/sass/main.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 2 version'))
    .pipe(rename('style.css'))
    .pipe(gulp.dest('public/css/'))
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('public/css/'));
});

gulp.task('watch', function() {

  gulp.watch(['public/src/sass/*.sass', 'public/src/sass/*/*.sass'], ['sass']);

});

gulp.task('default', ['sass', 'watch']);
