module.exports = {
  content: ['./**/*.php'],
  safelist: [
    'home', 
    'page-destination', 
    'page-crew', 
    'page-technology'
  ],
  theme: {
    extend: {
      fontFamily: {
        bellefair: ['Bellefair', 'serif'],
        barlow: ['Barlow', 'sans-serif'],
        barlow_condensed: ['Barlow Condensed', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
