# Core Functionality Plugin

A plugin to keep the functionalities unrelated to theme-develop.

## Description

This plugin holds functionalities to improve your WordPress instalation and creates a custom post type for portfolio items. It creates a new interface to manage your portfolio posts separate from blog posts and web pages.<br>
It also renames the WordPress dashboard **Posts** in to **Blog posts**.
This plugin was created to use mainly in small client sites based on the way I work and my personal needs as a WordPress developer.

## Requirements

- WordPress 4.2 , tested up to 5.7

## Installation

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

## Changelog

### 1.0.0

- Remove the Login Logo URL function, as it was added to my [Genesis Starter Theme](https://github.com/LuisColome/the-dock).
- Added a function to add a link to the Plugins page from the Frontend, under Site's name.
- Clean the code.
- README updated.

### 0.9.5

- Added Team CPT that I use in almost every WordPress Website I lately create. 
- Added Category pagination fix when /%category%/%post%/ permaling structure is used to avoid 404 errors.

### 0.9.0

- Added more nodes to remove from WordPress Admin Bar. Just uncomment them to remove those nodes.
- Added the file 'kill-pingbacks.php' to kill all the pingbacks from WordPress.
- Tested in 5.7 WordPress version.
- Updated README.md file.

## Credits , Copyright and License

2020-2021 GPL [Luis Colomé](https://luiscolome.com/).
Thanks to [Lars Nyström](https://github.com/larsnystrom/category-pagination-fix/blob/master/category-pagefix.php) for his Category Pagination Fix plugin.
This project is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

##### Disclaimer

This software is **WITHOUT WARRANTY** as per the GNU General Public License, and very much a work in progress. :octocat:
