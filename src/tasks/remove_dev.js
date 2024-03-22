const {src} = require('gulp');
const clean = require('gulp-clean');

module.exports = function r_dev() {
   return src('dev/', {read: false}).pipe(clean());
}
