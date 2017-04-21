# Basic x-child template with Grunt

####Grunt plugins:

* [load-grunt-config](https://github.com/firstandthird/load-grunt-config) | Allows for separate files per task instead of one large unreadable gruntfile. Includes [load-grunt-tasks](https://github.com/sindresorhus/load-grunt-tasks).
* [grunt-sass](https://github.com/sindresorhus/grunt-sass) | Compiles SCSS into CSS.
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

Open this folder in your preferred command line utility and type

    $ npm install

After installation type

    $ grunt watch

and start editing your files right away!

To enable LiveReload in your HTML insert this in your document:

    <script src="//localhost:35729/livereload.js"></script>

To do this in WordPress uncomment the "insert_in_footer" function in functions.php

###What's in it?

####assets/scss:

* style.scss | The main scss file. I recommend only importing other files here and doing all the styling in partials.
* /partials/\_header.scss | Example
* /partials/\_footer.scss | Example
* /partials/base/\_variables.scss | Change or add your variables here
* /partials/base/\_classes.scss | Extendable classes
* /partials/base/\_mixins.scss | Preset mixins that are included by default
* /partials/base/\_applications.scss | Where many variables get assigned to what they're meant for.
* /partials/base/\_responsive.scss | Imports partials from /responsive folder
* /partials/base/responsive/\_\*.scss | Files specific to viewport size and print style
* /partials/plugins/\_essentialgrid.scss | Template to modify Essential Grid
* /partials/plugins/\_revolutionslider.scss | Template to modify Revolution Slider
* /partials/stack/\_\*.scss | Quick fixes for each X stack, only use the one you have enabled in X, obviously.

####assets/js:

* script.min.js | This is your final, compiled, concatenated JS file, which is already enqueued via the default functions.php

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

These files are only for production. When you upload a site to it's final destination these files are not needed and will only take up valuable disk space.

* /.git/ | Git files
* /node-modules/ | Node Modules
* /.sass-cache/ | Sass Cache
* /grunt/ | Folder with gruntfile "partials"
* /assets/ | This is only used for production, the final files go either in the root or in /dist
* gruntfile.js | Gruntfile
* package.json | Tells npm what to do
* README.md | This very readme
* watch.bat | Easy batch script to run grunt watch
* .gitignore | Git's ignore file

Add this to your file transfer application filter to skip these files.

    node_modules|gruntfile\.js|package\.json|assets|README\.md|.*\.map|grunt|\.sass-cache|watch\.bat

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

Example: Give a h3 the class "mtn" in Cornerstone, this class sets the margin (m) top (t) to 0/none (n).
