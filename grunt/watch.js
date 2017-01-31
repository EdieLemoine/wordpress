module.exports = {
	options: {
		livereload: true,
		// atBegin: 'copy',
	},
	configFiles: {
		files: ['gruntfile.js'],
		options: {
			reload: true,
		},
	},
	scss: {
		files: ['assets/scss/**/*.scss'],
		tasks: ['sass:prod', 'postcss:scss'],
	},
	js: {
		files: ['assets/js/**/*.js'],
		tasks: ['concat:prod']
	}
};
