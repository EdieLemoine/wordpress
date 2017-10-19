module.exports = {
	scss: {
		expand: true,
		src: ['<%= style_prod %>/edit.scss'],
		dest: '<%= plugin %>/framework',
		filter: 'isFile',
		flatten: true,
		options: {
			process: function (content, srcpath) {
				return content.replace(/\/\/.*$/mg, '');
			}
		}
	},

	less: {
		expand: true,
		src: ['<%= style_prod %>/edit.scss', '<%= style_prod %>/**/_variables.scss'],
		dest: '../less',
		filter: 'isFile',
		flatten: true,
		ext: '.less',
		options: {
			process: function ( content, srcpath ) {
				return content.replace( /\$/g, '@' );
			}
		}
	}


	// js: {
	// 	expand: true,
	// 	src: ['<%= script_prod %>/plugin/**/*.js'],
	// 	dest: '<%= plugin %>/js',
	// 	filter: 'isFile',
	// 	flatten: true
	// }
};
