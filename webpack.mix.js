let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.js('node_modules/jquery/dist/jquery.js','public/js/lumx')
   .js('node_modules/velocity-animate/velocity.js','public/js/lumx')
   .js('node_modules/moment/min/moment-with-locales.js','public/js/lumx')
   .js('node_modules/angular/angular.js','public/js/lumx')
   .js('node_modules/official-lumx/dist/lumx.js','public/js/lumx');
