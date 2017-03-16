var gulp = require('gulp');
var glob = require('glob');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');

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
gulp.task('default', ['js']);