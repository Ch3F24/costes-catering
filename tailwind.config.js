/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
        container: {
          center: true,
          padding: "2rem"
        },
        fontFamily: {
          sans: ['"Romek"', ...defaultTheme.fontFamily.sans]
        },
        extend: {
        },
  },
  plugins: [],
}

