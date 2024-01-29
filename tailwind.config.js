/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/**/*.{html,js,php}"],
  theme: {
    extend: {
      backgroundImage: {
        'perfume' : "url('/src/assets/image-product-desktop.jpg')"
      },

      fontFamily: {
        'montserrat': ['"Montserrat"', 'sans-serif'],
        'fraunces': ['"Fraunces"', 'serif']
      },

      colors: {
        'cream' : '#F2EBE3',
        'dark-blue': '#1C232B',
        'dark-grayish': '#6C7289',
        'william': '#111a22',
        'marte': '#f29557'
      }
    },
  },
  plugins: [],
}

  