module.exports = {
	prod: {
		files: {
			'includes/css/ep-admin.css': 'assets/scss/style.scss',
		},
	},
	dist: {
		options: {
			sourcemap: 'none',
		},
		files: {
			'includes/css/ep-admin.css': 'assets/scss/style.scss'
		}
	}
};
