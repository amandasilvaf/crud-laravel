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

mix.js('resources/assets/js/app.js', 'public/assets/js')
    .sass('resources/assets/sass/app.scss', 'public/assets/css')
    .sass('node_modules/bootstrap/scss/bootstrap.scss','public/assets/bootstrap/bootstrap.css')
    .scripts('node_modules/jquery/dist/jquery.js','public/assets/jquery/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/assets/bootstrap/bootstrap.js')
    .scripts('node_modules/popper.js/src/index.js', 'public/assets/popper/popper.js')
    .scripts('node_modules/popper.js/src/index.js', 'public/assets/popper/popper1.js')
    .scripts('node_modules/popper.js/dist/popper.js', 'public/assets/popper/popper.js')
    .styles('resources/views/cliente/assets/css/style.css', 'public/assets/css/pages/cliente/style.css')
    .styles( 'resources/views/layout/assets/css/style.css', 'public/assets/css/pages/layout/style.css')

    .sourceMaps();

   
