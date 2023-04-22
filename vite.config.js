import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        http: false,
        hmr: {
            host: '0.0.0.0',
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/ts/bootstrap.ts',
                'resources/ts/pages/shipment.ts',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                }
            }
        })
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
            '@': '/resources/ts',
        }
    }
});
