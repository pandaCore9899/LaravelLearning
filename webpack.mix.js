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
    ]).browserSync({
        host: '0.0.0.0',
        proxy:'webserver',
        files: ["./resources/**/*", "./public/**/*"],
        open: false,
        reloadOnRestart: true,
    });
mix.options({
    hmrOptions: {
        host: '0.0.0.0',
        port: 8002,
    },
});