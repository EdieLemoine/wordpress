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
	},

	js_admin: {
		src: '<%= script_prod %>/admin/javascript/**/*.js',
		dest: '<%= script_prod %>/admin/ep-admin-javascript.js',
	},
	jq_admin: {
		options: {
			banner: 'jQuery(function($) {\n',
			footer: '\n});'
		},
		src: '<%= script_prod %>/admin/jquery/**/*.js',
		dest: '<%= script_prod %>/admin/ep-admin-jquery.js',
	}
};
