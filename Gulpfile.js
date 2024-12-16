"use strict";

const gulp = require("gulp");
const sass = require("gulp-sass");
const minify = require('gulp-minify');

sass.compiler = require("node-sass"); //Necessário para funcionar gulp-sass

gulp.task('default', watch);

gulp.task("sass", compilaSass);
gulp.task("compress", compilaJS);

function compilaSass() {
  return gulp
    .src("assets/scss/**/*.scss")
    .pipe(sass({ outputStyle: "compressed" }).on("error", sass.logError)) // Converte Sass para CSS mimificado com gulp-sass
    .pipe(gulp.dest("assets/css"));
}

function compilaJS() {
  return gulp
    .src("assets/js/*.js")
    .pipe(minify())
    .pipe(gulp.dest("js/minify"));
}

function watch() {
  gulp.watch("assets/scss/**/*.scss", compilaSass);
  gulp.watch("assets/js/*.js", compilaJS);
}