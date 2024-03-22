const {
   watch,
   parallel
} = require('gulp');
const {reload} = require("browser-sync");

module.exports = function watching() {
   watch('src/**/*.html', parallel('html'));
   watch('src/**/*.scss', parallel('style'));
   watch('src/**/*.js', parallel('js')).on('change', reload);
}
