module.exports = {
	prod: {
		expand: true,
		src: ['<%= style_prod %>/edit.scss'],
		dest: '<%= plugin %>/includes/framework',
		filter: 'isFile',
		flatten: true,
		options: {
			process: function (content, srcpath) {
				return content.replace(/\/\/.*$/mg, '');
			}
		}
	}
};
