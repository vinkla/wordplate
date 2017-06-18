# WordPlate

[![WordPlate](https://cloud.githubusercontent.com/assets/499192/24309675/09eec350-10cd-11e7-98f3-094003bc8e15.png)](https://wordplate.github.io)

WordPlate is a modern WordPress stack. It simplifies the fuzziness around WordPress development.

```sh
$ composer create-project wordplate/wordplate
```

[![Build Status](https://img.shields.io/travis/wordplate/framework/master.svg?style=flat)](https://travis-ci.org/wordplate/framework)
[![StyleCI](https://styleci.io/repos/13329845/shield?style=flat)](https://styleci.io/repos/13329845)
[![Coverage Status](https://img.shields.io/codecov/c/github/wordplate/framework.svg?style=flat)](https://codecov.io/github/wordplate/framework)
[![Total Downloads](https://img.shields.io/packagist/dt/wordplate/framework.svg?style=flat)](https://packagist.org/packages/wordplate/framework)
[![Latest Version](https://img.shields.io/github/release/wordplate/wordplate.svg?style=flat)](https://github.com/wordplate/wordplate/releases)
[![License](https://img.shields.io/packagist/l/wordplate/wordplate.svg?style=flat)](https://packagist.org/packages/wordplate/wordplate)

## Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Theming](#theming)
- [Plugins](#plugins)
- [Laravel Mix](#laravel-mix)
- [Mail](#mail)
- [Post Types](#post-types)
- [Taxonomies](#taxonomies)
- [Custom Fields](#custom-fields)
- [Helpers](#helpers)
- [Security](#security)
- [Upgrade Guide](#upgrade-guide)
- [Contributing](#contributing)

## Why WordPlate?

- [Easy to setup](#installation)
- [Built with Composer](https://getcomposer.org)
- [WordPress as a dependency](https://github.com/wordplate/framework/blob/master/composer.json)
- [BrowserSync](https://www.browsersync.io)
- [Environment files](https://github.com/vlucas/phpdotenv)
- [Versioning and cache busting](https://laravel.com/docs/5.4/mix#versioning-and-cache-busting)
- [WordPress Packagist](https://wpackagist.org)
- [Laravel Mix](https://laravel.com/docs/5.4/mix)
- [Mail](#mail)

## Installation

To use WordPlate, you need to have PHP 7.0+ installed on your machine. You'll also optionally need [Node.js](https://nodejs.org/en) and [NPM](https://www.npmjs.com) installed if you want to use [Laravel Mix](https://laravel.com/docs/5.4/mix) to compile your CSS and Javascript.

Make sure your server meets the following requirements:

- PHP >= 7.0
- Mbstring PHP Extension

Install WordPlate by issuing the Composer `create-project` command in your terminal:

```bash
$ composer create-project wordplate/wordplate
```

#### Laravel Valet

If you want to use [Laravel Valet](https://laravel.com/docs/5.4/valet) with WordPlate, [please see our local valet driver repository](https://github.com/wordplate/valet#readme).

## Configuration

The first thing you should do after installing WordPlate is to add [WordPress salts](https://wordplate.github.io/salt) to your `.env` environment file.

Typically, these strings should be [64 characters long](https://wordplate.github.io/salt). The strings can be set in the `.env` environment file. If you have not renamed the `.env.example` file to `.env`, you may do that now. If the [WordPress salts](https://wordplate.github.io/salt) is not set, your user sessions and other encrypted data will not be secure!

Please visit [WordPlate's salt page](https://wordplate.github.io/salt) and copy the WordPress salts to your environment file.

> If you're using WP-CLI and want to generate your salt keys on the CLI. Please see the [WP-CLI Dotenv helper](https://aaemnnost.tv/wp-cli-commands/dotenv) command by [Evan Mattson](https://github.com/aaemnnosttv).

#### Public Directory

After installing WordPlate, you should configure your web server's document / web root to be the `public` directory. The `index.php` in this directory serves as the front controller for all HTTP requests entering your application.

#### WordPress

WordPlate supports WordPress `4.7+` and comes with the latest version out of the box. If you want to specify an exact version of WordPress you may add it to your `composer.json` file.

```json
"require": {
  "johnpbloch/wordpress": "4.7.1"
}
```

This way you can lock the WordPress version number to the one you're working with. This could come in handy if you're opening your project six months from now and WordPress has released a new version with breaking changes.

## Theming

Building your theme with WordPlate works like any other WordPress environment. Please use the [WordPress documentation](https://codex.wordpress.org/Theme_Development) for reference.

#### Plate

[Plate](https://github.com/wordplate/plate#readme) is a plugin with a bunch of defaults to help you make the most out of WordPress. It comes with handy features such as customizing the administrator dashboard. It is required by default. Please see [the documentation](https://github.com/wordplate/plate#readme) for more information.

## Plugins

[WordPress Packagist](https://wpackagist.org) comes straight out of the box with WordPlate. It mirrors the WordPress [plugin](https://plugins.svn.wordpress.org) and [theme](https://themes.svn.wordpress.org) directories as a Composer repository.

#### How do I use it?

Require the desired plugin or theme using `wpackagist-plugin` or `wpackagist-theme` as the vendor name.

```bash
$ composer require wpackagist-plugin/polylang
```

Packages are installed to `public/plugins` or `public/themes`.

#### Example

This is an example of how your `composer.json` file might look like.

```json
"require": {
    "wordplate/framework": "^5.1",
    "wpackagist-plugin/polylang": "^2.1",
},
```

Please visit [WordPress Packagist](https://wpackagist.org) website for more information and examples.

#### Autoloader

If you want to enable standard plugins to be required just like [must-use](https://codex.wordpress.org/Must_Use_Plugins) plugins in WordPlate, [please see our autoloader package](https://github.com/wordplate/autoloader#readme).

## Laravel Mix

WordPlate has integrated [Laravel Mix](https://laravel.com/docs/5.4/mix) out of the box. It provides a clean, fluent API for defining basic Webpack build steps for your WordPlate application.

> If you're looking for a more advanced Laravel Mix setup, [please see this gist](https://gist.github.com/puredazzle/3c631af402ee9edcff89389e0904834d) by [Chris Andersson](https://github.com/puredazzle).

[Read more about how to install and use Laravel Mix in the official documentation.](https://laravel.com/docs/5.4/mix)

## Mail

To send email with WordPress you can use the [`wp_mail`](https://developer.wordpress.org/reference/functions/wp_mail) helper method. WordPlate provides a simple way to add custom SMTP credentials.

Require the [mail package](https://github.com/wordplate/mail#readme) in the root directory of your project.

```sh
$ composer require wordplate/mail
```

Then update the credentials in your `.env` environment file with your SMTP keys and you're good to go. Please visit the [WordPress codex](https://codex.wordpress.org/Plugin_API/Action_Reference/phpmailer_init) to read more about the `phpmailer_init` action hook.

## Post Types

For [custom post types](https://codex.wordpress.org/Post_Types#Custom_Post_Types) we recommend looking at [Extended CPTs](https://github.com/johnbillion/extended-cpts#readme) by [John Blackbourn](https://github.com/johnbillion). The package provides extended functionality to WordPress custom post types, allowing developers to quickly build post types without having to write the same code again and again.

```php
register_extended_post_type('event');
```

## Taxonomies

For [taxonomies](https://codex.wordpress.org/Taxonomies) we recommend looking at [Extended Taxonomies
](https://github.com/johnbillion/extended-taxos#readme) by [John Blackbourn](https://github.com/johnbillion). The package provides extended functionality to WordPress custom taxonomies, allowing developers to quickly build custom taxonomies without having to write the same code again and again.

```php
register_extended_taxonomy('location', 'event');
```

## Custom Fields

For [custom fields](https://codex.wordpress.org/Custom_Fields) we recommend looking at the following plugins:

- [Advanced Custom Fields](http://www.advancedcustomfields.com) - Powerful fields for WordPress developers.

  > If you're like us and prefer to write your fields in PHP you should [checkout out our ACF helper package](https://github.com/wordplate/acf#readme)!
  
- [Papi](https://wp-papi.github.io) - A different approach on how to work with fields and page types in WordPress.

## Helpers

WordPlate includes a variety of "helper" PHP functions. You are free to use them in your own applications if you find them convenient.

WordPlate support both Laravel's [collections](https://laravel.com/docs/5.4/collections) and [helper methods](https://laravel.com/docs/5.4/helpers#available-methods). This means you can use great debugging methods such as [`dd()`](https://laravel.com/docs/5.4/helpers#method-dd) and string helpers like [`str_contains()`](https://laravel.com/docs/5.4/helpers#method-str-contains).

#### Available Methods

Below is a list of all supported helper methods.

Arrays | Strings | Miscellaneous
------ | ------- | -------------
[array_add](https://laravel.com/docs/5.4/helpers#method-array-add) | [camel_case](https://laravel.com/docs/5.4/helpers#method-camel-case) | [asset](https://laravel.com/docs/5.4/helpers#method-asset)
[array_collapse](https://laravel.com/docs/5.4/helpers#method-array-collapse) | [class_basename](https://laravel.com/docs/5.4/helpers#method-class-basename) | [base_path](#base_path)
[array_divide](https://laravel.com/docs/5.4/helpers#method-array-divide) | [e](https://laravel.com/docs/5.4/helpers#method-e) | [collect](https://laravel.com/docs/5.4/helpers#method-collect)
[array_dot](https://laravel.com/docs/5.4/helpers#method-array-dot) | [ends_with](https://laravel.com/docs/5.4/helpers#method-ends-with) | [dd](https://laravel.com/docs/5.4/helpers#method-dd)
[array_except](https://laravel.com/docs/5.4/helpers#method-array-except) | [snake_case](https://laravel.com/docs/5.4/helpers#method-snake-case) | [dump](https://laravel.com/docs/5.4/helpers#method-dd)
[array_first](https://laravel.com/docs/5.4/helpers#method-array-first) | [starts_with](https://laravel.com/docs/5.4/helpers#method-starts-with) | [env](https://laravel.com/docs/5.4/helpers#method-env)
[array_flatten](https://laravel.com/docs/5.4/helpers#method-array-flatten) | [str_after](https://laravel.com/docs/5.4/helpers#method-str-after) | [mix](https://laravel.com/docs/5.4/helpers#method-mix)
[array_forget](https://laravel.com/docs/5.4/helpers#method-array-forget) | [str_contains](https://laravel.com/docs/5.4/helpers#method-str-contains) | [template_path](#template_path)
[array_get](https://laravel.com/docs/5.4/helpers#method-array-get) | [str_finish](https://laravel.com/docs/5.4/helpers#method-str-finish) | [value](https://laravel.com/docs/5.4/helpers#method-value)
[array_has](https://laravel.com/docs/5.4/helpers#method-array-has) | [str_is](https://laravel.com/docs/5.4/helpers#method-str-is) |
[array_last](https://laravel.com/docs/5.4/helpers#method-array-last) | [str_limit](https://laravel.com/docs/5.4/helpers#method-str-limit) |
[array_only](https://laravel.com/docs/5.4/helpers#method-array-only) | [str_plural](https://laravel.com/docs/5.4/helpers#method-str-plural) |
[array_pluck](https://laravel.com/docs/5.4/helpers#method-array-pluck) | [str_random](https://laravel.com/docs/5.4/helpers#method-str-random) |
[array_prepend](https://laravel.com/docs/5.4/helpers#method-array-prepend) | [str_singular](https://laravel.com/docs/5.4/helpers#method-str-singular) |
[array_pull](https://laravel.com/docs/5.4/helpers#method-array-pull) | [str_slug](https://laravel.com/docs/5.4/helpers#method-str-slug) |
[array_set](https://laravel.com/docs/5.4/helpers#method-array-set) | [studly_case](https://laravel.com/docs/5.4/helpers#method-studly-case) |
[array_sort](https://laravel.com/docs/5.4/helpers#method-array-sort) | [title_case](https://laravel.com/docs/5.4/helpers#method-title-case)  |
[array_sort_recursive](https://laravel.com/docs/5.4/helpers#method-array-sort-recursive) |  |
[array_where](https://laravel.com/docs/5.4/helpers#method-array-where) |  |
[head](https://laravel.com/docs/5.4/helpers#method-head) |  |
[last](https://laravel.com/docs/5.4/helpers#method-last) |  |

##### `base_path()`

The `base_path` function returns the fully qualified path to the project root. You may also use the `base_path` function to generate a fully qualified path to a given file relative to the project root directory.

```php
$path = base_path();

$path = base_path('vendor/bin');
```

##### `template_path()`

The `template_path` function returns the fully qualified path to the current theme directory.

```php
$path = template_path();

$path = template_path('components/article.php');
```

## Security

Though WordPlate makes your WordPress site more secure out of the box you should always try to get ahead. We suggest [reading this article](https://premium.wpmudev.org/blog/keeping-wordpress-secure-the-ultimate-guide) to learn more about [WordPress security](http://codex.wordpress.org/Hardening_WordPress).

WordPlate comes with the [`wp-password-bcrypt`](https://github.com/roots/wp-password-bcrypt#readme) package to replace WordPress's outdated and insecure [MD5-based](https://en.wikipedia.org/wiki/MD5) password hashing with the modern and secure [bcrypt](https://en.wikipedia.org/wiki/Bcrypt).

We recommend taking a look at the [Soil plugin](https://roots.io/plugins/soil) by [Roots](https://roots.io). It is a WordPress plugin which contains a collection of modules to apply theme-agnostic front-end modifications. The plugin also address some security concerns for WordPress themes.

## Upgrade Guide

If you want to upgrade from WordPlate 4 to 5 you can follow this guide.

1. Bump the version number in the `composer.json` file to `^5.0`.

2. Copy and paste the contents of the [`wp-config.php`](public/wp-config.php) file into your application.

    > **Note:** Make sure you don't overwrite any of your custom constants.

3. Run `composer update` and everything should work as before.

## Contributing

Please review our [contribution guidelines](https://github.com/wordplate/framework/blob/master/CONTRIBUTING.md) before submitting a pull request.

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
