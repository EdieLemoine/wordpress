module.exports = {
  dist: [
    '*.map',
    'dist/**/*.map',
    'dist/js/*.js',
    '!dist/js/*.min.js',
    '*.min.css'
  ],
  nuke: [ // DANGEROUS
    '/assets',
    '/.sass-cache',
    '/.git',
    '/node-modules',
    '/grunt',
    'package.json',
    'readme.md',
    'watch.bat',
    '/**/*.map',
    'gruntfile.js'
  ]
};
