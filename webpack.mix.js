const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js([
    "resources/js/pages/dashboard.js",
    "resources/js/pages/datatable-karyawan-detail.js",
    "resources/js/pages/datatable-karyawan.js",
    "resources/js/pages/datatable-absensi.js",
], 'public/js/datatable.js');

mix.js([
    "resources/js/helpers.js",
], 'public/js/helpers.js');


// mix.browserSync('127.0.0.1:8000');
