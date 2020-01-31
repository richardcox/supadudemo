'use strict';

// Dependencies
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var gulpif = require('gulp-if');
var js_config_json = require('./js_config.json');
var js_config = js_config_json;
var jsSrc = [
    'js/libs/**/*.js',
    'js/global/**/*.js',
    'js/templates/**/*.js',
    'js/modules/**/*.js',
    'js/**/*.js'
];
var sassSrc = [
    'sass/**/*.scss'
];

/**
 * Function: compileDeps
 * 
 * Takes a dependency name and compile all
 * dependent js files
 * 
 * Parameters:
 * 
 *   template - [string/name of depenedency]
 */
function compileDeps(template) {
    var conf = js_config_json;
    var src = conf[template]['deps'];

    gulp.src(src)
        .pipe($.concat(template + '.js'))
       .pipe($.uglify())
      // .pipe($.stripDebug())
        .pipe($.filelog())
        .pipe(gulp.dest('../assets/js/templates'));
}

gulp.task('compileJs', function() {

    for (var src in js_config_json) {
        console.log(src);
        compileDeps(src);
    }
});

gulp.task('compileSass', function() {
    gulp.src(sassSrc)
        .pipe($.compass({
            css: '../assets/css',
            sass: 'sass'
        }))
        .pipe($.cssmin())
        .pipe($.autoprefixer())
        .pipe(gulp.dest('../assets/css'))
        .pipe($.livereload());
});

gulp.task('css', function() {
    gulp.src('css/*.css')
        .pipe($.cssmin())
        .pipe(gulp.dest('../assets/css'));
});

// Copy fonts to assets folder
gulp.task('fonts', function() {
    gulp.src('fonts/**')
        .pipe(gulp.dest('../assets/fonts'));
});

// Copy fonts to assets folder
gulp.task('images', function() {
    gulp.src('images/**')
        .pipe(gulp.dest('../assets/images'));
});

// Watch for sass and js changes
gulp.task('watch', function() {
    $.livereload.listen();
    gulp.watch(jsSrc, ['compileJs']);

    gulp.watch(sassSrc, ['compileSass']);
});

// Task to build assets for development
gulp.task('dev', function() {
    return gulp.start('compileSass', 'css', 'compileJs', 'fonts', 'watch');
});
