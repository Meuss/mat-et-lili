import preset from './vendor/filament/support/tailwind.config.preset'
import forms from '@tailwindcss/forms'
import containerQueries from '@tailwindcss/container-queries'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            container: {
                center: true,
                padding: '1rem',
                screens: {
                    sm: '640px',
                    md: '768px',
                    lg: '1024px',
                    xl: '1024px',
                    '2xl': '1024px',
                },
            },
            fontFamily: {
                sans: ['Alegreya', 'sans-serif'],
                serif: ['Lavishly Yours', 'cursive'],
            },
            fontSize: {
                sm: '1rem',
                base: '1.25rem',
                xl: '1.563rem',
                '2xl': '1.953rem',
                '3xl': '2.441rem',
                '4xl': '3.052rem',
                '5xl': '3.5rem',
            }
        },
    },
    plugins: [
        forms,
        containerQueries
    ],
}
