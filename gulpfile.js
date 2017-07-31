var gulp        = require('gulp');
var stylus      = require('gulp-stylus');
var browserSync = require('browser-sync').create();
var prefix      = require('autoprefixer-stylus');
var minify      = require('gulp-minify');

const files = {
	src: {
		css: {
			all: "./assets/src/styl/**/*.styl",
			unique: "./assets/src/styl/*.styl"
		},
		js: {
			all: "./assets/src/js/**/*.styl",
			unique: "./assets/src/styl/*.styl"
		},
		image: "./assets/src/image/**/*"

	},
	dist: {
		css: "./assets/dist/css",
		js: "./assets/dist/js",
		image: "./assets/dist/image"
	}
}

// Compila o stylus
gulp.task('stylus', function(){
	return gulp.src(files.src.js.unique)
		.pipe(stylus({
			use: prefix(),
			compress: true
		}))
		.pipe(gulp.dest(files.dist.css));
});

// Minifica o JS
gulp.task('js', function(){
	gulp.src(files.src.js.unique)
		.pipe(minify({
			ext:{
				src: '-debug.js',
				min: '.js'
			},
			exclude: ['tasks'],
			ignoreFiles: ['.combo.js', '-.min.js']
		}))
		.pipe(gulp.dest(files.dist.js))
});

// Live Preview
gulp.task('sync', function () {
	browserSync.init({
		server: {
			// baseDir: "./index.html"
		},
		host: "./",
		open: false,
		notify: false
	});
});

// Chama a galera toda
gulp.task('default', ['js', 'stylus', 'sync'], function(){
	gulp.watch(files.src.css.all, ['stylus']);
	gulp.watch(files.src.js.all, ['js']);
	// gulp.watch("./**/*").on('change', browserSync.reload);
});