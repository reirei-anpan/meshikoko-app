/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'custom-orange': '#EF5537',
        'custom-accent1': '#FAF3E0',
        'custom-accent2': '#FF814F',
        'custom-bg': '#FBFBFB',
      }
    },
  },
  plugins: [],
};