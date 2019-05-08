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
        .less('resources/assets/less/app.less', 'public/css')
        .less('resources/assets/less/dark.less', 'public/css/dark.css')
        .less('resources/assets/less/light.less', 'public/css/light.css')
        .copy('resources/assets/less/img/logo-black.png', 'public/images/logo-black.png')
        .copy('resources/assets/less/img/logo-white.png', 'public/images/logo-white.png')
        .copy('resources/assets/less/img/abassi.png', 'public/images/abassi.png')
        .copy('resources/assets/less/img/anje.png', 'public/images/anje.png')
        .copy('resources/assets/less/img/atemi.png', 'public/images/atemi.png')
        .copy('resources/assets/less/img/saxophone.png', 'public/images/saxophone.png')
        .copy('resources/assets/less/favicon.ico', 'public/favicon.ico')
        .copy('resources/assets/js/masongram-master/dist/masongram.min.js', 'public/js/masongram/masongram.min.js')
        .copy('node_modules/masonry-layout/dist/masonry.pkgd.js', 'public/js/masonry/masonry.pkgd.js')
        .copy('node_modules/imagesloaded/imagesloaded.js', 'public/js/imagesloaded/imagesloaded.js')
        .version()
        .options({
            processCssUrls: true
        });
//   .sass('resources/assets/sass/app.scss', 'public/css');
