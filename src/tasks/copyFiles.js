const {src, dest} = require('gulp');

const mode = require('gulp-mode')();

if(mode.production()) {
   module.exports = async function copyFiles() {
      await src('src/fonts/*').pipe(dest('build/fonts'));
      await src('src/models/*').pipe(dest('build/models'));
      await src('src/video/*').pipe(dest('build/video'));
   }
} else {
   module.exports = async function copyFiles() {
      await src('src/fonts/*').pipe(dest('dev/fonts'));
      await src('src/models/*').pipe(dest('dev/models'));
      await src('src/video/*').pipe(dest('dev/video'));
   }
}
