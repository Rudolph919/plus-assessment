const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#F84453',
                'secondary': '#1D1D1D',
                'pureWhite': '#FFFFFF',
                'iconGrey': '#E6E6E6',
                'placeholderGrey': '#969696',
                'textBarGrey': '#303030',
                'textLink': '#FFCC34',
                'base': '#222222',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms')
    ],

};
