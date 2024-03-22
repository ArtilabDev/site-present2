const plugins = [
   'node_modules/swiper/swiper-bundle.min.css',
];

const {
   src,
   dest
} = require('gulp');
const concat = require('gulp-concat');
const map = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const mode = require('gulp-mode')();

if(mode.production()) {
	module.exports = function libs_css() {
		if (plugins.length > 0) {
			return src(plugins)
			.pipe(autoprefixer({
				grid: true,
				overrideBrowserslist: [ 'last 2 versions' ],
				cascade: false,
			}))
			.pipe(concat('libs.min.css'))
			.pipe(cleanCSS())
			.pipe(dest('build/css/'))
		}
	}
} else {
	module.exports = function libs_css() {
		if (plugins.length > 0) {
			return src(plugins)
			.pipe(map.init())
			.pipe(autoprefixer({
				grid: true,
				overrideBrowserslist: [ 'last 4 versions' ],
				cascade: false,
			}))
			.pipe(concat('libs.min.css'))
			.pipe(map.write('../sourcemaps/'))
			.pipe(dest('dev/css/'))
		}
	}
}

