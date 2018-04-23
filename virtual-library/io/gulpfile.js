var gulp          = require('gulp'),
    autoprefixer  = require('gulp-autoprefixer'),
    babel         = require('gulp-babel'),
    concat        = require('gulp-concat'),
    cssnano       = require('gulp-cssnano'),
    imagemin      = require('gulp-imagemin'),
    livereload    = require('gulp-livereload'),
    rename        = require('gulp-rename'),
    sass          = require('gulp-sass'),
    sourcemaps    = require('gulp-sourcemaps'),
    uglify        = require('gulp-uglify'),
    del           = require('del'),
    runSequence   = require('run-sequence');

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];

// File paths to various assets are defined here.
var PATHS = {
    includes : {
        sass : [
            'bower_components/foundation-sites/scss',
            'bower_components/motion-ui/src/'
        ]
    },
    input : {
        fonts: [
            'src/icomoon/fonts/**/*'
        ],
        img : [
            'src/img/**/*'
        ],
        dependentJavascript : [
            // 'bower_components/html5shiv/dist/html5shiv.js',
            'bower_components/jquery/dist/jquery.js',
            'bower_components/jquery_lazyload/jquery.lazyload.js',
            'bower_components/jquery-infinite-scroll/jquery.infinitescroll.js',
            'bower_components/masonry/dist/masonry.pkgd.js',
            'bower_components/slick-carousel/slick/slick.js',
            'bower_components/headroom.js/dist/headroom.js',
            'bower_components/motion-ui/dist/motion-ui.js',
            'bower_components/wow/dist/wow.js'
        ],
        foundationJavascript : [
            // foundation core
            'bower_components/foundation-sites/js/foundation.core.js',
            'bower_components/foundation-sites/js/foundation.util.*.js',
            // Paths to individual JS components defined below
            'bower_components/foundation-sites/js/foundation.abide.js',
            'bower_components/foundation-sites/js/foundation.accordion.js',
            'bower_components/foundation-sites/js/foundation.accordionMenu.js',
            'bower_components/foundation-sites/js/foundation.drilldown.js',
            'bower_components/foundation-sites/js/foundation.dropdown.js',
            'bower_components/foundation-sites/js/foundation.dropdownMenu.js',
            'bower_components/foundation-sites/js/foundation.equalizer.js',
            'bower_components/foundation-sites/js/foundation.interchange.js',
            'bower_components/foundation-sites/js/foundation.magellan.js',
            'bower_components/foundation-sites/js/foundation.offcanvas.js',
            // 'bower_components/foundation-sites/js/foundation.orbit.js',
            'bower_components/foundation-sites/js/foundation.responsiveMenu.js',
            'bower_components/foundation-sites/js/foundation.responsiveToggle.js',
            'bower_components/foundation-sites/js/foundation.reveal.js',
            'bower_components/foundation-sites/js/foundation.slider.js',
            'bower_components/foundation-sites/js/foundation.sticky.js',
            'bower_components/foundation-sites/js/foundation.tabs.js',
            'bower_components/foundation-sites/js/foundation.toggler.js',
            'bower_components/foundation-sites/js/foundation.tooltip.js',
            'bower_components/what-input/what-input.js'
        ],
        sourceJavascript : [
            'src/js/**/*.js'
        ],
        compiledJavascript : [
            'dist/js/dependencies.js',
            'dist/js/foundation.js',
            'dist/js/source.js'
        ],
        sass : [
            'src/icomoon/style.css',
            'src/scss/**/*.scss'
        ],
        views : [
            'templates/**/*',
            'partials/**/*',
            '**/*.php'
        ],
    },
    output : {
        fonts      : 'dist/css/fonts',
        img        : 'dist/img',
        javascript : 'dist/js',
        css        : 'dist/css'
    }
};

/* cleans the build directory */
gulp.task('clean', function() {
    return del(['dist']);
});

gulp.task('images', function () {
    return gulp.src(PATHS.input.img)
        .pipe(imagemin({
            optimizationLevel : 3,
            progressive       : true,
            svgoPlugins       : [{removeViewBox: true}]
        }))
        .pipe(gulp.dest(PATHS.output.img));
});

/* compiles */
gulp.task('dependentJavascript', function() {
    return gulp.src(PATHS.input.dependentJavascript)
        // .pipe(sourcemaps.init())
        .pipe(concat('dependencies.js'))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(PATHS.output.javascript));
});

gulp.task('foundationJavascript', function() {
    return gulp.src(PATHS.input.foundationJavascript)
        // .pipe(sourcemaps.init())
        .pipe(babel())
        .pipe(concat('foundation.js'))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(PATHS.output.javascript));
});

gulp.task('sourceJavascript', function() {
    return gulp.src(PATHS.input.sourceJavascript)
        // .pipe(sourcemaps.init())
        .pipe(babel())
        .pipe(concat('source.js'))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(PATHS.output.javascript));
});

gulp.task('compiledJavascript', ['sourceJavascript'], function() {
    return gulp.src(PATHS.input.compiledJavascript)
        .pipe(concat('app.js'))
        .pipe(gulp.dest(PATHS.output.javascript))
        .pipe(uglify())
        .pipe(rename('app.min.js'))
        .pipe(gulp.dest(PATHS.output.javascript))
        .pipe(livereload());
});

/* compiles scss files */
gulp.task('sass', function() {
    // compile sass files then combines all css files
    // creates a non-minified and minified master css
    return gulp.src(PATHS.input.sass)
        // .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths : PATHS.includes.sass
        }).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers : COMPATIBILITY
        }))
        // .pipe(sourcemaps.write())
        .pipe(concat('app.css'))
        .pipe(gulp.dest(PATHS.output.css))
        .pipe(cssnano())
        .pipe(rename('app.min.css'))
        .pipe(gulp.dest(PATHS.output.css))
        .pipe(livereload());
});

gulp.task('fonts', function() {
    return gulp.src(PATHS.input.fonts)
        .pipe(gulp.dest(PATHS.output.fonts));
});

/* live reload on template and partial files */
gulp.task('views', function() {
    return gulp.src(PATHS.input.views)
        .pipe(livereload());
});

/* run the serve and watch task when gulp is called without arguments */
gulp.task('default', ['watch']);

/* builds public files */
gulp.task('build', function(callback) {
    runSequence('clean', ['fonts', 'images', 'dependentJavascript', 'foundationJavascript', 'sass'], 'compiledJavascript', callback);
});

/* watches these files for changes and run the task on update */
gulp.task('watch', ['build'], function() {
    livereload.listen();
    gulp.watch(PATHS.input.fonts, ['fonts']);
    gulp.watch(PATHS.input.img, ['images']);
    gulp.watch(PATHS.input.sourceJavascript, ['compiledJavascript']);
    gulp.watch(PATHS.input.sass, ['sass']);
    gulp.watch(PATHS.input.views, ['views']);
});

