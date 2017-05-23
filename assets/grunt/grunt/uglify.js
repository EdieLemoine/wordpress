module.exports = {
  options: {
    sourceMap: false,
  },
  dist: {
    files: {
      '<%= theme_script_dist %>/ep-jquery.min.js': '<%= theme_script_dist %>/ep-jquery.js',
      '<%= theme_script_dist %>/ep-javascript.min.js': '<%= theme_script_dist %>/ep-javascript.js'
    }
  }
};
