import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.tsx',
            ],
            refresh: true,
            entry: 'resources/js/app.tsx',
            server: {
                proxy: {
                '/': 'http://localhost:8000',
                },
            },
            build: {
                outDir: 'public/build',
            },
        }),
        react(),
    ],
});
