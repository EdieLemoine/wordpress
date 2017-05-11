module.exports = {
	prod: {
		files: [{
			expand: true,
			src: ['<%= style_prod %>/edit.scss'],
			dest: '<%= plugin %>/includes/framework',
			filter: 'isFile',
			flatten: true
		}, ]
	}
};
