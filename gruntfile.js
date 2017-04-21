module.exports = function(grunt) {
	console.log('Start');

	// measures the time each task takes
	require( 'time-grunt' )( grunt );

	// load grunt config
	require( 'load-grunt-config' )( grunt, {
		data: {
			theme: 'themes/x-child',
			plugin: 'plugins/edies-plugin',


			style_prod: 'assets/scss',
			script_prod: 'assets/js',

			admin_style_prod: '<%= style_prod %>/admin/admin.scss',
			plugin_style_prod: '<%= style_prod %>/plugin/plugin.scss',
			theme_style_prod: '<%= style_prod %>/site/site.scss',

			theme_style_dist: '<%= theme %>/style.css',
			admin_style_dist: '<%= plugin %>/includes/css/ep-admin.css',
			plugin_style_dist: '<%= plugin %>/includes/css/ep-style.css',

			theme_script_dist: '<%= theme %>/dist/js',
			// plugin_js_dist: '<%= plugin_dist %>/css/ep-style.css',
			// plugin_js_prod: '<%= plugin_dist %>/css/ep-style.css'
		}
	});
};
