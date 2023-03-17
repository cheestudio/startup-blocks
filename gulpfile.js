'use strict';


/* Project VARs
========================================================= */
const
PROJECT_NAME     = 'blocks',
// PROJECT_PORT     = 10006,
PREVIEW_MODE     = true,
BLOCK_MODE       = true,

ROOT             = './',
STYLES_EDITOR    = './assets/scss/editor.scss',
STYLES_MAIN      = './assets/scss/main.scss',
STYLES_SOURCE    = './assets/scss/**/*.scss',
BLOCKS_SOURCE    = './partials/acf-blocks/**/*.scss',
BLOCKS_JS_SOURCE = './partials/acf-blocks/**/*.js',
JS_SOURCE        = ['./assets/js/src/vendor/*.js','./assets/js/src/*.js'],
JS_DEST          = './assets/js/',
SVG_SOURCE       = './assets/img/svg/*.svg',
PHP_SOURCE       = './**/*.php',
IGNORE           = './node_modules/**/*';


/* Plugin VARs
========================================================= */
const { src, dest, watch, series, parallel, lastRun } = require('gulp'),
autoprefixer = require('gulp-autoprefixer'),
cleancss     = require('gulp-clean-css'),
concat       = require('gulp-concat'),
filter       = require('gulp-filter'),
lineec       = require('gulp-line-ending-corrector'),
mmq          = require('gulp-merge-media-queries'),
notify       = require('gulp-notify'),
plumber      = require('gulp-plumber'),
rename       = require('gulp-rename'),
sass         = require('gulp-sass')(require('sass')),
sassglob     = require('gulp-sass-glob'),
gulpif       = require('gulp-if'),
terser       = require('gulp-terser-js'),
browsersync  = require('browser-sync').create();


/* Error Handling
========================================================= */
var onError = function(err) {
  notify.onError({
    title:    'Error:',
    message:  '<%= error.message %>'
  })(err);

  this.emit('end');
};


/* SCSS Styles
========================================================= */
function styles() {
  return src( STYLES_MAIN )
  .pipe( plumber( { errorHandler: onError } ) )
  .pipe( sassglob({
    allowEmpty: true
  }) )
  .pipe( sass() )
  .pipe( autoprefixer() )
  .pipe( mmq( { log: true } ) )
  .pipe( cleancss({
    format: 'beautify',
    level: {
      1: {
        roundingPrecision: 'all=10, px=2, em=2, rem=2, font-size=2, line-height=2'
      },
      2: {
        mergeNonAdjacentRules: false,
        mergeMedia: false
      }
    }
  }))
  .pipe( lineec() )
  .pipe( rename( 'style.css' ) )
  .pipe( dest( ROOT ) )
  .pipe( filter( 'style.css' ) )
  .pipe( rename( { suffix: '.min' } ) )
  .pipe( cleancss( { level: 0 } ) )
  .pipe( plumber.stop() )
  .pipe( dest( ROOT ) )
  .pipe( gulpif( PREVIEW_MODE, browsersync.stream() ) )
}


/* Block SCSS Styles (only used if BLOCK_MODE set to TRUE)
========================================================= */
function block_styles() {
  return src( BLOCKS_SOURCE, { base: './', since: lastRun(block_styles) } )
  .pipe( plumber( { errorHandler: onError } ) )
  .pipe( sass() )
  .pipe( autoprefixer() )
  .pipe( mmq( { log: true } ) )
  .pipe( cleancss({
    format: 'beautify',
    level: {
      1: {
        roundingPrecision: 'all=10, px=2, em=2, rem=2, font-size=2, line-height=2'
      },
      2: {
        mergeNonAdjacentRules: false,
        mergeMedia: false
      }
    }
  }))
  .pipe( cleancss( { level: 0 } ) )
  .pipe( lineec() )
  .pipe( plumber.stop() )
  .pipe( dest('.'))
  .pipe( gulpif( PREVIEW_MODE, browsersync.stream() ) )
}


/* Editor Styles (only used if BLOCK_MODE set to TRUE)
========================================================= */
function editor_styles() {
  return src( STYLES_EDITOR )
  .pipe( plumber( { errorHandler: onError } ) )
  .pipe( sassglob({
    allowEmpty: true
  }) )  
  .pipe( sass() )
  .pipe( autoprefixer() )
  .pipe( mmq( { log: true } ) )
  .pipe( cleancss({
    format: 'beautify',
    level: {
      1: {
        roundingPrecision: 'all=10, px=2, em=2, rem=2, font-size=2, line-height=2'
      },
      2: {
        mergeNonAdjacentRules: false,
        mergeMedia: false
      }
    }
  }))
  .pipe( lineec() )
  .pipe( plumber.stop() )
  .pipe( dest( ROOT ) )
}


/* JS Files
========================================================= */
function scriptsJS() {
  return src( JS_SOURCE )
  .pipe( plumber( { errorHandler: onError } ) )
  .pipe( concat( 'all.min.js' ) )
  .pipe(terser({
    compress: {
      unused : false,
      drop_debugger: false
    }
  }))
  .pipe( plumber.stop() )
  .pipe( dest( JS_DEST ) )
}


/* BrowserSync
========================================================= */
function browserSyncInit(done) {
  browsersync.init({
    proxy: 'localhost/' + PROJECT_NAME,
    // proxy: 'localhost:' + PROJECT_PORT,
    notify: false
  });
  done();
}

function reload(done) {
  browsersync.reload();
  done();
}


/* Watch Tasks
========================================================= */
function watchFiles(done) {
  watch( STYLES_SOURCE, styles );
  if ( BLOCK_MODE ) {
    watch( BLOCKS_SOURCE, block_styles );
    watch( BLOCKS_JS_SOURCE, reload );
    watch( STYLES_EDITOR, editor_styles );
  }
  if ( PREVIEW_MODE ) {
    watch( PHP_SOURCE, !IGNORE, reload );
    watch( JS_SOURCE, series(scriptsJS, reload) );
    watch( SVG_SOURCE, { events: ['add', 'change'] }, reload );
  }
  else {
    watch( JS_SOURCE, scriptsJS );
  }
  done();
}


/* Build
========================================================= */
if ( BLOCK_MODE ) { // BLOCKS workflow
  if ( PREVIEW_MODE ) {
    var build  = parallel( styles, block_styles, editor_styles, scriptsJS, watchFiles, browserSyncInit );
  } else {
    var build  = parallel( styles, block_styles, editor_styles, scriptsJS, watchFiles);
  }
}
else { // not BLOCKS workflow
  if ( PREVIEW_MODE ) {
    var build  = parallel( styles, scriptsJS, watchFiles, browserSyncInit );
  } else {
    var build  = parallel( styles, scriptsJS, watchFiles);
  }
}

exports.default = build;
