import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: 'public/build',
        manifest: true
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style-dashboard.css',
                'resources/css/style-home.css',
                'resources/js/app.js',
                'resources/js/add_client.js',
                'resources/js/add_user.js',
                'resources/js/godsGift.js',
                'resources/js/sidebar-nav.js',
            ],
            refresh: true,
        }),
    ],
});
