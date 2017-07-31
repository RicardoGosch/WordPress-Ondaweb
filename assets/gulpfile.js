var gulp        = require('gulp');
var stylus      = require('gulp-stylus');
var browserSync = require('browser-sync').create();
var prefix      = require('autoprefixer-stylus');
var minify      = require('gulp-minify');

// Live Preview
gulp.task('sync', function () {
	browserSync.init({
		server: {
			// baseDir: "http://ondawebhost.com.br/merten"
		},
		host: "localhost",
		open: false,
		notify: false
	});

		gulp.watch("./src/styl/**/*.styl", ['css']);
		gulp.watch("./src/js/**/*.js", ['js']);
		gulp.watch("./dist/**/*").on('change', browserSync.reload);
});

// Compila o stylus
gulp.task('stylus', function(){
	return gulp.src('./src/styl/*.styl')
		.pipe(stylus({
			use: prefix(),
			compress: true
		}))
		.pipe(gulp.dest('./dist/css'));
});

// Minifica o JS
gulp.task('js', function(){
	gulp.src('./src/js/*.js')
		.pipe(minify({
			ext:{
				src: '-debug.js',
				min: '.js'
			},
			exclude: ['tasks'],
			ignoreFiles: ['.combo.js', '-.min.js']
		}))
		.pipe(gulp.dest('./dist/js'))
});

// Chama a galera toda
gulp.task('default', ['js', 'stylus', 'sync']);