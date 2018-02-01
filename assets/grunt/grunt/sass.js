module.exports = {
	options: {
		sourceMap: true,
	},

	theme: {
		files: {
			'<%= theme_style_dist %>': '<%= theme_style_prod %>'
		}
	},

	admin: {
		files: {
			'<%= admin_style_dist %>': '<%= admin_style_prod %>'
		}
	},

	dist: {
		options: {
			sourceMap: 'none'
		},
		files: {
			'<%= theme_style_dist %>': '<%= theme_style_prod %>',
			'<%= admin_style_dist %>': '<%= admin_style_prod %>'
		}
	}
};
