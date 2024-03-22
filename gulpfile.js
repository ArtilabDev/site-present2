const gulp = require('gulp');
const requireDir = require('require-dir');
const tasks = requireDir('./src/tasks');

exports.copyFiles = tasks.copyFiles;
exports.html = tasks.buildHtml;
exports.style = tasks.buildCss;
exports.js = tasks.buildJs;
exports.libs_css = tasks.buildLibsCss;
exports.libs_js = tasks.buildLibsJs;
exports.image = tasks.buildImage;
exports.server = tasks.server;
exports.watch = tasks.watch;
exports.r_dev = tasks.remove_dev;

exports.default = gulp.parallel(
	exports.server,
	exports.watch
)

exports.server = gulp.parallel(
	exports.server
)

exports.build = gulp.parallel(
	exports.copyFiles,
	exports.style,
	exports.libs_css,
	exports.libs_js,
	exports.js,
	exports.image,
	exports.html
)

exports.clean = gulp.parallel(
	exports.r_dev
)
