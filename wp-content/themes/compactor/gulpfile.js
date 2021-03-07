var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemap = require('gulp-sourcemaps');
var lec = require('gulp-line-ending-corrector'),
    terser = require('gulp-terser'),
    concat = require('gulp-concat'),
    livereload = require ('gulp-livereload'),
    zip = require('gulp-zip');

gulp.task('scripts', function () {
          gulp.src([
              './js/foundation.min.js',
              './js/plugins/lightbox.min.js',
              './js/plugins/TweenMax.min.js',
              './js/plugins/easing.js',
              './js/plugins/modernizer.js',
              './js/plugins/slick.min.js',
              './js/plugins/isotope.js',
              './js/plugins/jquery.hoverdir.js',
              './js/plugins/counterup.js',
              './js/plugins/waypoints.js',
              './js/plugins/select2.min.js',
              './node_modules/video.js/dist/video.min.js',
              './node_modules/videojs-youtube/dist/Youtube.min.js',
              './js/shortcode/script-shortcodes.js',
              './js/wd-carousel.js',
              './js/plugins/SplitText.min.js',
              './js/animation.js',
              './js/scripts.js'
            ])
              .pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
              .pipe(concat('wd-script.min.js'))
              .pipe(terser()) // compressed es6+ code.
              .pipe(gulp.dest('js'))
              .pipe(livereload());
});

gulp.task('sass', function () {
    return gulp.src('./scss/**/*.scss')
        .pipe(sourcemap.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(sourcemap.write({includeContent: false}))
        .pipe(sourcemap.init({loadMaps: true}))
        .pipe(autoprefixer({browsers: ['last 2 versions']}))
        .pipe(sourcemap.write('.'))
        .pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
        .pipe(gulp.dest('css'))
        .pipe(livereload());
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('scss/**/*.scss', ['sass'])
    gulp.watch('js/**/*.js', ['scripts'])
})

gulp.task('zip', function () {
    return gulp.src([ './**', '!node_modules', '!node_modules/**', 'bower.json',
            ], { base: './../' })
        .pipe(zip('compactor.zip'))
        .pipe(gulp.dest('./..'));

});


gulp.task('default', ['sass','scripts', 'watch']);