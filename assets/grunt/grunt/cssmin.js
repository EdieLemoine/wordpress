module.exports = {
  options:  {
    shorthandCompacting:  false,
    roundingPrecision:  -1,
  },
  target:  {
    files:  {
      '<%= theme_style_dist %>': '<%= theme_style_dist %>',
      '<%= plugin_style_dist %>': '<%= plugin_style_dist %>',
      '<%= admin_style_dist %>': '<%= admin_style_dist %>'
    }
  }
};
