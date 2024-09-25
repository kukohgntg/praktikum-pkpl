import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { injectSpeedInsights } from '@vercel/speed-insights';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

injectSpeedInsights();