import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
// const filters = require('tailwindcss-filters')

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
                laila: ['Laila', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        // filters
    ],
};
