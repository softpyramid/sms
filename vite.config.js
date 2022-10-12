import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'resources/views/**',
                'app/Http/Livewire/**',
                'app/Forms/Components/**',
                'app/Tables/Columns/**',

            ],
        }),
    ],
});
