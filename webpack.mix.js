const mix = require('laravel-mix');
const webpack = require('webpack');
const path = require('path');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', {
        sassOptions: {
            prependData: `@import "generals";`
        }
    })
    .setResourceRoot('../')
    .babelConfig({
        presets: ['@babel/preset-env']
    })
    .sourceMaps()
    .version();

if (mix.inProduction()) {
    mix.version();
}

// Establecer la ruta pública por defecto para las fuentes de Font Awesome
mix.webpackConfig({
    resolve: {
        alias: {
            '@globals': path.resolve(__dirname, 'resources/js/globals.js')
        }
    },
    output: {
        publicPath: '/fonts/'
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
        }),
    ]
});

// Copiar los archivos de jQuery UI CSS
mix.copy('node_modules/jquery-ui/themes/base/all.css', 'public/css/jquery-ui.css');

//
mix.copy('resources/images', 'public/images')
