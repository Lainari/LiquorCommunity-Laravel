const mix = require('laravel-mix');

mix.sass('resources/css/app.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js')
   .react()
   .browserSync('localhost:8000');