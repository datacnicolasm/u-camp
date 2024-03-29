const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
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