// Variables
const config = {
  scss: "../assets/scss/",
  js: "../assets/javascript/",
  assets: "../assets/",
  dist: "../dist/"
}
const gulp              = require('gulp'),
      // Tools dependencies
      gulp_rename       = require('gulp-rename'),
      gulp_plumber      = require('gulp-plumber'),
      gulp_notify       = require('gulp-notify'),
      gulp_sourcemaps   = require('gulp-sourcemaps'),
      // Image depedency
      gulp_imagemin     = require('gulp-imagemin'),
      // Style dependencies
      gulp_sass         = require('gulp-sass'),
      gulp_autoprefixer = require('gulp-autoprefixer'),
      gulp_cssnano      = require('gulp-cssnano'),
      // Javascript dependencies
      gulp_concat       = require( 'gulp-concat' ),
      gulp_uglify       = require('gulp-uglify'),
      gulp_babel        = require('gulp-babel')

// Default task
gulp.task( 'default', ['watch'] );

// CSS function
gulp.task('style', () => {
  return gulp.src(`${config.scss}main.scss`)
    .pipe(gulp_plumber({
      errorHandler: gulp_notify.onError('SASS Error <%= error.message %>')
    }))
    .pipe(gulp_sourcemaps.init())
    .pipe(gulp_sass({
      outputStyle: 'compressed'
    }).on('error', gulp_sass.logError))
    .pipe(gulp_autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp_cssnano())
    .pipe(gulp_sourcemaps.write())
    .pipe(gulp_rename('style.min.css'))
    .pipe(gulp.dest(`${config.dist}css`))
});

// JS function
gulp.task('javascript', () => {
  return gulp.src(`${config.js}*.js`)
    .pipe(gulp_plumber({
      errorHandler: gulp_notify.onError('JS Error <%= error.message %>')
    }))
    .pipe(gulp_sourcemaps.init())
    .pipe(gulp_concat('script.js'))
    .pipe(gulp_babel({presets: ["babel-preset-es2015"].map(require.resolve)}))
    .pipe(gulp_uglify())
    .pipe(gulp_sourcemaps.write())
    .pipe(gulp_rename('script.min.js'))
    .pipe(gulp.dest(`${config.dist}js`))
})

// Minifies images
gulp.task('images', () => {
  return gulp.src(`${config.assets}images/*`)
    .pipe(gulp_imagemin())
    .pipe(gulp.dest(`${config.dist}img`))
    .pipe(gulp_notify('minified !'))
})

// Replace font into dist folder
gulp.task('fonts', () => {
  return gulp.src(`${config.assets}fonts/*`)
    .pipe( gulp.dest(`${config.dist}fonts`))
})

// Watch all my task
gulp.task('watch', ['style', 'javascript', 'images', 'fonts'], () => {
  gulp.watch(`${config.scss}**/*.scss`, ['style'])
  gulp.watch(`${config.js}**/*.js`, ['javascript'])
  gulp.watch(`${config.assets}images/*`, ['images'])
  gulp.watch(`${config.assets}fonts/*`, ['fonts'])
})