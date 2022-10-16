# Scaffolding for WordPress development with VSCode and containers/codespaces

Base scaffolding for WordPress development with VSCode in containers/codespaces. You just need to clone this respository and update a few parameters to begin to develop your plugin/theme or even your full WordPress website.

You'll find some comment on main files to help you addapt this repo to your needs.

**NOTE:** This is a funcional but experimental project. Feel free to clone, modify or add whatever you want/need and, of course, pull request.

## Containers and structure

The structure of the containers used to work is:

 - **wordpress**: Based on official image, it contains WPCli, Xdebug, composer, node, nvm... and other usefull tools as git, wget, phpcs and phpcbf.
 - **database**: MariaDB 10.4
 - **phpmyadmin**: PHPMyAdmin latest official image

You can updata almost everything on .devcontainer/docker-compose.yml file. It's usefull to update .devcontainer/Dockerfile to change version of WordPress installed to try other PHP versions.

After mounting all the images, .devcontainer/setup.sh starts to execute and it automatically installs some extras.

## Visual Studio Code configuration

You don't need to do or update anyting. It just may work with next functions installed and configured:

 - PHP Debug by Xdebug (Extension and .launch configuration)
 - PHP Extension Pack by Xdebug
 - phpcs by shevsua (Code sniffer and linter with WordPress Code Standards base)
 - phpcbf by Per Soderlind (PHP Code Beautifier and Patcher)
 - PHP Intelliphense by Ben Mewburn
 - PHP DocBlocker by Neil Brayfield
 - ACF-Snippet by Anthony Hubble
 - Path Intellisense by Christian Kohler
 - html-css-class-completion
 - Search WordPress Docs by Yogendia
 - WPCS Whitelist Flags by Claudio Sanches

## TO-DO/Wishlist

 - Some utils to dump DB or other stuff.
 - Maybe some new images (like mailhog)