import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    base: "/",
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/style.css', "resources/css/admin/style.css" ,  "resources/css/alert.css" ,'resources/js/app.js', 'resources/js/bootstrap.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
