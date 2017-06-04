# Custom Plugin + Child theme for X 5

####Grunt plugins:

* [load-grunt-config](https://github.com/firstandthird/load-grunt-config) | Allows for separate files per task instead of one large unreadable gruntfile. Includes [load-grunt-tasks](https://github.com/sindresorhus/load-grunt-tasks).
* [grunt-sass](https://github.com/sindresorhus/grunt-sass) | Compiles SCSS into CSS. I use this instead of grunt-contrib-css because this one is way faster.
* [grunt-postcss](https://github.com/nDmitry/grunt-postcss) with [Autoprefixer](https://github.com/postcss/autoprefixer) | Adds vendor prefixes with data from [caniuse.com](http://caniuse.com/).
* [grunt-contrib-cssmin](https://github.com/gruntjs/grunt-contrib-cssmin) | Minifies CSS files.
* [grunt-contrib-concat](https://github.com/gruntjs/grunt-contrib-concat) | Merges JS files into concatenated.js.
* [grunt-contrib-uglify](https://github.com/gruntjs/grunt-contrib-uglify) | Uglifies concatenated.js into script.js, which is imported by functions.php
* [grunt-contrib-watch](https://github.com/gruntjs/grunt-contrib-watch) with livereload | Automatically runs set Grunt tasks when specific files are modified.
* [grunt-concurrent](https://github.com/sindresorhus/grunt-concurrent) | Improves build time by running sets of tasks simultaneously on multiple cores.
* [grunt-contrib-copy](https://github.com/gruntjs/grunt-contrib-copy) | Copies files to different locations.
* [grunt-contrib-clean](https://github.com/gruntjs/grunt-contrib-clean) | Removes specified files.
* [time-grunt](https://github.com/sindresorhus/time-grunt) | Visualizes the time every task takes.

###Usage

Open assets/grunt in your preferred command line utility and types

    $ npm install

After installation type

    $ grunt watch

and start editing your files right away!

To enable LiveReload in your HTML insert this in your document:

    <script src="//localhost:35729/livereload.js"></script>

To do this in WordPress uncomment the "insert_in_footer" function in functions.php

###What's in it?

####assets/scss:

* /global/ | Inside are all the global mixins, functions and variables used in all three other folders
* /site/ | Here are all the site specific styles
    * /partials/ | I recommend using \_custom.scss and adding more (and importing them through ./site.scss) in this folder
* /plugin/ | This is for custom elements and classes used in templates
* /admin/ | These files are for the admin panel
* /edit.scss | These are all global variables. Change any one you like in this file.

####assets/js:

*

####dist/images:

* Recommended folder to put any images (except screenshot.png of course)

####dist/js:

* Final .js file goes here

####framework/\*\*/\*.php:

* Template overrides for X

####Other files:

* style.css | Your final compiled css file which is used by WordPress by default.
* functions.php | Editable functions.php which enqueues the .js file and has an option to enable livereloading
* screenshot.png | Theme image

###What NOT to upload

These files are only for production. When you upload a site to its final destination these files are not needed and will only take up valuable disk space.

* /.git/ | Git files
* .gitignore | Git's ignore file
* /node-modules/ | Node Modules
* /.sass-cache/ | Sass Cache
* /assets/ | This is only used for production, the final files end up in either the plugin or the theme
* README.md | This very readme
* watch.bat & watch.command | Easy scripts to run grunt watch

Add this to your file transfer application filter to skip these files.

    node_modules|gruntfile\.js|package\.json|assets|README\.md|\.\*|\.sass-cache

To erase all these files easily you can use

    $ grunt clean:nuke

...but be very careful with this command, make sure you have a backup of your modified files.

###X tips

####Classes:

* Margin (m)
* Padding (p)

* Top (t)
* Left (l)
* Right (r)
* Bottom (b)
* Vertical (v)
* Horizontal (h)
* All (a)

* None (n)
* Small (s)
* Medium (m)
* Large (l)

Example: Give any element the class "mtn", this class sets the margin (m) top (t) to 0/none (n).
