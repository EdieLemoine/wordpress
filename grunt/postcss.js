module.exports = {
	options: {
		map: true,
		processors: [
			require('autoprefixer')({
				browsers: ['last 2 versions']
			})
		]
	},
	scss: {
		src: 'dist/css/ep.css'
	}
};
