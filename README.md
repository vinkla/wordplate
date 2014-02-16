WordPress boilerplate
=====================

A [WordPress](https://github.com/WordPress/WordPress) theming boilerplate with snippets used in almost every WordPress project. This project is trying to simplify the way we're setting up a new WordPress themes. [Don't repeat yourself (DRY)](http://en.wikipedia.org/wiki/Don't_repeat_yourself).

This boilerplate requires PHP 5.4+ and is built for the latest version of [WordPress](https://github.com/WordPress/WordPress).

##### Installation
To install dependencies, navigate to your project root and run ```composer install --prefer-dist```.

##### Usage
All configuration should be done within `framework/config.php`. Visit [wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class) to read about adding custom post types.

This boilerplate doesn't include a way to create custom fields. Instead, use [Advanced Custom Fields](http://www.advancedcustomfields.com/).

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
