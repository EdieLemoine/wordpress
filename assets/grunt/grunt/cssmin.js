module.exports = {
  options:  {
    shorthandCompacting:  false,
    roundingPrecision:  -1,
  },

  theme: {
    files: [{
      expand: true,
      cwd: '<%= theme %>',
      src: 'style.css',
      dest: '<%= theme %>',
      ext: '.min.css'
    }]
  }
};
