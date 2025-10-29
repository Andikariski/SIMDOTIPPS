import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    base: "./", // 🔹 tambahkan baris ini
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/app.scss",
                "resources/js/app.js",
                "resources/js/admin.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
    },
});
