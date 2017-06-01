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
	}
	// js: {
	// 	expand: true,
	// 	src: ['<%= script_prod %>/plugin/**/*.js'],
	// 	dest: '<%= plugin %>/js',
	// 	filter: 'isFile',
	// 	flatten: true
	// }
};
