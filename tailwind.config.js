/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'custom': ['Hiragino Kaku Gothic Pro', 'ヒラギノ角ゴ Pro W3', 'メイリオ', 'Meiryo', 'MS PGothic', 'sans-serif'],
      },
      colors: {
        'custom-orange': '#EF5537',
        'custom-accent1': '#FAF3E0',
        'custom-accent2': '#FF814F',
        'custom-bg': '#FBFBFB',
      },
      boxShadow: {
        'custom-input': '1px 3px 7px 1px rgba(0, 0, 0, 0.07)',
      }
    },
  },
  plugins: [],
};