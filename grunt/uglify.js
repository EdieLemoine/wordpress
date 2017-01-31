module.exports = {
  options: {
    sourceMap: true,
  },
  dist: {
    files: {
      'dist/js/ep.min.js': 'assets/js/concatenated.js'
    }
  }
};
