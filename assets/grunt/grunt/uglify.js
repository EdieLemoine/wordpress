module.exports = {
  options: {
    sourceMap: false,
  },
  site: {
    files: [{
      expand: true,
      flatten: true,
      src: '<%= script_prod %>/site/*.js',
      dest: '<%= theme_script_dist %>',
      rename: function (dst, src) {
        return dst + '/' + src.replace('.js', '.min.js');
      }
    }]
  },
  plugin: {
    files: [{
      expand: true,
      flatten: true,
      src: '<%= script_prod %>/plugin/**/*.js',
      dest: '<%= plugin %>/js',
      rename: function (dst, src) {
        return dst + '/' + src.replace('.js', '.min.js');
      }
    }]
  }
};
