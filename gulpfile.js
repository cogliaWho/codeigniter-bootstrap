var gulp = require('gulp');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var sass = require('gulp-sass');

gulp.task('browserify', function(){
	browserify('./dev/js/main.js')
		.bundle()
		.pipe(source('main.js'))
		.pipe(gulp.dest('resources/js'));	
});

gulp.task('copy', function(){
	gulp.src('dev/images/**/*.*')
		.pipe(gulp.dest('resources/images'));	
});

gulp.task('styles', function() {
    gulp.src('dev/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('resources/css'));
});

gulp.task('default', ['browserify', 'copy', 'styles'], function(){
	gulp.watch('dev/sass/**/*.scss',['styles']);
	return gulp.watch('dev/**/*.*', ['browserify', 'copy']);
});