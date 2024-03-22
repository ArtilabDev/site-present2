const {src, dest} = require('gulp');
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const autoprefixer = require( 'gulp-autoprefixer' );
const bs = require('browser-sync');
const cleanCSS = require('gulp-clean-css');
const map = require('gulp-sourcemaps');
const mode = require('gulp-mode')();

if(mode.production()) {
	module.exports = function style() {
		return src( './src/style/**/*.scss' )
		.pipe( sass() )
		.pipe( autoprefixer( {
			grid: true,
			overrideBrowserslist: [ 'last 2 versions' ],
			cascade: false,
		} ) )
		.pipe(cleanCSS())
		.pipe( dest( 'build/css' ) )
	}
} else {
	module.exports = function style() {
		return src( './src/style/**/*.scss' )
		.pipe(map.init())
		.pipe( sass() )
		.pipe( autoprefixer( {
			grid: true,
			overrideBrowserslist: [ 'last 2 versions' ],
			cascade: false,
		} ) )
		.pipe(cleanCSS())
		.pipe(map.write('../sourcemaps/'))
		.pipe( dest( 'dev/css' ) )
		.pipe(bs.stream())
	}
}
