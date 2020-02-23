// let mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'dist/');
// mix.sass('resources/scss/app.scss', 'dist/');




const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    //.js('resources/js/moment.min.js', 'public/js')
    //.js('js/dataTables.bootstrap4.min.js', 'public/js')
    //.js('resources/js/select2.full.min.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')