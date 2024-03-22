const plugins = [
  'node_modules/swiper/swiper-bundle.min.js',
];
const {
  src,
  dest
} = require('gulp');
const uglify = require('gulp-uglify-es').default;
const concat = require('gulp-concat');
const map = require('gulp-sourcemaps');
const mode = require('gulp-mode')();

if(mode.production()) {
  module.exports = function libs_js() {
    if (plugins.length > 0)
      return src(plugins)
      .pipe(uglify())
      .pipe(concat('libs.min.js'))
      .pipe(dest('build/js/'))
  }
} else {
  module.exports = function libs_js() {
    if (plugins.length > 0)
      return src(plugins)
      .pipe(map.init())
      .pipe(concat('libs.min.js'))
      .pipe(map.write('../sourcemaps'))
      .pipe(dest('dev/js/'))
  }
}
