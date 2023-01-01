const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    safelist: [
        '!duration-0',
        '!delay-0',
        'html.js :where([class*="taos:"]:not(.taos-init))'
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.svelte',
        // transform: (content) => content.replace(/taos:/g, ''),
    ],

    darkMode: 'class', // or 'media' or false
    theme: {
        extend: {
            animation: {
                fadeIn: "fadeIn 2s ease-in forwards"
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: 0 },
                    "100%": { opacity: 1 }
                }
            },
            borderWidth: {
                DEFAULT: '1px',
                '0': '0',
                '2': '2px',
                '3': '3px',
                '4': '4px',
                '6': '6px',
                '8': '8px',
                '50': '.5px',
            },
            boxShadow: {
                "soft-xxs": "0 1px 5px 1px #ddd",
                "soft-xs": "0 3px 5px -1px rgba(0,0,0,.09),0 2px 3px -1px rgba(0,0,0,.07)",
                "soft-sm": "0 .25rem .375rem -.0625rem hsla(0,0%,8%,.12),0 .125rem .25rem -.0625rem hsla(0,0%,8%,.07)",
                "soft-md": "0 4px 7px -1px rgba(0,0,0,.11),0 2px 4px -1px rgba(0,0,0,.07)",
                "soft-lg": "0 2px 12px 0 rgba(0,0,0,.16)",
                "soft-xl": "0 20px 27px 0 rgba(0,0,0,0.05)",
                "soft-2xl": "0 .3125rem .625rem 0 rgba(0,0,0,.12)",
                "soft-3xl": "0 8px 26px -4px hsla(0,0%,8%,.15),0 8px 9px -5px hsla(0,0%,8%,.06)",
                "soft-light-xxs": "0 1px 5px 1px #fff",
                "soft-light-xs": "0 3px 5px -1px rgb(255,255,255,.09),0 2px 3px -1px rgb(255,255,255,.07)",
                "soft-light-sm": "0 .25rem .375rem -.0625rem rgba(255,255,255,.12),0 .125rem .25rem -.0625rem hsla(0,0%,8%,.07)",
                "soft-light-md": "0 4px 7px -1px rgb(255,255,255,.11),0 2px 4px -1px rgb(255,255,255,.07)",
                "soft-light-lg": "0 2px 12px 0 rgb(255,255,255,.16)",
                "soft-light-xl": "0 20px 27px 0 rgb(255,255,255,0.05)",
                "soft-light-2xl": "0 .3125rem .625rem 0 rgb(255,255,255,.12)",
                "soft-light-3xl": "0 8px 26px -4px rgba(255,255,255,.15),0 8px 9px -5px hsla(0,0%,8%,.06)",
                "soft-primary-outline": "0 0 0 2px #e9aede",
                blur: "inset 0 0 1px 1px hsla(0,0%,100%,.9),0 20px 27px 0 rgba(0,0,0,.05)",
                DEFAULT: "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)",
                inner: "inset 0 2px 4px 0 rgb(0 0 0 / 0.05)",
                sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)",
                md: "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)",
                lg: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)",
                xl: "0 23px 45px -11px hsla(0,0%,8%,.25)",
                "2xl": "0 25px 50px -12px rgb(0 0 0 / 0.25)",
                none: "none",
            },
            fontFamily: {
                sans: ['cairo', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                light: 'var(--light)',
                dark: 'var(--dark)',
                darker: 'var(--darker)',
                primary: {
                    DEFAULT: 'var(--color-primary)',
                    50: 'var(--color-primary-50)',
                    100: 'var(--color-primary-100)',
                    light: 'var(--color-primary-light)',
                    lighter: 'var(--color-primary-lighter)',
                    dark: 'var(--color-primary-dark)',
                    darker: 'var(--color-primary-darker)',
                },
                secondary: {
                    DEFAULT: colors.fuchsia[600],
                    50: colors.fuchsia[50],
                    100: colors.fuchsia[100],
                    light: colors.fuchsia[500],
                    lighter: colors.fuchsia[400],
                    dark: colors.fuchsia[700],
                    darker: colors.fuchsia[800],
                },
                success: {
                    DEFAULT: colors.green[600],
                    50: colors.green[50],
                    100: colors.green[100],
                    light: colors.green[500],
                    lighter: colors.green[400],
                    dark: colors.green[700],
                    darker: colors.green[800],
                },
                warning: {
                    DEFAULT: colors.orange[600],
                    50: colors.orange[50],
                    100: colors.orange[100],
                    light: colors.orange[500],
                    lighter: colors.orange[400],
                    dark: colors.orange[700],
                    darker: colors.orange[800],
                },
                danger: {
                    DEFAULT: colors.red[600],
                    50: colors.red[50],
                    100: colors.red[100],
                    light: colors.red[500],
                    lighter: colors.red[400],
                    dark: colors.red[700],
                    darker: colors.red[800],
                },
                info: {
                    DEFAULT: colors.cyan[600],
                    50: colors.cyan[50],
                    100: colors.cyan[100],
                    light: colors.cyan[500],
                    lighter: colors.cyan[400],
                    dark: colors.cyan[700],
                    darker: colors.cyan[800],
                },
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['checked', 'disabled'],
            opacity: ['dark'],
            overflow: ['hover'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require("daisyui"),
        require('taos/plugin')
    ],
};
