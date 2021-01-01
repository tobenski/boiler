const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
const { gray } = require('tailwindcss/colors');

module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                sche: ['Scheherazade', 'Roboto'],
            },
            colors: {
                transparent: 'transparent',
                primary: colors.blue[500],
                secondary: colors.gray[500],
                success: colors.green[500],
                danger: colors.red[500],
                warning: colors.yellow[700],
                info: colors.cyan[400],
                light: colors.gray[200],
                dark: colors.gray[800],
                white: colors.white,
                black: colors.black,
                // Admin layout colors
                headerBg: colors.gray[500],
                headerText: colors.black,
                siteBg: colors.white,
                siteText: colors.gray[800],

            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
