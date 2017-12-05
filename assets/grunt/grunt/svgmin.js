module.exports = {
  // options: {
  //   plugins: [
  //     {
  //       removeViewBox: false
  //     }, {
  //       removeUselessStrokeAndFill: false
  //     }, {
  //       removeAttrs: {
  //         attrs: ['xmlns']
  //       }
  //     }
  //   ]
  // },
  plugin: {
    files: [{
      expand: true,
  		src: ['<%= svg_prod %>/plugin/*.svg'],
  		dest: '<%= plugin_svg_dist %>',
  		flatten: true
    }]
  },
  
  theme: {
    files: [{
      expand: true,
  		src: ['<%= svg_prod %>/theme/*.svg'],
  		dest: '<%= theme_svg_dist %>/',
  		flatten: true
    }]
  }
}
