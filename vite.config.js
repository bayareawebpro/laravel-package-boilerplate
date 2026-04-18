import {defineConfig} from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'
import fs from 'fs'

export default defineConfig({
    base: '/package-name/',
    build: {
        outDir: './public/package-name',
        chunkSizeWarningLimit: 1060,
    },
    server: {
        host: '127.0.0.1',
        port: 8001,
        hmr: {host: 'localhost'}
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    plugins: [
        {
            name: 'postbuild-commands',
            closeBundle: async () => {
                fs.cpSync('public/package-name', 'vendor/orchestra/testbench-core/laravel/public/package-name', {recursive: true});
                console.info('Copied to Orchestra Laravel Public Directory...');
            }
        },
        tailwindcss(),
        laravel({
                // Place hot file in TestBench public directory for built-in webserver usage.
                hotFile: 'vendor/orchestra/testbench-core/laravel/public/hot',
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: [
                    'resources/views/**/*.blade.php',
                ],
            }
        ),
        vue({
            template: {
                transformAssetUrls: {
                    // The Vue plugin will re-write asset URLs, when referenced
                    // in Single File Components, to point to the Laravel web
                    // server. Setting this to `null` allows the Laravel plugin
                    // to instead re-write asset URLs to point to the Vite
                    // server instead.
                    base: null,
                    // The Vue plugin will parse absolute URLs and treat them
                    // as absolute paths to files on disk. Setting this to
                    // `false` will leave absolute URLs un-touched, so they can
                    // reference assets in the public directory as expected.
                    includeAbsolute: false,
                },
            },
        }),
    ],
})
