# WordPlate

[![WordPlate](https://cloud.githubusercontent.com/assets/499192/24309675/09eec350-10cd-11e7-98f3-094003bc8e15.png)](https://wordplate.github.io)

WordPlate is a modern WordPress stack which simplifies WordPress development.

```sh
$ composer create-project wordplate/wordplate
```

[![Build Status](https://badgen.net/github/checks/wordplate/framework?label=build&icon=github)](https://github.com/wordplate/framework/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/wordplate/framework)](https://packagist.org/packages/wordplate/framework/stats)
[![Latest Version](https://badgen.net/packagist/v/wordplate/framework)](https://packagist.org/packages/wordplate/framework)

- [Introduction](#introduction)
- [Getting Started](#getting-started)
- [Configuration](#configuration)
  - [Public Directory](#public-directory)
  - [Salt Keys](#salt-keys)
- [Upgrade Guide](#upgrade-guide)
- [FAQ](#faq)
- [Support](#support)
- [Contributing](#contributing)

## Introduction

WordPlate is simply a wrapper around WordPress to make developers life easier. It is just like building any WordPress website with [themes](https://developer.wordpress.org/themes) and [plugins](https://developer.wordpress.org/plugins).

#### WordPress as a dependency

WordPress is installed using Composer as a dependency. This allows WordPress to be updated by running `composer update` in the root of the project.

#### Environment Files

Similar to Laravel and Symfony, WordPlate puts environment variables within an `.env` file such as database credentials and WordPress salts.

#### WordPress Packagist

Manage your WordPress plugins and themes with Composer. WordPlate has integrated WordPress Packagist out of the box.

#### Must-use plugins

WordPlate comes with a [must-use plugin](https://wordpress.org/support/article/must-use-plugins/) loader out of the box. This means you can lock your plugins to specific versions and they are auto-activated by default.

#### Mail

Are you using custom SMTP credentials to send emails? WordPlate provides a package to add your credentials to the environment file.

#### Laravel Mix

Integrated Webpack build tool which comes with several common CSS and JavaScript pre-processors. Versioning and cache busting built right in.

#### Security

WordPlate installs the [`roots/wp-password-bcrypt`](https://github.com/roots/wp-password-bcrypt#readme) package out of the box.


## Getting Started

To use WordPlate, you need to have PHP 7.2+ and MySQL 5.7+ installed on your machine. 

WordPlate utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using WordPlate, make sure you have Composer installed on your machine.

1. Install WordPlate by issuing the Composer `create-project` command in your terminal:

    ```sh
    $ composer create-project --prefer-dist wordplate/wordplate blog
    ```

1. Update the database credentials in the `.env` file:

    ```
    DB_NAME=database
    DB_USER=username
    DB_PASSWORD=password
    ```

1. Serve your application using the [built-in web server in PHP](https://www.php.net/manual/en/features.commandline.webserver.php) (or your server of choice) from the `public` directory:

    ```sh
    $ php -S localhost:8000 -t public/
    ```

1. Visit your application in the browser:

    - [`http://localhost:8000/`](http://localhost:8000/) - Your website.
    - [`http://localhost:8000/wordpress/wp-admin`](http://localhost:8000/wordpress/wp-admin) - The administration dashboard.

## Configuration

### Public Directory

After installing WordPlate, you should configure your web server's document / web root to be the `public` directory. The `index.php` in this directory serves as the front controller for all HTTP requests entering your application.

### Salt Keys

The next thing you should do after installing WordPlate is adding salt keys to your environment file.

Typically, these strings should be 64 characters long. The keys can be set in the `.env` environment file. If you have not copied the `.env.example` file to a new file named `.env`, you should do that now. **If the salt keys isn't set, your user sessions and other encrypted data will not be secure.**

If you're lazy like us, [visit our salt key generator](https://wordplate.github.io/salt) and copy the randomly generated keys to your `.env` file.

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

## FAQ

<details>
<summary><strong>Can I change the name of the public directory?</strong></summary>

If you want to rename the `public` directory you'll need to add the following line to the `wp-config.php` file:

```php
$application->setPublicPath(realpath(__DIR__));
```

Please note that you also have to update your `composer.json` file with your new `public` directory path before you can run `composer update` again.
</details>
<details>
<summary><strong>Can I use WordPlate with Laravel Valet?</strong></summary>

If you're using [Laravel Valet](https://laravel.com/docs/7.x/valet) together with WordPlate, you may use our local valet driver. Create a file named `LocalValetDriver.php` in the root of your project and copy and paste the class below:

```php
<?php

declare(strict_types=1);

final class LocalValetDriver extends BasicValetDriver
{
    public function serves(string $sitePath): bool
    {
        return is_dir($sitePath . '/vendor/wordplate/framework');
    }

    /**
     * @return false|string
     */
    public function isStaticFile(string $sitePath, string $siteName, string $uri)
    {
        $staticFilePath = $sitePath . '/public' . $uri;

        if ($this->isActualFile($staticFilePath)) {
            return $staticFilePath;
        }

        return false;
    }

    public function frontControllerPath(string $sitePath, string $siteName, string $uri): string
    {
        $_SERVER['PHP_SELF'] = $uri;
        $_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'];

        if (strpos($uri, '/wordpress/') === 0) {
            if (is_dir($sitePath . '/public' . $uri)) {
                $uri = $this->forceTrailingSlash($uri);

                return $sitePath . '/public' . $uri . '/index.php';
            }

            return $sitePath . '/public' . $uri;
        }

        return $sitePath . '/public/index.php';
    }

    private function forceTrailingSlash(string $uri): string
    {
        if (substr($uri, -1 * strlen('/wordpress/wp-admin')) == '/wordpress/wp-admin') {
            header('Location: ' . $uri . '/');
            die;
        }

        return $uri;
    }
}
```
</details>

## Support ♥️

If you or a company you work for use WordPlate, please consider buying a copy of the [Administration UI](https://vinkla.dev/administration-ui) plugin. This will not only make your clients happy, it will also help use maintain and push WordPlate forward.

## Contributing

Please review our [contribution guidelines](https://github.com/wordplate/framework/blob/master/CONTRIBUTING.md) before submitting a pull request.

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.dev/)
