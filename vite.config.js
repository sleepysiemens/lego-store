import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                'resources/css/bootstrap.min.css',
                'resources/css/css/style.css',
                'resources/lib/lightbox/css/lightbox.min.css',
                'resources/lib/owlcarousel/assets/owl.carousel.min.css',

                'resources/lib/easing/easing.min.js',
                'resources/lib/waypoints/waypoints.min.js',
                'resources/lib/lightbox/js/lightbox.min.js',
                'resources/lib/owlcarousel/owl.carousel.min.js',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
    ],
});
