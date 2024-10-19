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
            },
            fontFamily: {
                sans: ['Alegreya', 'sans-serif'],
            },
        },
    },
    plugins: [
        forms,
        containerQueries
    ],
}
