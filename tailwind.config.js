/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./src/**/*.{html,js,php}",
    "./inc/components/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'primary': "Irvin-Heading",
        'secondary': "Libre Caslon Text",
      },
      colors: {
        'primary': "#444444",
        'secondary': "#F2F2F2",
        'tertiary': "#fbbf24",
      },
      backgroundImage: {
        "white-to-transparent":
          "linear-gradient(to right, rgba(255, 255, 255, 0.98) 45%, transparent 55%)",
      },
    },
    plugins: [],
  },
};
