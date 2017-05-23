module.exports = {
  dist: [
    '<%= theme %>/**/*.map',
    '<%= plugin %>/**/*.map',
  ],
  nuke: [ // DANGEROUS
    '<%= theme %>/assets',
    '<%= plugin_prod %>',
    '/.sass-cache',
    '/.git',
    '/node-modules',
    '/grunt',
    'package.json',
    'readme.md',
    'watch.bat',
    'watch.command',
    '<%= theme %>/**/*.map',
    '<%= plugin %>/**/*.map',
    'gruntfile.js'
  ]
};
