const babelify = require('babelify'),
      browserify = require('browserify'),
      buffer = require('vinyl-buffer'),
      concat = require('gulp-concat'),
      del = require('del'),
      gulp = require('gulp'),
      imagemin = require('gulp-imagemin'),
      gulpif = require('gulp-if'),
      minifyCSS = require('gulp-csso'),
      pug = require('gulp-pug'),
      sass = require('gulp-sass'),
      source = require('vinyl-source-stream'),
      sourcemaps = require('gulp-sourcemaps'),
      sync = require('browser-sync').create(),
      uglify = require('gulp-uglify'),
      plumber = require('gulp-plumber'),
      isProd = process.env.NODE_ENV === 'production'

///**
// * PUG
// */
//
//function templates() {
//  return gulp.src('wp-content/themes/paris2024/src/pages/**/*.pug')
//    .pipe(pug())
//    .pipe(gulp.dest('wp-content/themes/paris2024/dist/'))
//    .pipe(sync.stream())
//}

/**
 * SCSS
 */

function scss() {
  return gulp.src('wp-content/themes/paris2024/src/scss/main.scss')
    .pipe(plumber())
    .pipe(gulpif(!isProd, sourcemaps.init()))
    .pipe(sass())
    .pipe(gulpif(isProd, minifyCSS()))
    .pipe(gulpif(!isProd, sourcemaps.write('.')))
    .pipe(gulp.dest('wp-content/themes/paris2024/dist/styles'))
//    .pipe(sync.stream())
}

/**
 * JS
 */

function js() {
  return browserify({entries: ['wp-content/themes/paris2024/src/scripts/main.js'], debug: true})
    .transform(babelify, {presets: 'es2015'})
    .bundle()
    .pipe(plumber())
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(gulpif(!isProd, sourcemaps.init({loadMaps: true})))
    .pipe(uglify())
    .pipe(gulpif(!isProd, sourcemaps.write('.')))
    .pipe(gulp.dest('wp-content/themes/paris2024/dist/scripts'))
//    .pipe(sync.stream())
}

/**
 * IMAGES
 */

function images() {
  return gulp.src('wp-content/themes/paris2024/src/images/**/*')
    .pipe(plumber())
    .pipe(gulpif(isProd, imagemin({verbose: true})))
    .pipe(gulp.dest('wp-content/themes/paris2024/dist/images'))
}

/**
 * FONTS
 */

function fonts() {
  return gulp.src('wp-content/themes/paris2024/src/fonts/**/*')
    .pipe(plumber())
    .pipe(gulp.dest('wp-content/themes/paris2024/dist/fonts'))
}

/**
 * GLOBAL
 */

function clean() {
  return del(['wp-content/themes/paris2024/dist'])
}

gulp.task('build', gulp.series(clean, gulp.parallel(scss, js, images, fonts)))

gulp.task('default', gulp.parallel(scss, js, images, fonts, function(done) {
//  sync.init({
//    server: {
//      baseDir: '.wp-content/themes/paris2024/dist'
//    }
//  })

//  gulp.watch('wp-content/themes/paris2024/src/**/*.pug', templates)
  gulp.watch('wp-content/themes/paris2024/src/**/*.scss', scss)
  gulp.watch('wp-content/themes/paris2024/src/**/*.js', js)

  done()
}))
