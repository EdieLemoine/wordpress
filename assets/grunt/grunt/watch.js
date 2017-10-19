module.exports = {
  configFiles: {
    files: [ 'gruntfile.js', 'grunt/**/*.js' ],
    options: {
      reload: true,
      event: [ 'added', 'deleted', 'changed' ],
    },
  },

  img: {
    files: [ '<%= img_prod %>/**/*.{jpg,png,gif}' ],
    tasks: [ 'imagemin' ],
  },

  svg: {
    files: [ '<%= svg_prod %>/**/*.svg' ],
    tasks: [ 'clean:svg', 'svgmin:plugin', 'svgmin:theme' ],
  },

  scss: {
    files: [ '<%= style_prod %>/**/*.scss' ],
    tasks: [ /*'copy:scss',*/ 'sass:prod', 'postcss' ],
  },

  less: {
    files: [ '<%= style_prod %>/edit.scss' ],
    tasks: [ 'copy:less' ],
  },

  js: {
    files: [ '<%= script_prod %>/**/*.js' ],
    tasks: [ 'concat', 'uglify' ],
  },

  livereload: {
    options: {
      livereload: true
    },
    files: [ '<%= theme %>/**/*.css', '<%= plugin %>/**/*.css' ],
  }
};
