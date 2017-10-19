module.exports = {

	theme: {
		'<%= theme_style_dist %>': '<%= theme_style_prod %>'
	},

	admin: {
		'<%= admin_style_dist %>': '<%= admin_style_prod %>'
	},

	plugin: {
		'<%= plugin_style_dist %>': '<%= plugin_style_prod %>'
	},

	dist: {
		options: {
			sourceMap: 'none'
		},
		files: {
			'<%= theme_style_dist %>': '<%= theme_style_prod %>',
			'<%= admin_style_dist %>': '<%= admin_style_prod %>',
			'<%= plugin_style_dist %>': '<%= plugin_style_prod %>'
		}
	}
};
