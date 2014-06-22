WordPress boilerplate
=====================

A [WordPress](https://github.com/WordPress/WordPress) theming boilerplate with snippets used in almost every WordPress project. This project is trying to simplify the way we're setting up a new WordPress themes. [Don't repeat yourself (DRY)](http://en.wikipedia.org/wiki/Don't_repeat_yourself).

This boilerplate requires PHP 5.4+ and is built for the latest version of [WordPress](https://github.com/WordPress/WordPress).

## What's included?

- A Server Settings page is included within the repository. The page is a list of server configuration. Instead of login in to the server you can visit the Server Settings page to get the most necessary information. Once the framework is installed you can locate the page in *Settings > Server*.

## Installation
To install dependencies, navigate to your project root and run ```composer install --prefer-dist```.

## Usage
All library configuration should be done within `lib/config.php`. Visit [wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class) to read about adding custom post types. Custom post types should be added within the `includes/post-types` directory.

This boilerplate doesn't include a way to create custom fields. Instead use [Advanced Custom Fields](http://www.advancedcustomfields.com/).

Checklist
--------------
List with necessary tasks for installing a new WordPress enviroment.

1. Delete unused default themes and plugins.
2. Add .htaccess to the web root.
3. Download and add language files (if necessary).

To-do
--------------
- Test if [remove_menu_page()](http://codex.wordpress.org/Function_Reference/remove_menu_page) is less buggy in new versions of WordPress.
- Add coding conventions and styleguide.
- ~~Move all configuration to config.php.~~
- ~~Add custom post type class.~~
