module.exports = function(grunt) {

	console.log('Start');

	// measures the time each task takes
	require( 'time-grunt' )( grunt );

	// load grunt config
	require( 'load-grunt-config' )( grunt, {
		// configPath: 'config/',
		data: {
			base: '../../',

			theme: '<%= base %>themes/x-child',
			plugin: '<%= base %>plugins/edies-plugin',

			style_prod: '<%= base %>assets/scss',
			script_prod: '<%= base %>assets/js',

			admin_style_prod: '<%= style_prod %>/admin/admin.scss',
			plugin_style_prod: '<%= style_prod %>/plugin/plugin.scss',
			theme_style_prod: '<%= style_prod %>/site/site.scss',

			theme_style_dist: '<%= theme %>/style.css',
			admin_style_dist: '<%= plugin %>/includes/css/ep-admin.css',
			plugin_style_dist: '<%= plugin %>/includes/css/ep-style.css',

			theme_script_dist: '<%= theme %>/dist/js',
		}
	});
};
