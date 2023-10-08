import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        //host: '127.0.0.1',
         host: '0.0.0.0',
         //port: 80,
         //strictPort: true,
        // host: 'evaluacion-docente.test',
         hmr: {
             //host: '127.0.0.1',
             // host: '0.0.0.0',
             //host: 'evaluacion-docente.test',
             //port: 5173,
            // clientPort: 80,
             //protocol: 'ws'
         },
 
     },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '@assets': '/resources/js/assets',
        },
    },
});
