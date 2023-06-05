import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js',
            'resources/css/graph.css','resources/css/admin.css','resources/css/user.css'],
            refresh: true,
        }),
    ],
});
