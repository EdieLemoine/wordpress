module.exports = {
	prod: {
		files: {
			'includes/css/style.css': 'assets/scss/style.scss',
		},
	},
	dist: {
		options: {
			sourcemap: 'none',
		},
		files: {
			'includes/css/style.css': 'assets/scss/style.scss'
		}
	}
};
