module.exports = {
	options: {
		separator: ';',
	},
	prod: {
		src: 'assets/js/**/*.js',
		dest: 'includes/js/script.min.js',
	},
	dist: {
		src: ['assets/js/**/*.js', '!assets/js/concatenated.js'],
		dest: 'assets/js/concatenated.js'
	}
};
