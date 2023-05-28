/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
  "./node_modules/flowbite/**/*.js",
  "./node_modules/tw-elements/dist/js/**/*.js"],
  darkMode: 'class',
  theme: {
    extend: {},
  },
  plugins: [ require('flowbite/plugin'),
  require("tw-elements/dist/plugin")],
}

