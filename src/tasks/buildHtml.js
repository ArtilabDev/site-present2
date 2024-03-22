const {
	src,
	dest
} = require('gulp');
const include = require('gulp-file-include');
const bs = require('browser-sync');
const mode = require('gulp-mode')();

if(mode.production()) {
	module.exports = function html() {
		return src(['src/**/*.html', '!src/components/**/*.html']);
	}
} else {
	module.exports = function html() {
		return src(['src/**/*.html', '!src/components/**/*.html'])
		.pipe(include())
		.pipe(dest('dev'))
		.pipe(bs.stream())
	}
}
