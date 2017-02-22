/* global require */

var gulp = require('gulp');
var merge = require('merge-stream');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minify = require('gulp-minify');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var browserSync = require('browser-sync').create();
var jshint = require('gulp-jshint');
var watch = require('gulp-watch');
var imagemin = require('gulp-imagemin');
var runSequence = require('run-sequence');

var src = 'assets/';
var dest = 'dist/';

var sassOptions = {
    errLogToConsole: true,
    outputStyle: 'expanded'
};
var autoprefixerOptions = {browsers: [
        'Android >= 2.3',
        'BlackBerry >= 7',
        'Chrome >= 9',
        'Firefox >= 4',
        'Explorer >= 9',
        'iOS >= 5',
        'Opera >= 11',
        'Safari >= 5',
        'OperaMobile >= 11',
        'OperaMini >= 6',
        'ChromeAndroid >= 9',
        'FirefoxAndroid >= 4',
        'ExplorerMobile >= 9'
    ]};
gulp.task('js', ['jshint', 'scripts']);


gulp.task('jshint', function () {

    return gulp.src([
        src + 'js/main.js'
    ])
            .pipe(jshint())
            .pipe(jshint.reporter('jshint-stylish'));
});

// Stylesheet
gulp.task('css', function () {
    gulp.src([
        src + 'styles/css/reset.css',
        src + 'styles/css/bootstrap.css',
        src + 'styles/css/xloader.css',
        src + 'styles/css/bootstrap-datepicker3.min.css',
        src + 'styles/css/font-awesome.min.css',
        src + 'styles/css/royalslider.css',
        src + 'styles/css/rs-universal.css',
        src + 'styles/css/select2.css',
        src + 'styles/css/pagination.css',
        src + 'styles/css/default.css',
        src + 'styles/css/responsive.css'
    ])
            .pipe(minifyCSS())
            .pipe(concat('plugins.css'))
            .pipe(gulp.dest(dest + 'css'));
});


gulp.task('sass', function () {
    return gulp.src('assets/styles/scss/main.scss')
            .pipe(sourcemaps.init())
            .pipe(sass(sassOptions).on('error', sass.logError))
            .pipe(autoprefixer(autoprefixerOptions))
            .pipe(sourcemaps.write('./maps'))
            //  .pipe(minifyCSS())
            .pipe(gulp.dest(dest + 'css'));
});


// Scripts
gulp.task('scripts', function () {
    return gulp.src([
        src + 'js/jquery-2.2.1.min.js',
        src + 'js/bootstrap-datepicker.min.js',
        src + 'js/jquery.royalslider.js',
        src + 'js/select2.full.min.js',
        src + 'js/jquery.sidr.min.js',
        src + 'js/main.js'
    ])
            .pipe(uglify())
            .pipe(concat('all.min.js'))
            .pipe(gulp.dest(dest + 'js'));

});

// Fonts
gulp.task('fonts', function () {
    return gulp.src(src + 'fonts/**/*')
            .pipe(gulp.dest(dest + 'fonts'));
});

// Images 
gulp.task('images', function () {
    return gulp.src(src + 'images/**/*.+(png|jpg|jpeg|gif|svg)')
            .pipe(imagemin({
                interlaced: true
            }))
            .pipe(gulp.dest(dest + 'images'));
});

// Watch Files For Changes
gulp.task('watch', function () {

    gulp.watch(src + 'js/main.js', ['js']);
    gulp.watch(src + 'styles/css/**/*', ['css']);
    gulp.watch(src + 'styles/scss/**/*.scss', ['sass']);
    gulp.watch(src + 'fonts/**/*');
});

// ### Clean
// `gulp clean` - Deletes the build folder entirely.
gulp.task('clean', require('del').bind(null, ['dist']));

gulp.task('build', function (callback) {
    runSequence(
            'css',
            'sass',
            'scripts',
            ['fonts', 'images'],
            callback);
});

// ### Gulp
// `gulp` - Run a complete build. To compile for production run `gulp --production`.
gulp.task('default', ['clean'], function () {
    gulp.start('build');
});
