/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{php,html,js}", // ✅ Includes all PHP, HTML, and JS files in your plugin
    "!./node_modules/**/*", // ❌ Excludes node_modules
    "!./vendor/composer/**/*", // ❌ Excludes Composer libraries
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
