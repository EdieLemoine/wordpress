module.exports = {
  options: {
    sourceMap: true,
  },
  dist: {
    files: {
      'includes/js/script.min.js': 'assets/js/concatenated.js'
    }
  }
};
