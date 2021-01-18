![WordPlate](https://cloud.githubusercontent.com/assets/499192/24309675/09eec350-10cd-11e7-98f3-094003bc8e15.png)

# WordPlate

WordPlate is simply a wrapper around WordPress. It makes developers life easier. It is just like building any other WordPress website with [themes](https://developer.wordpress.org/themes) and [plugins](https://developer.wordpress.org/plugins). Just with sprinkles on top.

[![Build Status](https://badgen.net/github/checks/wordplate/framework?label=build&icon=github)](https://github.com/wordplate/framework/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/wordplate/framework)](https://packagist.org/packages/wordplate/framework/stats)
[![Latest Version](https://badgen.net/packagist/v/wordplate/framework)](https://packagist.org/packages/wordplate/framework)

- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Plugins](#plugins)
- [Laravel Mix](#laravel-mix)
- [Integrations](#integrations)
- [Upgrade Guide](#upgrade-guide)
- [FAQ](#faq)
- [Acknowledgements](#acknowledgements)
- [Contributing](#contributing)

## Features

- **WordPress + Composer = ♥️**
    
    WordPress is installed using Composer which allows WordPress to be updated by running `composer update`.

- **Environment Files**
    
    Similar to Laravel, WordPlate puts environment variables within an `.env` file such as database credentials.

- **WordPress Packagist**
    
    With WordPress Packagist you may manage your WordPress plugins and themes with Composer.

- **Must-use plugins**
    
    Don't worry about client deactivating plugins, [must-use plugins](https://wordpress.org/support/article/must-use-plugins/) is enabled by default.

- **Mail**
    
    If you want to use custom SMTP credentials to send emails, we've a package for that!

- **Laravel Mix**
    
    With Laravel Mix you can quickly get up and running with Webpack to build and minify your CSS and JavaScript.

- **Debugging**
    
    Familiar debugging helper functions are integrated such as `dump()` and `dd()`.

- **Security**
    
    With the [`roots/wp-password-bcrypt`](https://github.com/roots/wp-password-bcrypt#readme) package we've replaced WordPress outdated and insecure MD5-based password hashing with the modern and secure bcrypt.

## Installation

To use WordPlate, you need to have PHP 7.3+ and MySQL 5.7+ installed on your machine. 

WordPlate utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using WordPlate, make sure you have Composer installed on your machine.

Install WordPlate by issuing the Composer `create-project` command in your terminal:

```sh
composer create-project --prefer-dist wordplate/wordplate blog
```

Update the database credentials in the `.env` file:

```
DB_NAME=database
DB_USER=username
DB_PASSWORD=password
```

Serve your application using the [built-in web server in PHP](https://www.php.net/manual/en/features.commandline.webserver.php) (or your server of choice) from the `public` directory:

```sh
php -S localhost:8000 -t public/
```

Visit your application in the browser:

- [`http://localhost:8000/`](http://localhost:8000/) - Your website.
- [`http://localhost:8000/wordpress/wp-admin`](http://localhost:8000/wordpress/wp-admin) - The administration dashboard.

## Configuration

### Public Directory

After installing WordPlate, you should configure your web server's document / web root to be the `public` directory. The `index.php` in this directory serves as the front controller for all HTTP requests entering your application.

### Salt Keys

The next thing you should do after installing WordPlate is adding salt keys to your environment file.

Typically, these strings should be 64 characters long. The keys can be set in the `.env` environment file. If you have not copied the `.env.example` file to a new file named `.env`, you should do that now. **If the salt keys isn't set, your user sessions and other encrypted data will not be secure.**

If you're lazy like us, [visit our salt key generator](https://wordplate.github.io/salt) and copy the randomly generated keys to your `.env` file.

### Environment Configuration

It is often helpful to have different configuration values based on the environment where the application is running. For example, you may wish to use a different database locally than you do on your production server.

To make this a cinch, WordPlate utilizes the [Dotenv](https://symfony.com/doc/current/components/dotenv) PHP package by Symfony. In a fresh WordPlate installation, the root directory of your application will contain a `.env.example` file. If you install WordPlate via Composer, this file will automatically be renamed to `.env`. Otherwise, you should rename the file manually.

Your `.env` file should not be committed to your application's source control, since each developer / server using your application could require a different environment configuration. Furthermore, this would be a security risk in the event an intruder gains access to your source control repository, since any sensitive credentials would get exposed.

Read more about environment variables in Laravel's documentation:

- [Environment Variable Types](https://laravel.com/docs/7.x/configuration#environment-variable-types)
- [Retrieving Environment Configuration](https://laravel.com/docs/7.x/configuration#retrieving-environment-configuration)

## Plugins

### WordPress Packagist

We've integrated [WordPress Packagist](https://wpackagist.org) which makes it possible to install plugins with Composer. WordPress Packagist mirrors the WordPress plugin and theme directories as a Composer repository.

Install the desired plugins using `wpackagist-plugin` as the vendor name. Packages are installed in the `public/plugins` directory.

```bash
composer require wpackagist-plugin/hide-updates
```

This is an example of how your `composer.json` file might look like:

```json
"require": {
    "wordplate/framework": "^9.4",
    "wpackagist-plugin/hide-updates": "^1.0"
},
```

[Please visit WordPress Packagist for more information and examples.](https://wpackagist.org)

### Must Use Plugins

[Must-use plugins](https://wordpress.org/support/article/must-use-plugins/) (a.k.a. mu-plugins) are plugins installed in a special directory inside the content folder and which are automatically enabled on all sites in the installation.

To install plugins into into the `mu-plugins` directory, add the plugin name to the `installer-paths` in your `composer.json` file:

```json
"installer-paths": {
    "public/mu-plugins/{$name}": [
        "type:wordpress-muplugin",
        "wpackagist-plugin/hide-updates",
    ]
}
```

Install the plugin using `wpackagist-plugin` as the vendor name.

```sh
composer require wpackagist-plugin/hide-updates
```

The plugin should now be installed in the `public/mu-plugins` directory.

[Read more about the must-use plugin autoloader in the documentation.](https://roots.io/docs/bedrock/master/mu-plugin-autoloader/)

## Laravel Mix

[Laravel Mix](https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme) is a clean layer on top of Webpack to make the 80% use case laughably simple to execute. Most would agree that, though incredibly powerful, Webpack ships with a steep learning curve. But what if you didn't have to worry about that?

[To get started with Laravel Mix, please visit the documentation.](https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme)

```sh
// Run all mix tasks...
npm run dev

// Run all mix tasks and minify output...
npm run build
```

## Integrations

Below you'll find a list of plugins and packages we use with WordPlate. Some of these projects are maintained by WordPlate and some are created by other amazing developers.

- [**Blade**](https://github.com/fiskhandlarn/blade)

  The plugin integrates [Blade](https://laravel.com/docs/7.x/blade) templating system in WordPress.

- [**Clean Image Filenames**](https://wordpress.org/plugins/clean-image-filenames/)

  The plugin removes special characters from filenames.

- [**Extended ACF**](https://github.com/wordplate/extended-acf)

  The package provides an object oriented API to register fields, groups and layouts with Advanced Custom Fields.

- [**Extended CPTs**](https://github.com/johnbillion/extended-cpts)

  The package provides extended functionality to WordPress custom post types and taxonomies.

- [**Disable Embeds**](https://wordpress.org/plugins/disable-embeds/)

  The plugin prevents others from embedding your site.

- [**Disable Emojis**](https://wordpress.org/plugins/disable-emojis/)

  The plugin disables the new WordPress emoji functionality.

- [**Email Log**](https://wordpress.org/plugins/email-log/)

  The plugin that allows you to log and view all emails sent from WordPress.

- [**Hide Updates**](https://wordpress.org/plugins/hide-updates/)

  The plugin hides update notices for updates in WordPress.

- [**Mail**](https://github.com/wordplate/mail)

  The plugin provides a simple way to add custom SMTP credentials and an easier way to working with attachments.

- [**Timber**](https://upstatement.com/timber/)

  A faster, easier and more powerful way to build themes. Because WordPress is awesome, but the loop isn’t.

- [**WP Languages**](https://github.com/wp-languages/wp-languages.github.io)

  The Composer repository for WordPress translation files.

- [**WP Migrate DB**](https://wordpress.org/plugins/wp-migrate-db/)

  The plugin help you export your database as a MySQL data dump.

## Upgrade Guide

<details>
<summary><strong>Upgrading from 8 to 9</strong></summary>

1. Bump the version number in the `composer.json` file to `^9.0`.

1. Copy the `public/mu-plugins/mu-plugins.php` file into your project.

1. Update the `public/.gitignore` file to allow the new `mu-plugins.php` file:

    ```diff
    -mu-plugins/
    +mu-plugins/*
    +!mu-plugins/mu-plugins.php
    ````

1. Run `composer update` in the root of your project and your app should be up and running!
</details>
<details>
<summary><strong>Upgrading from 7 to 8</strong></summary>

1. WordPlate now requires PHP 7.2 or later.

1. Bump the version number in the `composer.json` file to `^8.0`.

   > **Note:** WordPlate 8.0 requires WordPress 5.3 or later.

1. Laravel's helper functions is now optional in WordPlate. If you want to use the functions, install the [`laravel/helpers`](https://github.com/laravel/helpers#readme) package, with Composer, in the root of your project:

   ```sh
   composer require laravel/helpers
   ```

1. Laravel's collections are now optional in WordPlate. If you want to use collections, install the [`tightenco/collect`](https://github.com/tightenco/collect#readme) package, with Composer, in the root of your project:

   ```sh
   composer require tightenco/collect
   ```

1. The `mix` helper function is now optional in WordPlate. If you want to use the function, install the [`ibox/mix-function`](https://github.com/juanem1/mix-function#readme) package, with Composer, in the root of your project:

   ```sh
   composer require ibox/mix-function
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
<summary><strong>Can I rename the public directory?</strong></summary>

If you want to rename the `public` directory you'll need to add the following line to the `wp-config.php` file:

```php
$application->setPublicPath(realpath(__DIR__));
```

Please note that you also have to update your `composer.json` file with your new `public` directory path before you can run `composer update` again.
</details>
<details>
<summary><strong>Can I rename the WordPress directory?</strong></summary>

By default WordPlate will put the WordPress in `public/wordpress`. If you want to change this there are a couple of steps you need to go through. Let's say you want to change the default WordPress location to `public/wp`:

1. Update the `wordpress-install-dir` path in your `composer.json` file.

2. Update `wordpress` to `wp` in `wordplate/public/.gitignore`.

3. Update the last line in the `public/index.php` file to:
    
    ```php
    require __DIR__.'/wp/wp-blog-header.php';
    ```

4. If you're using WP-CLI, update the path in the `wp-cli.yml` file to `public/wp`.

5. Remove the `public/wordpress` directory if it exist and then run `composer update`.
</details>
<details>
<summary><strong>Can I rename the theme directory?</strong></summary>

For most applications you may leave the theme directory as it is. If you want to rename the `wordplate` theme to something else you'll also need to update the `WP_THEME` environment variable in the `.env` file.
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

## Acknowledgements

WordPlate wouldn't be possible without these amazing open-source projects.

- [`composer/installers`](https://github.com/composer/installers)
- [`jeffreyway/laravel-mix`](https://github.com/JeffreyWay/laravel-mix)
- [`johnpbloch/wordpress-core-installer`](https://github.com/johnpbloch/wordpress-core-installer)
- [`johnpbloch/wordpress-core`](https://github.com/johnpbloch/wordpress-core)
- [`motdotla/dotenv`](https://github.com/motdotla/dotenv)
- [`outlandish/wpackagist`](https://github.com/outlandishideas/wpackagist)
- [`roots/bedrock-autoloader`](https://github.com/roots/bedrock-autoloader)
- [`roots/wp-password-bcrypt`](https://github.com/roots/wp-password-bcrypt)
- [`symfony/http-foundation`](https://github.com/symfony/http-foundation)
- [`symfony/routing`](https://github.com/symfony/var-dumper)
- [`symfony/var-dumper`](https://github.com/symfony/routing)
- [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv)

## Contributing

Please review our [contribution guidelines](https://github.com/wordplate/.github/blob/master/CONTRIBUTING.md) before submitting a pull request.

## License

[MIT](https://github.com/wordplate/framework/blob/master/LICENSE) © [Vincent Klaiber](https://vinkla.dev/)
