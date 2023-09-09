const mix = require('laravel-mix');

mix.sass('resources/assets/scss/main.scss', 'public/css')
    .sourceMaps()
    .copyDirectory('resources/assets/images', 'public/images')
    .browserSync({
        host: process.env.APP_URL,
        proxy: process.env.APP_URL,
    })
