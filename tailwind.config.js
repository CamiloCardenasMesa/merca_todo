const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.vue',
        './resources/**/*.js',
    ],

    theme: {
        container: {
            center: true,
        },
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary-yellow': '#F5E37F',
                'primary-blue': '#00B4CC',
                'medium-blue': '#4b4b6e',
                'dark-blue': '#212130',
                'primary-gray': '#EBEBF1',
                'aside-gray': '#dddde5',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
