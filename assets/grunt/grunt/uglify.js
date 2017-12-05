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
      rename: function (dest, src) {
        return dest + '/' + src.replace('.js', '.min.js');
      }
    }]
  },
  admin: {
    files: {
      '<%= plugin %>/js/ep-admin.min.js': ['<%= script_prod %>/admin/ep-admin-javascript.js', '<%= script_prod %>/admin/ep-admin-jquery.js' ]
    }
  },
  
  thirdparty: {
    files: [{
      expand: true,
      flatten: true,
      src: '<%= script_prod %>/thirdparty/**/*.js',
      dest: '<%= plugin %>/js',
      rename: function ( dest, src ) {
        console.log( require( 'path' ).basename( src ).replace( '.js', '' ) );
        return dest + '/' + require( 'path' ).basename( src ).replace( '.js', '' ) + '/' + src.replace('.js', '.min.js');
      }
    }]
  }
};
