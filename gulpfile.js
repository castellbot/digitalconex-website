var path = require('path'),
	gulp = require('gulp'),
	livereload = require('gulp-livereload'),
	less = require('gulp-less'),
    minifyCSS = require('gulp-minify-css');

var staticFiles = [
	'./public/js/*.js',
	'./public/css/*.css',
	'./*.html'
];

gulp.task('less', function () {
    return gulp.src('./less/style.less')
		.pipe(less())
		.pipe(minifyCSS())
		.pipe(gulp.dest('./public/css'));
});

gulp.task('livereload', function() {
	gulp.src(staticFiles)
		.pipe(livereload());
});

gulp.task('default', function() {
	livereload.listen({start: true});
	gulp.watch('./less/**/*.less', ['less']);
	gulp.watch(staticFiles, ['livereload']);
});
