var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var zip = require('gulp-zip');
var runSequence = require('run-sequence'); // Some tasks require specific order


// Convert SASS to CSS 
gulp.task('sass', function () {
    return gulp.src('dev-only/src/sass/**/*.scss')
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(gulp.dest('dev-only/src/css'));
});

// CSS concat
gulp.task('css-concat', function() {
    var cssIn = [
        'dev-only/src/css/*.css'
    ]; // Use array for specific order
    var cssOutPath = 'css';
    return gulp.src(cssIn, {base: 'dev-only/src/css'})
        .pipe(concat('admin.css'))
        .pipe(gulp.dest('dev-only/concat/css'))
        .pipe(gulp.dest('css'));
});

// Minify CSS
gulp.task('css-min', function () {
    var src = [
        'dev-only/concat/css/*.css'
    ]
    return gulp.src(src, {base: 'dev-only/concat/css/'})
        .pipe(sourcemaps.init())
        .pipe(cleanCSS({
            level: {
                1: {
                    specialComments: false // Remove all comments
                },
                2:{}
            }
        }))
        .pipe(rename(function (path) {
            path.extname = ".min" + path.extname;
        }))
        .pipe(sourcemaps.write('.')) // Write sourcemaps to external files at the same dir. Remove param to inline maps.
        .pipe(gulp.dest('dev-only/minify/css'))
        .pipe(gulp.dest('css'));
});

// CSS
gulp.task('css', function(callback) {
  runSequence('sass', 'css-concat', 'css-min', callback);
}); // Runs on "gulp css"

// JS Concat
gulp.task('js-concat', function() {
    var admin = [
        'dev-only/src/js/store.js',
        'dev-only/src/js/admin.js'
    ],
    client = [
        'dev-only/src/js/vimeo-player.js',
        'dev-only/src/js/client.js'
    ];
    gulp.src(admin, {base: 'dev-only/src/js'})
        .pipe(concat('admin.js'))
        .pipe(gulp.dest('dev-only/concat/js'))
        .pipe(gulp.dest('js'));
    return gulp.src(client, {base: 'dev-only/src/js'})
        .pipe(concat('client.js'))
        .pipe(gulp.dest('dev-only/concat/js'))
        .pipe(gulp.dest('js'));
});

// Minify JS
gulp.task('js-min', function() {
    var src = [
        'dev-only/concat/js/*.js'
    ]
    return gulp.src(src, {base: 'dev-only/concat/js'})
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(rename(function (path) {
            path.extname = ".min" + path.extname;
        }))
        .pipe(sourcemaps.write('.')) // Write sourcemaps to external files at the same dir. Remove param to inline.
        .pipe(gulp.dest('dev-only/minify/js'))
        .pipe(gulp.dest('js'));
});

// JS
gulp.task('js', function(callback) {
  runSequence('js-concat', 'js-min', callback);
}); // Runs on "gulp js"

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

// gulp.task('default', ['js']);