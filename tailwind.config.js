const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                header: "#2196F3",
                darkbg: "#303030",
                darkPrimary: "#1F2937",
                primaryCard: "#0288D1",
                secondaryCard: "#303F9F",
                tertiaryCard: "#0091EA",
                quaternaryCard: "#00B0FF",
                save: "#309F4F",
                cancel: "#D30404",
                textFieldPlaceholder: "#B4CEE5",
                textButtonChecked: "#8086BE",
                buttonChecked: "#4956AB",
                buttonCheck: "#3486D7",
                textFieldDisabled: "#7FC3E8",
            },
            fontFamily: {
                sans: [
                    "Figtree",
                    "Roboto",
                    "sans-serif",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
