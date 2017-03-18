var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var zip = require('gulp-zip');

var jsOutPath = 'build/cyclone-slider-2/js';
var jsIn = [
    'js/store.js',
    'js/admin.js',
    'js/client.js'
]; // We use array as they need specific order

gulp.task('js', function() {

    return gulp.src(jsIn)
        .pipe(sourcemaps.init())
        .pipe(concat('all.js'))
        .pipe(gulp.dest(jsOutPath))
        .pipe(uglify())
        .pipe(rename(function (path) {
            path.extname = ".min" + path.extname;
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(jsOutPath));

});

var releaseIn = [
    'css/**',
    'images/**',
    'js/**',
    'languages/**',
    'libs/**',
    'src/**',
    'templates/**',
    'views/**',
    'cyclone-slider.php',
    'README.txt'
];
var releaseOutPath = 'release/cyclone-slider-2';
gulp.task('release', function() {

    return gulp.src(releaseIn, {base:'.'}) // Base preserves the dir structure
        .pipe(gulp.dest(releaseOutPath));

});

gulp.task('zip', function() {

    return gulp.src('release/cyclone-slider-2/**', {base:'release'}) // Base preserves the dir structure
        .pipe(zip('cyclone-slider-2.zip'))
        .pipe(gulp.dest('release'));

});

gulp.task('default', ['js']); // Runs on "gulp" command only