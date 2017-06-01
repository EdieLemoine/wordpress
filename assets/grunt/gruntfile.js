module.exports = function(grunt) {

	console.log('Start');

	// measures the time each task takes
	require( 'time-grunt' )( grunt );

	// load grunt config
	require( 'load-grunt-config' )( grunt, {
		// configPath: 'config/',
		data: {
			theme: '../../themes/x-child',
			plugin: '../../plugins/edies-plugin/includes',

			style_prod: '../../assets/scss',
			script_prod: '../../assets/js',

			admin_style_prod: '<%= style_prod %>/admin/admin.scss',
			plugin_style_prod: '<%= style_prod %>/plugin/plugin.scss',
			theme_style_prod: '<%= style_prod %>/site/site.scss',

			theme_style_dist: '<%= theme %>/style.css',
			admin_style_dist: '<%= plugin %>/css/ep-admin.css',
			plugin_style_dist: '<%= plugin %>/css/ep-style.css',

			theme_script_dist: '<%= theme %>/dist/js'
		}
	});
};
