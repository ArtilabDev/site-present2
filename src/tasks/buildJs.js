const {
	 src,
	 dest
} = require('gulp');
const uglify = require('gulp-uglify-es').default;
const map = require('gulp-sourcemaps');

const components = [
	 './src/js/main.js',
	 './src/js/dollet.js',
	 './src/js/cursor.js',
	 'node_modules/gsap/dist/gsap.min.js',
	 'node_modules/lottie-web/build/player/lottie_svg.min.js',
];

const mode = require('gulp-mode')();

if(mode.production()) {
	module.exports = function js() {
		return src(components)
		.pipe(uglify())
		.pipe(dest('build/js/'))
	}
} else {
	module.exports = function js() {
		return src(components)
		.pipe(map.init())
		.pipe(map.write('../sourcemaps'))
		.pipe(dest('dev/js/'))
	}
}
