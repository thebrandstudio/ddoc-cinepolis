const { watch, src, series , dest} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const replace = require('gulp-replace');
const sourcemaps = require('gulp-sourcemaps');
const zip = require('gulp-zip');
const gulp = require("gulp");
const fs = require('fs');
const yargs = require('yargs');
const cssbeautify = require('gulp-beautify');
const gulpif = require("gulp-if");
const cleanCSS = require("gulp-clean-css");
const PRODUCTION = yargs.argv.prod;

const paths = {
    styles: {
        src : ['assets/scss/**/*.scss', 'assets/scss/admin.scss', 'assets/scss/bbp-forum.scss'],
        dest: 'assets/css'
    },
    package: {
        src : ['**/*', '!node_modules{,/**}', '!src{,/**}', '!packaged{,/**}'],
        dest: 'packaged'
    }
};

function compress () {
    return src(paths.package.src)
        .pipe(replace('ddoc', 'ddoc'))
        .pipe(replace('DDOC', 'DDOC'))
        .pipe(replace('Ddoc', 'Ddoc'))
        .pipe(zip(`ddoc.zip`))
        .pipe(dest(paths.package.dest))
}

function buildStyles() {
    return gulp.src(paths.styles.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS()))
        .pipe(autoprefixer({cascade: false}))
        .pipe(gulp.dest(paths.styles.dest))
}

exports.buildStyles = buildStyles;
exports.compress = compress;

function watchTask () {
    watch(paths.styles.src, buildStyles);
}

exports.default = series(buildStyles, watchTask);