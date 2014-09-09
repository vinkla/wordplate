WordPress boilerplate
=====================

A [WordPress](https://github.com/WordPress/WordPress) boilerplate. This project is trying to simplify the way we're setting up a new WordPress project. [Don't repeat yourself](http://en.wikipedia.org/wiki/Don't_repeat_yourself).

This boilerplate requires PHP 5.4+ and is built with the latest version of [WordPress](https://github.com/WordPress/WordPress).

## What's included?

WordPress as a dependency. Move your content out of WordPress core.

[WordPress Packagist](http://wpackagist.org/). Instead of installing plugins manually, specify them in the `composer.json`, they will added to the plugins directory automatically.

A boilerplate theme filled with actions and filters to get the most out of WordPress.

[Joe Grainger's](https://github.com/jjgrainger) super [Custom Post Type Class](https://github.com/jjgrainger/wp-custom-post-type-class). It simplifies the way we do custom post types.

A Server Settings page. This page lists server configuration. Instead of login in to the server you can visit this page to get the necessary information. Located under *Settings > Server*.

## Installation
1. Clone this repo `git clone git@github.com:vinkla/wordpress-boilerplate.git wordpress`.
2. To install dependencies, navigate to your project root and run ```composer install```.
3. Create a database and add the credentials to `wp-config.php`.
4. Add [Keys and Salts](https://api.wordpress.org/secret-key/1.1/salt) to to `wp-config.php`.
5. Open up your browser and visit `/wordpress/wp-admin/install.php` to install WordPress.
6. Login and visit *Settings > General* page and remove `/wordpress` from Site Address (URL).
7. We're done. Lets build themes.

If you aren't running your installation from the root you'll have to update [WP_CONTENT_URL](wp-config.php) in `wp-config.php`.

## Theming
Library configuration can be done within `lib/config.php`. Visit [wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class) to read about adding custom post types. Custom post types can be added within the `includes/post-types` directory.

The boilerplate doesn't include a way to create custom fields. Instead use [Advanced Custom Fields](http://www.advancedcustomfields.com/). It is specified by default in `composer.json`.

## Contributing

Thank you for considering contributing to the WordPress boilerplate. If you are submitting a bug-fix, or an enhancement that is **not** a breaking change, submit your pull request to the `master` branch. If you are submitting a breaking change or an entirely new component, submit your pull request to the `develop` branch.

Thank you for considering contributing to the boilerplate. Whether you are submitting a bug-fix, enhancement, breaking change or an entirely new component, submit your pull request to the `master` branch.

### License

The WordPress boilerplate is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
