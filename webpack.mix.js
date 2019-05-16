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

mix.js('resources/js/frontend.js', 'public/js/frontEnd')
   .js('resources/js/backend.js', 'public/js/backEnd')
   .sass('resources/sass/frontend.scss', 'public/css/frontEnd')
   .sass('resources/sass/backend.scss', 'public/css/backEnd')
   //.copyDirectory('node_modules/tinymce/skins', 'public/js/skins')
   .autoload({
      jquery: ['$', 'window.jQuery', 'jQuery'],
      lodash: ['_']
    });
