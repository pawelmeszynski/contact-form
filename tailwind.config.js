const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.{blade.php,scss,js}',
    ],
    theme: {
        extend: {

        },
        screens: {
            'xs': '475px',
            'sm': '640px', // => @media (min-width: 640px) { ... }
            'md': '768px', // => @media (min-width: 768px) { ... }
            'lg': '1024px', // => @media (min-width: 1024px) { ... }
            'xl': '1280px', // => @media (min-width: 1280px) { ... }
            '2xl': '1520px', // => @media (min-width: 1520px) { ... }
        },
        container: {
            center: true,
        },
    },

    plugins: [
    ],
};
