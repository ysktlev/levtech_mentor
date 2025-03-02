import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
    build: {
        watch: {
            poll: process.env.VITE_WATCH_POLL ? Number(process.env.VITE_WATCH_POLL) : undefined
        }
    }
});
