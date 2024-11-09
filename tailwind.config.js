/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./src/**/*.{html,js,php}",
    "./inc/components/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#444444", // custom primary color
        secondary: "#fbbf24", // custom secondary color
      },
      backgroundImage: {
        "white-to-transparent":
          "linear-gradient(to right, rgba(255, 255, 255, 0.98) 75%, transparent 100%)",
      },
    },
    plugins: [],
  },
};
