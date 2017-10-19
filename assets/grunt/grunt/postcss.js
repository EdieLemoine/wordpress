module.exports = {
	options: {
		map: true,
		processors: [
			require('autoprefixer')({
				browsers: ['last 5 versions']
			})
		]
	},

	theme: {
		src: '<%= theme_style_dist %>'
	},

	admin: {
		src: '<%= admin_style_dist %>'
	},

	plugin: {
	  src: '<%= plugin_style_dist %>'
	}
};
