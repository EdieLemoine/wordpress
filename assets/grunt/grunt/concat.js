module.exports = {
	options: {
		separator: '\n',
	},
	js: {
		src: '<%= script_prod %>/site/javascript/**/*.js',
		dest: '<%= script_prod %>/site/ep-javascript.js',
	},
	jq: {
		options: {
			banner: 'jQuery(function($) {\n',
			footer: '\n});'
		},
		src: '<%= script_prod %>/site/jquery/**/*.js',
		dest: '<%= script_prod %>/site/ep-jquery.js',
	}
};
