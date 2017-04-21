module.exports = {
	options: {
		map: true,
		processors: [
			require('autoprefixer')({
				browsers: ['last 2 versions']
			})
		]
	},
	theme: {
		src: '<%= theme_dist %>'
	},
	plugin: {
		src: ['<%= plugin_style_dist %>', '<%= plugin_admin_dist %>']
	},
	prod: {
		src: [ '<%= theme_style_dist %>', '<%= admin_style_dist %>', '<%= plugin_style_dist %>' ]
	}
};
