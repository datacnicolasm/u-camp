const mix = require('laravel-mix');
const webpack = require('webpack');
const path = require('path');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', {
        sassOptions: {
            prependData: `@import "generals";`
        }
    })
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery']
    })
    .setPublicPath('public')
    .setResourceRoot('../')
    .sourceMaps()
    .version();

if (mix.inProduction()) {
    mix.version();
}

// Establecer la ruta pública por defecto para las fuentes de Font Awesome
mix.webpackConfig({
    resolve: {
        alias: {
            '@globals': path.resolve(__dirname, 'resources/js/globals.js'),
            jQuery: path.resolve(__dirname, 'node_modules/jquery/dist/jquery.js')
        }
    },
    output: {
        publicPath: '/fonts/',
        assetModuleFilename: 'fonts/[name][ext]',
    }
});

// Copiar las imágenes a la carpeta public
mix.copy('resources/images', 'public/images')
