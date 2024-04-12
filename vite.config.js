import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
// vite.config.js
// vite.config.js


export default defineConfig(
    {
        resolve: {
            alias: {
                'ziggy': path.resolve('./vendor/tightenco/ziggy/dist/'),
            },
        },
        plugins: [

            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            vue(
                //     {
                //     template: {
                //         transformAssetUrls: {
                //             base: null,
                //             includeAbsolute: false,
                //         },
                //     },
                // }
            ),
        ],
    });
