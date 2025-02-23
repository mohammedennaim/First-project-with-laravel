const mix = require('laravel-mix');

mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
]);

if (mix.inProduction()) {
    mix.version();
}
