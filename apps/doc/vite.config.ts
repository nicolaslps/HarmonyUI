import { defineConfig } from 'vite';
import Symfony from '@symfony/reprise/vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    build: {
        rolldownOptions: {
            input: {
                app: './assets/app.js',
                styles: './assets/styles/app.css',
            },
        },
    },
    plugins: [
        tailwindcss(),
        Symfony({
            stimulus: 'assets/controllers.json',
        }),
    ],
});
