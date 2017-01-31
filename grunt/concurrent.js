module.exports = {
	scss: [
		'sass:prod',
		'postcss',
	],
	js: [
		'concat:prod'
	],
	scss_dist: [
		'sass:dist',
		'postcss',
		'cssmin'
	],
	js_dist: [
		'concat:dist',
		'uglify'
	]
};
