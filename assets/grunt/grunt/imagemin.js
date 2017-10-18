module.exports = {
  images: {
    files: [{
      expand: true,
      src: [ '<%= img_prod %>/**/*.{jpg,png,gif}' ],
    	dest: '<%= img_dist %>'
    }]
  }
}
