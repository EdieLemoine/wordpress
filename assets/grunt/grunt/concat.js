module.exports = {
	options: {
		separator: '\n',
	},
	js: {
		src: '<%= script_prod %>/site/javascript/**/*.js',
		dest: '<%= theme_script_dist %>/ep-javascript.js',
	},
	jq: {
		options: {
			banner: 'jQuery(function($) {\n',
			footer: '\n});'
		},
		src: '<%= script_prod %>/site/jquery/**/*.js',
		dest: '<%= theme_script_dist %>/ep-jquery.js',
	}
};
