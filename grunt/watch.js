module.exports = {
  options: {
    livereload: true,
  },
  configFiles: {
    files: ['gruntfile.js', 'grunt/**/*.js'],
    options: {
      reload: true,
    },
  },
  scss: {
    options: {
      livereload: false,
    },
    files: ['assets/scss/**/*.scss'],
    tasks: ['sass:prod', 'postcss:scss'],
  },
  js: {
    files: ['assets/js/**/*.js'],
    tasks: ['concat:prod'],
  },
  css: {
    files: ['includes/css/*.css'],
    tasks: []
  }
};
