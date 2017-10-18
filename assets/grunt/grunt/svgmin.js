module.exports = {
  svg: {
    files: [{
      expand: true,
  		src: ['<%= svg_prod %>/**/*.svg'],
  		dest: '<%= svg_dist %>',
  		flatten: true
    }]
  }
}
