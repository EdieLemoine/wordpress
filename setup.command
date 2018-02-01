#!/bin/bash

echo "Enter destination directory"
read name

if [[ $name != /* ]]; then
  dest=/Applications/MAMP/htdocs/$name
fi

source=`dirname "$0"`
assets="$(dirname "$source")/_ASSETS"

mkdir -p $dest

cp -R "$assets/wordpress/" $dest
ln -s "$assets/x" $dest/wp-content/themes

ln -s "$source/plugins/edies-plugin" $dest/wp-content/plugins
ln -s "$source/themes/x-child" $dest/wp-content/themes


# Grunt actions
cd "$source/assets/grunt"
npm i
grunt watch
