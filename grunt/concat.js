module.exports = {
	options: {
		separator: ';',
	},
	prod: {
		src: 'assets/js/**/*.js',
		dest: 'dist/js/script.min.js',
	},
	dist: {
		src: ['assets/js/**/*.js'],
		dest: 'dist/js/x-child.js'
	}
};
