// const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();

const mix = require('laravel-mix');
const path = require('path');
require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css')
   .purgeCss({
        content: [
            path.join(__dirname, 'resources/views/**/*.blade.php'),
            path.join(__dirname, 'app/Http/Livewire/**/*.php'),
            path.join(__dirname, 'resources/js/**/*.js'),
        ],
        safelist: {
            // "greedy" buscará cualquier clase que CONTENGA estas cadenas
            greedy: [
                /bi-/,     /* Para Bootstrap Icons */
                /fa-/,     /* Para Font Awesome */
                /fab-/,    /* Para marcas (WhatsApp, Facebook) */
                /whatsapp/ /* Por seguridad para tu clase whatsapp-icon */
            ],
            standard: [
                'active', 'show', 'collapsing', 'is-invalid', 'invalid-feedback'
            ]
        },
   });