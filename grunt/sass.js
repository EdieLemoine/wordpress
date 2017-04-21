module.exports = {
	prod: {
		options: {
			sourcemap: true
		},
		files: {
			'<%= theme_style_dist %>': '<%= theme_style_prod %>',
			'<%= admin_style_dist %>': '<%= admin_style_prod %>',
			'<%= plugin_style_dist %>': '<%= plugin_style_prod %>'
		}
	},

	theme: {
		files: {
			'<%= theme_style_dist %>': '<%= theme_style_prod %>',
		}
	},

	admin: {
		files: {
			'<%= admin_style_dist %>': '<%= admin_style_prod %>'
		},
	},
	plugin: {
		files: {
			'<%= plugin_style_dist %>': '<%= plugin_style_prod %>',
		}
	},

	dist: {
		options: {
			sourcemap: 'none'
		},
		files: {
			'<%= theme_style_dist %>': '<%= theme_style_prod %>',
			'<%= admin_style_dist %>': '<%= admin_style_prod %>',
			'<%= plugin_style_dist %>': '<%= plugin_style_prod %>'
		}
	}
};
