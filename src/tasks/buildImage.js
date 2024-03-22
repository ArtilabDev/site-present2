const {
	 src,
	 dest
} = require('gulp');
const bs = require('browser-sync');
const webp = require('gulp-webp');
const imagemin = require('gulp-imagemin');
const clone = require('gulp-clone');
const cloneSink = clone.sink();
const mode = require('gulp-mode')();

if(mode.production()) {
	module.exports = function image() {
		return src('./src/img/**/*.+(png|jpg|jpeg|gif|svg|ico)')
		.pipe(imagemin([
			imagemin.gifsicle({interlaced: true}),
			imagemin.mozjpeg({quality: 75, progressive: true}),
			// imagemin.optipng({optimizationLevel: 5}),
		]))
		.pipe(cloneSink)
		.pipe(webp())
		.pipe(cloneSink.tap())
		.pipe(dest('build/img'))
		.pipe(bs.stream())
	}
} else {
	module.exports = function image() {
		return src('./src/img/**/*.+(png|jpg|jpeg|gif|svg|ico)')
		.pipe(imagemin([
			imagemin.gifsicle({interlaced: true}),
			imagemin.mozjpeg({quality: 75, progressive: true}),
			// imagemin.optipng({optimizationLevel: 5}),
		]))
		.pipe(cloneSink)
		.pipe(webp())
		.pipe(cloneSink.tap())
		.pipe(dest('dev/img'))
		.pipe(bs.stream())
	}
}

