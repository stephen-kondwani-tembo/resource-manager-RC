module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily:{
        poppins:['poppins'],
        nunito:['nunito'],
      },
      animation: {
        'pulse-slow': 'spin 3s linear infinite',
       },
       minWidth: {
        '24': '20rem',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
