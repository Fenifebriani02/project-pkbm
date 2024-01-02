import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/assets/css/style.css', 'public/assets/js/app.js'],
            refresh: true,
        }),
    ],
});
