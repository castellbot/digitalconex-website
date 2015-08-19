var path = require('path'),
	gulp = require('gulp'),
	livereload = require('gulp-livereload');

var staticFiles = [
	'./public/js/*.js',
	'./public/css/*.css',
	'./*.html'
];
gulp.task('livereload', function() {
	gulp.src(staticFiles)
		.pipe(livereload());
});

gulp.task('default', function() {
	livereload.listen({start: true});
	gulp.watch(staticFiles, ['livereload']);
});
