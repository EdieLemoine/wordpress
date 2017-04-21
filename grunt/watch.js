module.exports = {
  configFiles: {
    files: [ 'gruntfile.js', 'grunt/**/*.js' ],
    options: {
      reload: true,
    },
  },

  scss: {
    files: [ '<%= style_prod %>/**/*.scss' ],
    tasks: [ 'sass:prod', 'postcss:prod' ],
  },

  livereload: {
    options: {
      livereload: true,
    },
    files: [ '<%= theme %>/**/*.css', '<%= plugin %>/**/*.css' ]
  }
};
