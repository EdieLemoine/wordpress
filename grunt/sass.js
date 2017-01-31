module.exports = {
	prod: {
		options: {
			loadPath: 'assets/scss/partials',
		},
		files: {
			'dist/css/ep.css': 'assets/scss/style.scss'
		}
	}
};
