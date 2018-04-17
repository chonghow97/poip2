var gulp = require('gulp');
var jade = require('gulp-jade');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

//sass to css
gulp.task('sass',function(){
	return gulp.src('./sass/style.sass')
		.pipe(sass())
		.pipe(gulp.dest('./css'))
		.pipe(browserSync.stream());
});



// Jade to html
gulp.task('jade',function () {
	gulp.src('./jade/*.jade')
	.pipe(jade({
		pretty: true
	}))
	.pipe(gulp.dest('./html'))
	.pipe(browserSync.stream());
})

gulp.task('serve', function () {
    browserSync.init({
        proxy: 'localhost:8002',
        port: '7777'
    });
    gulp.watch("./*.php").on("change", reload);
	gulp.watch('./jade/*jade',['jade']);
	gulp.watch('./sass/*sass', ['sass']);
});

// watch Task
gulp.task('watch',function () {
	gulp.watch("./*.php").on("change", reload);
	gulp.watch('./jade/*jade',['jade']);
	gulp.watch('./sass/*sass', ['sass']);
});

//Default
gulp.task('default',['sass','watch','serve']);

