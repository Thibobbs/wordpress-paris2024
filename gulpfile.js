const gulp = require('gulp'),
  sass = require('gulp-sass'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  babelify = require('babelify'),
  browserify = require('browserify'),
  sync = require('browser-sync').create()


var processors = [
  autoprefixer
]

function scss() {
  return gulp.src('wp-content/themes/paris2024/src/scss/styles.scss')
    .pipe(sass())
    .pipe(postcss(processors))
    .pipe(gulp.dest('dist/css'))
    .pipe(sync.stream())
}

function js() {
  return browserify({entries: ['wp-content/themes/paris2024/src/js/script.js'], debug: true})
    .transform(babelify, {presets: 'es2015'})
    .bundle()
    .pipe(source('script.js'))
    .pipe(gulp.dest('dist/js'))
    .pipe(sync.stream())
}

gulp.task('default', gulp.parallel(scss, js, function (done) {
  sync.init({
    server: {
      baseDir: './dist'
    }
  })

  gulp.watch(['wp-content/themes/paris2024/src/**/*.scss', 'wp-content/themes/paris2024/src/**/*.js'], [scss, js])

  done()
}))
