module.exports = {
  configFiles: {
    files: [ 'gruntfile.js', 'grunt/**/*.js' ],
    options: {
      reload: true,
    },
  },

  scss: {
    files: [ '<%= style_prod %>/**/*.scss' ],
    tasks: [ 'copy:prod', 'sass:prod', 'postcss' ],
  },

  js: {
    files: [ '<%= script_prod %>/**/*.js' ],
    tasks: [ 'concat', 'uglify:dist' ],
  },

  livereload: {
    options: {
      livereload: true,
    },
    files: [ '<%= theme %>/**/*.css', '<%= plugin %>/**/*.css' ]
  }
};
