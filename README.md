WordPress boilerplate
=====================

A [WordPress](https://github.com/WordPress/WordPress) boilerplate. This project is trying to simplify the way we're setting up a new WordPress project. [Don't repeat yourself](http://en.wikipedia.org/wiki/Don't_repeat_yourself).

This boilerplate requires PHP 5.4+ and is built with the latest version of [WordPress](https://github.com/WordPress/WordPress).

## What's included?

WordPress as a dependency. Move your content out of WordPress core.

[WordPress Packagist](http://wpackagist.org/). Instead of installing plugins manually, specify them in the `composer.json` and they will be included automatically.

A boilerplate theme filled with actions and filters to get the most out of WordPress. It also cleans up the admin dashboard. A lot.

[Custom Post Type Class](https://github.com/jjgrainger/wp-custom-post-type-class) by @jjgrainger.

A Server Settings page. This page lists server configuration. Instead of login in to the server you can visit this page to get the necessary information. Located under *Settings > Server*.

## Installation
1. Clone this repository to your development environment.
`git clone git@github.com:vinkla/wordpress-boilerplate.git wordpress`

2. To install dependencies, navigate to your project root and run ```composer install```.

3. Create a database and add the credentials to `wp-config.php`.

4. Open up your browser and visit `/wordpress/wp-admin/install.php` to install WordPress.

5. Login in and visit *Settings > General* page and remove `/wordpress` from **Site Address (URL)**.

6. We're done. Lets build themes.

## Theming
Library configuration can be done within `lib/config.php`. Visit [wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class) to read about adding custom post types. Custom post types can be added within the `includes/post-types` directory.

The boilerplate doesn't include a way to create custom fields. Instead use [Advanced Custom Fields](http://www.advancedcustomfields.com/). It is specified by default in `composer.json`.

## To-do
- [ ] Test if [remove_menu_page()](http://codex.wordpress.org/Function_Reference/remove_menu_page) is less buggy in newer versions of WordPress.
- [ ] Add coding conventions and styleguide.
- [ ] Add .htaccess with `wp-admin` redirect.

**Already done.**
- [x] Move all configuration to config.php.
- [x] Add custom post type class.
