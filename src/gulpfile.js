var gulp = require('gulp'),
    connect = require('gulp-connect'),
    sass = require('gulp-sass'),
    bulkSass = require('gulp-sass-bulk-import'),
    sourcemaps = require('gulp-sourcemaps'),
    pleeease = require('gulp-pleeease'),
    spritesmith = require('gulp.spritesmith'),
    plumber = require('gulp-plumber'),
    imagemin = require('gulp-imagemin'),
    // pngquant = require('imagemin-pngquant'),
    chmod = require('gulp-chmod'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    header = require('gulp-header'),
    include = require('gulp-include'),
    saveLicense = require('uglify-save-license'),
    rename = require('gulp-rename'),
    minifyCss = require('gulp-minify-css'),
    // cmq = require('gulp-combine-media-queries')
    ejs = require('gulp-ejs')
    ;

var srcDir = './_src/';
var distDir = './_dist/';
var wpDir = '../www/html/wp/wp-content/themes/uplink/';

// html =======================================================================
gulp.task( 'html', function(){
  gulp.src([srcDir + 'ejs/**/*.ejs', "!" + srcDir + "ejs/**/_*.ejs"])
    .pipe(plumber())
    .pipe(ejs())
    .pipe(rename({
    extname: ".html"
  }))
  .pipe(gulp.dest(distDir))
  .pipe(connect.reload());
});


// img =======================================================================
gulp.task( 'imgmin', function(){
  var srcGlob = srcDir + 'img/**/*.+(jpg|jpeg|png|gif|svg|ico)';
  var dstGlob = distDir + 'img/';
  var wpGlob = wpDir + 'img/';
  var imageminOptions = {
    optimizationLevel: 7
  };
  gulp.src( [srcGlob, '!' + srcDir + 'img/sprite/*.png'] )
    .pipe(imagemin( imageminOptions ))
    .pipe(chmod(644))
    .pipe(gulp.dest( dstGlob ))
    .pipe(gulp.dest( wpGlob ));
});


// sprite =======================================================================
gulp.task('sprite', function () {
  var spriteData = gulp.src(srcDir + 'img/sprite/*.png')
  .pipe(spritesmith({
    imgName: 'sprite.png',
    cssName: '_sprite.scss',
    imgPath: '../img/sprite.png',
    cssFormat: 'scss',
    cssVarMap: function (sprite) {
      sprite.name = sprite.name;
    }
  }));
  spriteData.img.pipe(gulp.dest(distDir + 'img/'));
  spriteData.img.pipe(gulp.dest(wpDir + 'img/'));
  spriteData.css.pipe(gulp.dest(srcDir + 'sass/'));
});

// sass =======================================================================
gulp.task('sass', function () {
  gulp.src(srcDir + 'sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(bulkSass())
    .pipe(sass())
    .pipe(pleeease({
      fallbacks: {
        autoprefixer: ['ie 9']
      },
      minifier: false
    }))
    // .pipe(cmq())
    .pipe(header('@charset "utf-8";\n\n'))
    .pipe(gulp.dest(distDir + 'css/'))
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(rename({suffix: '.min'}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(distDir + 'css/'))
    .pipe(gulp.dest(wpDir + 'css/'));
});

// scripts =======================================================================
gulp.task('scripts', function() {
    gulp.src([srcDir + 'js/**/*.js', '!' + srcDir + 'js/+(plugins|libs)/*.js'])
    .pipe(plumber())
    .pipe(include())
    .pipe(sourcemaps.init())
    .pipe(concat('script.js'))
    .pipe(gulp.dest(distDir + 'js/')) // 非圧縮
    .pipe(uglify({preserveComments:saveLicense}))
    .pipe(rename({suffix: '.min'}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(distDir + 'js/'))
    .pipe(gulp.dest(wpDir + 'js/'));
});


// plugins scripts =======================================================================
gulp.task('plugins', function() {
    gulp.src([srcDir + 'js/plugins/*.js'])
    .pipe(concat('plugins.js'))
    .pipe(gulp.dest(distDir + 'js/'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest(distDir + 'js/'))
    .pipe(gulp.dest(wpDir + 'js/'));
});

// libs =======================================================================
gulp.task('libs', function() {
    gulp.src([srcDir + 'js/libs/*.js'])
    .pipe(gulp.dest(distDir + 'js/libs'))
    .pipe(gulp.dest(wpDir + 'js/libs'));
});


// fonts =======================================================================
gulp.task('fonts', function() {
    return gulp.src([srcDir +'fonts/**/*'])
    .pipe(gulp.dest(distDir + 'css/fonts/'))
    .pipe(gulp.dest(wpDir + 'css/fonts/'));
});

// clean =======================================================================
// gulp.task('clean', function(cb) {
//   del([
//     'dist/data',
//     'dist/fonts',
//     'dist/icons',
//     'dist/img',
//     'dist/js',
//     'dist/css',
//   ], cb);
// });

// watch =======================================================================
gulp.task('watch',function(){
  gulp.watch(srcDir + 'ejs/**/*.ejs', ['html']);
  gulp.watch(srcDir + 'sass/**/*.scss', ['sass']);
  gulp.watch(srcDir + 'js/**/*.js', ['scripts','libs']);
  gulp.watch(srcDir + 'js/libs/*.js', ['libs']);
  gulp.watch(srcDir + 'js/plugins/*.js', ['plugins']);
  gulp.watch(srcDir + '_mock/*', ['mock']);
});

gulp.task('connect', function() {
  connect.server({
    root: [__dirname + '/_dist/'],
    port: 8500,
    livereload: true
  });
});

gulp.task('default', ['connect','watch'])