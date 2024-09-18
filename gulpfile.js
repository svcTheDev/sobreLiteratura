const {src, dest, watch, parallel} = require("gulp"); 
const sass = require("gulp-sass")(require('sass'));
const plumber = require("gulp-plumber");
// const webp = require("gulp-webp")
const imagemin = require("gulp-imagemin");
// const cache =  require("gulp-cache");
// const avif = require("gulp-avif")

function css (done) {
    src("src/scss/**/*.scss")
    .pipe(plumber())
    .pipe(sass())
    .pipe(dest("build/css"));

    done();
}

// function turnToWebp(done) {
//     const options = {
//         quality: 50
//     }
//     src("src/img/**/*.{jpeg,png}")
//     .pipe(webp(options))
//     .pipe(dest("build/img"));

//     done();
// }

function images (done) {
    const options = {
        optimizationLevel: 3
    }
    src("src/img/**/*.{jpeg,png}")
    .pipe((imagemin(options)))
    .pipe(dest("build/img"));
} 

function dev(done) {
    watch("src/scss/**/*.scss", css);

    done();
}
exports.css = css;
exports.images = images;
exports.dev = parallel(images, turnToWebp, dev);