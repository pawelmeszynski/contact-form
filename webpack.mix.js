const tailwindcss = require("tailwindcss");
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css', [
        //
    ])
    .options({
        postCss: [ tailwindcss('./tailwind.config.js') ],
    });

mix.version();
