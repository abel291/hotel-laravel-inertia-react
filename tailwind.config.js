import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
// import lineClamp from '@tailwindcss/line-clamp';
import colors from 'tailwindcss/colors'
/** @type {import('tailwindcss').Config} */
export default {
    darkMode: ["class"],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "2rem",
                xl: "4rem",
                '2xl': "10rem",
            },
        },
        colors: {
            ...colors,
            // primary: {
            //     50: "#EFF5FB",
            //     100: "#E3EEF8",
            //     200: "#C3DAEF",
            //     300: "#A6C9E7",
            //     400: "#86B5DF",
            //     500: "#6AA4D7",
            //     600: "#4A91CF",
            //     700: "#337FC2",
            //     800: "#2B6AA1",
            //     900: "#235784",
            //     950: "#112A41"
            // }
            primary: colors.sky,
        },
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
