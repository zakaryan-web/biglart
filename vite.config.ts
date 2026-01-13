import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import autoprefixer from 'autoprefixer';
import tailwindcss from '@tailwindcss/vite';
import Components from 'unplugin-vue-components/vite';
import {PrimeVueResolver} from '@primevue/auto-import-resolver';

export default defineConfig({
    server: {
        host: true,
        port: 5173,
        https: {
            key: './cert.key',
            cert: './cert.crt',
        },
        origin: 'https://biglart.ru:5173',
        hmr: {
            host: 'biglart.ru',
            port: 5173,
        },
        cors: {
            origin: '*',
            methods: ['GET', 'POST', 'PUT', 'DELETE'],
            allowedHeaders: ['Content-Type', 'Authorization'],
        },
    },
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        Components({
            resolvers: [
                PrimeVueResolver()
            ]
        })
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
        },
    },
    css: {
        postcss: {
            plugins: [autoprefixer],
        },
    },
});
