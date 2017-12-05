module.exports = {
  configFiles: {
    files: [ 'gruntfile.js', 'grunt/**/*.js' ],
    options: {
      reload: true,
      event: [ 'added', 'deleted', 'changed' ],
    },
  },

  // Images
  img: {
    files: [ '<%= img_prod %>/**/*.{jpg,png,gif}' ],
    tasks: [ 'imagemin' ],
  },

  // SVG
  svg: {
    files: [ '<%= svg_prod %>/**/*.svg' ],
    tasks: [ 'clean:svg', 'svgmin:plugin', 'svgmin:theme' ],
  },

  // Sass
  scss_admin: {
    files: [
      '<%= style_prod %>/global/**/*.scss',
      '<%= style_prod %>/presets/**/*.scss',
      '<%= style_prod %>/admin/**/*.scss',
      '<%= style_prod %>/edit.scss',
    ],
    tasks: [ 'sass:admin', 'postcss:admin' ],
  },
  scss_plugin: {
    files: [
      '<%= style_prod %>/global/**/*.scss',
      '<%= style_prod %>/presets/**/*.scss',
      '<%= style_prod %>/plugin/**/*.scss',
      '<%= style_prod %>/edit.scss',
    ],
    tasks: [ 'sass:plugin', 'postcss:plugin' ],
  },
  scss_theme: {
    files: [
      '<%= style_prod %>/global/**/*.scss',
      '<%= style_prod %>/presets/**/*.scss',
      '<%= style_prod %>/site/**/*.scss',
      '<%= style_prod %>/thirdparty/**/*.scss',
      '<%= style_prod %>/edit.scss',
    ],
    tasks: [ 'sass:theme', 'postcss:theme' ],
  },
  scss_global: {
    files: [
      '<%= style_prod %>/global/**/*.scss',
    ],
    tasks: [ 'sass:global', 'postcss:global' ],
  },


  ini: {
    files: ['../../*.ini'],
    tasks: [ 'copy:ini' ]
  },

  // Javascript
  js: {
    files: [ '<%= script_prod %>/**/*.js' ],
    tasks: [ 'concat', 'uglify' ],
  },

  livereload: {
    options: {
      livereload: true
    },
    files: [ '<%= theme %>/**/*.css', '<%= plugin %>/includes/css/**/*.css' ],
  }
};
