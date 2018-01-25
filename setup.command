#!/bin/bash

echo "Enter destination directory"
read dest

cp -R "`dirname "$0"`/../_ASSETS/wordpress/" $dest
ln -s "`dirname "$0"`/../_ASSETS/x" $dest/wp-content/themes

ln -s "`dirname "$0"`/plugins/edies-plugin" $dest/wp-content/plugins
ln -s "`dirname "$0"`/themes/x-child" $dest/wp-content/themes

cd "`dirname "$0"`/assets/grunt"

npm i
grunt watch
