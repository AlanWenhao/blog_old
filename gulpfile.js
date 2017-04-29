var gulp = require('gulp');

var sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	imagemin = require('gulp-imagemin'),
	notify = require('gulp-notify'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	cache = require('gulp-cache'),
	rename = require('gulp-rename'),
	connect = require('gulp-connect'),
	livereload = require('gulp-livereload'),
	del = require('del');

// 编译Sass
gulp.task('sass', function() {
    return gulp.src(['./scss/**.scss'])
        .pipe(sass({ style: 'expanded' }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('./dist/index/css'))
        .pipe(rename('main.min.css'))
	    .pipe(minifycss())
	    .pipe(gulp.dest('./dist/index/css'))
	    .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('cssplugin', function() {
    return gulp.src(['src/css/*.css'])
        .pipe(concat('plugin.css'))
        .pipe(gulp.dest('./dist/index/css'))
        .pipe(rename('plugin.min.css'))
        .pipe(minifycss())
        .pipe(gulp.dest('./dist/index/css'));
});

gulp.task('images', function() {
  return gulp.src('./src/img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('dist/index/img'))
    // .pipe(notify({ message: 'Images task complete' }));
});

// 检查，合并，压缩文件
gulp.task('scripts', function() {
    return gulp.src('./src/js/*.js')
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./dist/index/js'))
        .pipe(rename('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/index/js'))
        .pipe(notify({ message: 'Scripts task complete' }));
});

gulp.task('jsplugin', function() {
    return gulp.src(['./src/js/jq/*.js', './src/js/plugin/*.js'])
        .pipe(concat('plugin.js'))
        .pipe(gulp.dest('./dist/index/js'))
        .pipe(rename('plugin.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/index/js'))
});

gulp.task('watch', function() {
    gulp.watch('./scss/*.scss', ['sass']).on('change', livereload.changed);
    gulp.watch('./src/js/*.js', ['scripts']).on('change', livereload.changed);
    gulp.watch('./img/**/*', ['images']).on('change', livereload.changed);
    livereload.listen();
    gulp.watch(['dist/index/**']).on('change', livereload.changed);
});

gulp.task('default', function() {
    gulp.start('sass', 'cssplugin', 'scripts', 'jsplugin', 'images', 'watch');
});
