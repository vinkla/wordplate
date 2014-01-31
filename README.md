WordPress boilerplate
=====================

A [WordPress](https://github.com/WordPress/WordPress) theming boilerplate with snippets used in almost every WordPress project. This project is trying to simplify the way we're setting up a new WordPress themes. [Don't repeat yourself (DRY)](http://en.wikipedia.org/wiki/Don't_repeat_yourself).

This boilerplate requires PHP 5.4+ and is built for the latest version of [WordPress](https://github.com/WordPress/WordPress).

##### Installation
To install dependencies, navigate to your project root and run ```composer install --prefer-dist```.

##### Usage
All configuration should be done within `framework/init.php`. Visit [wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class) to read about adding custom post types.

To-do
--------------
- Move all configuration to init.php in admin framework.
- Test if [remove_menu_page()](http://codex.wordpress.org/Function_Reference/remove_menu_page) is less buggy in new versions of WordPress.
- Add coding conventions and styleguide.
