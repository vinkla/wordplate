# WordPlate

[![WordPlate](https://cloud.githubusercontent.com/assets/499192/24309675/09eec350-10cd-11e7-98f3-094003bc8e15.png)](https://wordplate.github.io)

WordPlate is a modern WordPress stack which simplifies WordPress development.

```sh
$ composer create-project wordplate/wordplate
```

[![Build Status](https://badgen.net/github/checks/wordplate/framework?label=build&icon=github)](https://github.com/wordplate/framework/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/wordplate/framework)](https://packagist.org/packages/wordplate/framework/stats)
[![Latest Version](https://badgen.net/packagist/v/wordplate/framework)](https://packagist.org/packages/wordplate/framework)

- [Installation](#installation)
- [Upgrade Guide](#upgrade-guide)

## Installation

Visit the [official documentation](https://wordplate.github.io/) page if you want to dive right in and start building WordPress applications with WordPlate. The documentation is thorough, complete, and makes it a breeze to get started learning WordPlate.

## Upgrade Guide

If you're running an older version of WordPlate and want to upgrade, please see the guides below.

<details>
<summary><strong>Upgrading from 7 to 8</strong></summary>

1. WordPlate now requires PHP 7.2 or later.

1. Bump the version number in the `composer.json` file to `^8.0`.

   > **Note:** WordPlate 8.0 requires WordPress 5.3 or later.

1. Laravel's helper functions is now optional in WordPlate. If you want to use the functions, install the [`laravel/helpers`](https://github.com/laravel/helpers#readme) package, with Composer, in the root of your project:

   ```sh
   $ composer require laravel/helpers
   ```

1. Laravel's collections are now optional in WordPlate. If you want to use collections, install the [`tightenco/collect`](https://github.com/tightenco/collect#readme) package, with Composer, in the root of your project:

   ```sh
   $ composer require tightenco/collect
   ```

1. The `mix` helper function is now optional in WordPlate. If you want to use the function, install the [`ibox/mix-function`](https://github.com/juanem1/mix-function#readme) package, with Composer, in the root of your project:

   ```sh
   $ composer require ibox/mix-function
   ```

1. Replace any usage of `asset`, `stylesheet_url` and `template_url` functions with WordPress's [`get_theme_file_uri`](https://developer.wordpress.org/reference/functions/get_theme_file_uri/) function.

1. Replace any usage of `stylesheet_path` and `template_path` functions with WordPress's [`get_theme_file_path`](https://developer.wordpress.org/reference/functions/get_theme_file_path/) function .

1. The `base_path` and `template_slug` functions have been removed.

1. Run `composer update` in the root of your project and your app should be up and running!
</details>
<details>
<summary><strong>Upgrading from 6 to 7</strong></summary>

1. Bump the version number in the `composer.json` file to `^7.0`.

   > **Note:** WordPlate 7.0 requires WordPress 5.0 or later.

1. Update the `realpath(__DIR__)` to `realpath(__DIR__.'/../')` in the `wp-config.php` file.

1. If your public directory isn't named `public`, add the following line to the `wp-config.php` file:

   ```php
   $application->setPublicPath(realpath(__DIR__));
   ```

1. Run `composer update` in the root of your project and your app should be up and running!
</details>
<details>
<summary><strong>Upgrading from 5 to 6</strong></summary>

1. Bump the version number in the `composer.json` file to `^6.0`.

1. Update the `realpath(__DIR__.'/../')` to `realpath(__DIR__)` in the `wp-config.php` file.

1. Run `composer update` in the root of your project and your app should be up and running!
</details>
<details>
<summary><strong>Upgrading from 4 to 5</strong></summary>

1. Bump the version number in the `composer.json` file to `^5.0`.

1. Copy and paste the contents of the [`wp-config.php`](public/wp-config.php) file into your application.

   > **Note:** Make sure you don't overwrite any of your custom constants.

1. Run `composer update` in the root of your project and your app should be up and running!
</details>

## Contributing

Please review our [contribution guidelines](https://github.com/wordplate/framework/blob/master/CONTRIBUTING.md) before submitting a pull request.

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.dev/)
