var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var zip = require('gulp-zip');

gulp.task('js-admin', function() {
    var jsIn = [
        'dev-only/js/store.js',
        'dev-only/js/admin.js'
    ]; // We use array as they need specific order
    var jsOutPath = 'js';
    return gulp.src(jsIn, {base: 'dev-only/js'})
        .pipe(sourcemaps.init())
        .pipe(concat('admin.js'))
        .pipe(gulp.dest(jsOutPath))
        .pipe(uglify())
        .pipe(rename(function (path) {
            path.extname = ".min" + path.extname;
        }))
        .pipe(sourcemaps.write('.')) // Write sourcemaps to external files at the same dir. Remove param to inline.
        .pipe(gulp.dest(jsOutPath));
});

gulp.task('js-client', function() {
    var jsIn = [
        'dev-only/js/client.js'
    ]; // We use array as they need specific order
    var jsOutPath = 'js';
    return gulp.src(jsIn, {base: 'dev-only/js'})
        .pipe(sourcemaps.init())
        .pipe(concat('client.js'))
        .pipe(gulp.dest(jsOutPath))
        .pipe(uglify())
        .pipe(rename(function (path) {
            path.extname = ".min" + path.extname;
        }))
        .pipe(sourcemaps.write('.')) // Write sourcemaps to external files at the same dir. Remove param to inline.
        .pipe(gulp.dest(jsOutPath));
});

// Copy files for release
gulp.task('release', function() {
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
    return gulp.src(releaseIn, {base:'.'}) // Base preserves the dir structure
        .pipe(gulp.dest('release/cyclone-slider-2'));

});

// Zip release
gulp.task('zip', function() {
    return gulp.src('release/cyclone-slider-2/**', {base:'release'}) // Base preserves the dir structure
        .pipe(zip('cyclone-slider-2.zip'))
        .pipe(gulp.dest('release'));
});

gulp.task('js', ['js-admin', 'js-client']); // Runs on "gulp js"
// gulp.task('default', ['js']);