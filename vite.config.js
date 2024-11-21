import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss",
                 "resources/js/app.js",
                 "resources/js/plugins/bootstrap.js",
                "resources/js/views/dashboard/tag/create.view.js"],
            refresh: true,
        }),
    ],
});