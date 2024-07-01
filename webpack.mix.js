const mix = require('laravel-mix');
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
    output: {
        publicPath: '/fonts/'
    }
});

// Copiar los archivos de jQuery UI CSS
mix.copy('node_modules/jquery-ui/themes/base/all.css', 'public/css/jquery-ui.css');
