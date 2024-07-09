![WordPlate](https://github.com/vinkla/wordplate/assets/499192/a6194bed-09c0-418e-8281-2541922aa5f0)

# WordPlate

WordPlate is a boilerplate for WordPress, built with Composer and designed with sensible defaults.

[![Build Status](https://badgen.net/github/checks/vinkla/wordplate?label=build&icon=github)](https://github.com/vinkla/wordplate/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/vinkla/wordplate)](https://packagist.org/packages/vinkla/wordplate/stats)
[![Latest Version](https://badgen.net/packagist/v/vinkla/wordplate)](https://packagist.org/packages/vinkla/wordplate)

- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
    - [Public Directory](#public-directory)
    - [Environment Configuration](#environment-configuration)
    - [Salt Keys](#salt-keys)
- [Plugins](#plugins)
    - [WordPress Packagist](#wordpress-packagist)
    - [Must Use Plugins](#must-use-plugins)
    - [Included Plugins](#included-plugins)
- [Vite.js](#vitejs)
- [Mail](#mail)
- [API](#api)
- [FAQ](#faq)
- [Upgrade Guide](#upgrade-guide)
- [Acknowledgements](#acknowledgements)
- [License](#license)

## Features

- **WordPress + Composer = ❤️**
    
    WordPress can be installed and updated with ease using Composer. To update WordPress, simply run the command `composer update`.

- **Environment Files**
    
    Similar to Laravel, WordPlate stores environment variables, such as database credentials, in an `.env` file.

- **WordPress Packagist**
    
    WordPress Packagist enables the management of WordPress plugins and themes through Composer.

- **Must-use plugins**
    
    Don't worry about clients deactivating plugins; [must-use plugins](https://developer.wordpress.org/advanced-administration/plugins/mu-plugins/) are enabled by default.

- **Vite.js**
    
    Using Vite, you can rapidly set up and begin building and minifying your CSS and JavaScript.

- **Debugging**
    
    Familiar debugging helper functions are integrated such as `dump()` and `dd()`.

- **Clean UI**
  
    Enhance the WordPress dashboard and improves the [user experience](https://user-images.githubusercontent.com/499192/143415951-b01e9498-5f18-44dd-9d4b-51fb2d479a22.png) for clients.

- **Security**

    We've replaced WordPress' outdated and insecure MD5-based password hashing with modern and secure bcrypt using the  [`roots/wp-password-bcrypt`](https://github.com/roots/wp-password-bcrypt#readme) package.

## Installation

Before using WordPlate, make sure you have PHP 8.2 and MySQL 8.0 installed on your computer. You'll also need to have Composer, a package manager for PHP, installed on your computer.

To install WordPlate, open your terminal and enter the following command:

```sh
composer create-project --prefer-dist vinkla/wordplate example-app
```

After installing WordPlate, you'll need to update the database credentials in the `.env` file. This file is located in the root directory of your project. Open the file and update the following lines with your database credentials:

```env
DB_NAME=database
DB_USER=username
DB_PASSWORD=password
```

To run your WordPlate application, you may serve it using PHP's built-in web server. Open your terminal and navigate to the `public` directory of your project. Then, enter the following command:

```sh
php -S 127.0.0.1:8000 -t public/
```

Finally, open your web browser and visit the following URLs to view your WordPlate application:

- [`http://127.0.0.1:8000/`](http://127.0.0.1:8000/) - Your website
- [`http://127.0.0.1:8000/wordpress/wp-admin`](http://127.0.0.1:8000/wordpress/wp-admin) - The dashboard

## Configuration

### Public Directory

After installing WordPlate, you'll need to configure your web server's document or web root to be the `public` directory. This is where the main entry point for your application, `index.php`, is located.

By setting the `public` directory as your web server's document root, you ensure that all HTTP requests are routed through the front controller, which handles the requests and returns the appropriate responses.

This configuration helps to improve the security and performance of your application by preventing direct access to files outside of the `public` directory.

### Environment Configuration

WordPlate makes it easy to manage different configuration values based on the environment where your application is running. For example, you may need to use a different database locally than you do on your production server.

To accomplish this, WordPlate uses the [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv) PHP package. When you install WordPlate, a `.env.example` file is included in the root directory of your application. If you installed WordPlate via Composer, this file will automatically be renamed to `.env`. Otherwise, you should rename the file manually.

It's important to note that your `.env` file should not be committed to your application's source control. This is because each developer or server using your application may require a different environment configuration. Additionally, committing your `.env` file to source control would be a security risk in the event that an intruder gains access to your repository, as any sensitive credentials would be exposed.

To learn more about managing environment variables in WordPlate, you can refer to Laravel's documentation on the topic:

- [Environment Variable Types](https://laravel.com/docs/11.x/configuration#environment-variable-types)
- [Retrieving Environment Configuration](https://laravel.com/docs/11.x/configuration#retrieving-environment-configuration)

### Salt Keys

It's important to add salt keys to your environment file. These keys are used to encrypt sensitive data, such as user sessions, and help to ensure the security of your application.

If you don't set the salt keys, your user sessions and other encrypted data may be vulnerable to attacks. To make it easier to generate secure salt keys, we've created a [salt key generator](https://vinkla.github.io/salts/) that you can use. If you haven't already done so, copy the `.env.example` file to a new file named `.env`. Then visit the generator and copy the randomly generated keys to your `.env` file.

## Plugins

### WordPress Packagist

WordPlate includes integration with [WordPress Packagist](https://wpackagist.org), a Composer repository that mirrors the WordPress plugin and theme directories. With this integration, you can install and manage plugins using Composer.

To install a plugin, use `wpackagist-plugin` as the vendor name and the plugin slug as the package name. For example, to install the `clean-image-filenames` plugin, you would use the following command:

```bash
composer require wpackagist-plugin/clean-image-filenames
```

The installed packages will be located in the `public/plugins` directory.

Here's an example of what your `composer.json` file might look like:

```json
"require": {
    "wpackagist-plugin/clean-image-filenames": "^1.5"
}
```

For more information and examples, please visit the [WordPress Packagist website](https://wpackagist.org).

### Must Use Plugins

[Must-use plugins](https://developer.wordpress.org/advanced-administration/plugins/mu-plugins/) (also known as mu-plugins) are a type of WordPress plugin that is installed in a special directory inside the content folder. These plugins are automatically enabled on all sites in the WordPress installation.

To install plugins into the `mu-plugins` directory, add the plugin name to the `installer-paths` of your `composer.json` file:

```json
"installer-paths": {
    "public/mu-plugins/{$name}": [
        "type:wordpress-muplugin",
        "wpackagist-plugin/clean-image-filenames",
    ]
}
```

To install the plugin, use `wpackagist-plugin` as the vendor name and the plugin slug as the package name:

```sh
composer require wpackagist-plugin/clean-image-filenames
```

The plugin will be installed in the `public/mu-plugins` directory.

For more information on the must-use plugin autoloader, please refer to the [Bedrock documentation](https://roots.io/bedrock/docs/mu-plugin-autoloader/).

### Included Plugins

#### [Headache](https://github.com/vinkla/headache)

An easy-to-swallow painkiller plugin for WordPress. It removes a lot of default WordPress stuff you just can't wait to get rid of. It removes meta tags such as feeds, version numbers and emojis.

#### [Clean Image Filenames](https://wordpress.org/plugins/clean-image-filenames/)

The plugin automatically converts language accent characters in filenames when uploading to the media library. Characters are converted into browser and server friendly, non-accent characters.

- `Räksmörgås.jpg` → `raksmorgas.jpg`
- `Æblegrød_FTW!.gif` → `aeblegrod-ftw.gif`
- `Château de Ferrières.png` → `chateau-de-ferrieres.png`

## Vite.js

[Vite](https://vitejs.dev/) is a build tool that provides a faster and leaner development experience for modern web projects. It comes with sensible defaults and is highly extensible via its Plugin and JavaScript APIs with full typing support.

```sh
# Start the dev server...
npm run dev

# Build for production...
npm run build
```

[Learn more about Vite's backend integration.](https://vitejs.dev/guide/backend-integration.html)

## Mail

To set up custom SMTP credentials for sending emails in your WordPlate application, you need to configure the required environment variables in your `.env` file.

```env
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="Example"
```

If you're using a local email service like Mailhog or Mailpit, you need to disable encryption by setting the `MAIL_ENCRYPTION` environment variable to `null`.

## API

WordPlate automagically renames API routes from `/wp-json` to `/api`, resulting in cleaner URLs. This feature can be disabled by removing the following line from the `functions.php` file:

```diff
-add_filter('rest_url_prefix', fn() => 'api');
```

## FAQ

<details>
<summary><strong>Can I add WordPress constants to the environment file?</strong></summary>

This is possible by updating the `public/wp-config.php` file after the WordPlate application have been created.

```diff
define('WP_DISABLE_FATAL_ERROR_HANDLER', env('WP_DISABLE_FATAL_ERROR_HANDLER', false));

+define('WP_ALLOW_MULTISITE', env('WP_ALLOW_MULTISITE', true));
````

Then you may add the constant to the `.env` file.

```diff
WP_DEFAULT_THEME=wordplate
+WP_ALLOW_MULTISITE=true
````

</details>
<details>
<summary><strong>Can I disable WP-Cron and set up a manual cron job?</strong></summary>

WordPlate allows you to disable the internal WordPress cron system via the `DISABLE_WP_CRON` environment variable:

```env
DISABLE_WP_CRON=true
````

It is recommended to manually set a cron job if you enable this setting and disable the WordPress cron. You'll need to add the following in your crontab file:

```sh
*/5 * * * * curl https://example.com/wp/wp-cron.php
````

</details>
<details>
<summary><strong>Can I install languages with Composer?</strong></summary>

If you want to install language packs using Composer, we recommend looking at the [WP Languages](https://wp-languages.github.io/) project. Below is an example of a `composer.json` file that installs the Swedish language pack for WordPress.

```json
{
    "require": {
        "koodimonni-language/core-sv_se": "*",
    },
    "repositories": [
        {
            "type": "composer",
            "url": "https://wp-languages.github.io",
            "only": [
                "koodimonni-language/*"
            ]
        }
    ],
    "config": {
        "allow-plugins": {
            "koodimonni/composer-dropin-installer": true
        },
    },
    "extra": {
        "dropin-paths": {
            "public/languages/": [
                "vendor:koodimonni-language"
            ]
        }
    }
}
```

</details>
<details>
<summary><strong>Can I rename the public directory?</strong></summary>

Update your `.gitignore`, `composer.json`, `.vite.config.js`, and `wp-cli.yml` files with the new path to the `public` directory. Then, run `composer update` in the root of your project.
</details>
<details>
<summary><strong>Can I rename the WordPress directory?</strong></summary>

By default WordPlate will put the WordPress in `public/wordpress`. If you want to change this there are a couple of steps you need to go through. Let's say you want to change the default WordPress location to `public/wp`:

1. Update the `wordpress-install-dir` path in your `composer.json` file.

1. Update `wordpress` to `wp` in `wordplate/public/.gitignore`.

1. Update the last line in the `public/index.php` file to:
    
    ```php
    require __DIR__.'/wp/wp-blog-header.php';
    ```
    
1. Update the `WP_DIR` environment variable in the `.env` file to `wp`.

1. If you're using WP-CLI, update the path in the `wp-cli.yml` file to `public/wp`.

1. Remove the `public/wordpress` directory if it exist and then run `composer update`.
</details>
<details>
<summary><strong>Can I rename the theme directory?</strong></summary>

For most applications you may leave the theme directory as it is. If you want to rename the `wordplate` theme to something else you'll also need to update the `WP_DEFAULT_THEME` environment variable in the `.env` file.
</details>
<details>
<summary><strong>Can I use WordPlate with Laravel Herd or Valet?</strong></summary>

If you're using Laravel Herd or Valet together with WordPlate, you may use our [custom driver](https://laravel.com/docs/11.x/valet#custom-valet-drivers):

```php
<?php

namespace Valet\Drivers\Custom;

use Valet\Drivers\BasicValetDriver;

class WordPlateValetDriver extends BasicValetDriver
{
    public function serves(string $sitePath, string $siteName, string $uri): bool
    {
        return is_dir($sitePath . '/public/wordpress');
    }

    public function isStaticFile(string $sitePath, string $siteName, string $url)
    {
        $staticFilePath = $sitePath . '/public' . $url;

        if ($this->isActualFile($staticFilePath)) {
            return $staticFilePath;
        }

        return false;
    }

    public function frontControllerPath(string $sitePath, string $siteName, string $uri): ?string
    {
        return parent::frontControllerPath(
            $sitePath . '/public',
            $siteName,
            $this->forceTrailingSlash($uri)
        );
    }

    private function forceTrailingSlash(string $uri)
    {
        if (substr($uri, -1 * strlen('/wordpress/wp-admin')) === '/wordpress/wp-admin') {
            header('Location: ' . $uri . '/');
            exit;
        }

        return $uri;
    }
}
```
</details>
<details>
<summary><strong>Can I use WordPlate with Tinkerwell?</strong></summary>

If you're using Tinkerwell together with WordPlate, you may use our [custom driver](https://tinkerwell.app/docs/4/extending-tinkerwell/custom-drivers):

```php
<?php

final class WordPlateTinkerwellDriver extends WordpressTinkerwellDriver
{
    public function canBootstrap($projectPath)
    {
        return file_exists($projectPath . '/public/wordpress/wp-load.php');
    }

    public function bootstrap($projectPath)
    {
        require $projectPath . '/public/wordpress/wp-load.php';
    }

    public function appVersion()
    {
        return 'WordPlate ' . get_bloginfo('version');
    }
}
```
</details>

## Upgrade Guide

<details>
<summary><strong>Upgrading from 11 to 12</strong></summary>

1. The `wordplate/framework` package has been archived. Update the `composer.json` file:

    ```diff
    "require": {
    -   "wordplate/framework": "^11.1",
    +   "composer/installers": "^2.1",
    +   "johnpbloch/wordpress-core-installer": "^2.0",
    +   "johnpbloch/wordpress-core": "^6.0",
    +   "roots/bedrock-autoloader": "^1.0",
    +   "roots/wp-password-bcrypt": "^1.1",
    +   "symfony/http-foundation": "^6.0",
    +   "symfony/var-dumper": "^6.0",
    +   "vlucas/phpdotenv": "^5.4"
    }
    ```

1. Replace your `public/wp-config.php` file with [the one in this repository](public/wp-config.php). Remember to save any custom constants defined in your `wp-config.php` file.

1. Add the [`src/helpers.php`](src/helpers.php) file from this repository and autoload it in the `composer.json` file:

    ```diff
    +"autoload": {
    +    "files": [
    +        "src/helpers.php"
    +    ]
    +}
    ```

1. Run `composer update` in the root of your project.

</details>
<details>
<summary><strong>Upgrading from 10 to 11</strong></summary>

1. WordPlate now requires PHP 8.0 or later.

1. Bump the version number in the `composer.json` file to `^11.0`.

1. Run `composer update` in the root of your project.
</details>
<details>
<summary><strong>Upgrading from 9 to 10</strong></summary>

1. WordPlate now requires PHP 7.4 or later.

1. Bump the version number in the `composer.json` file to `^10.0`.

1. Rename `WP_ENV` to `WP_ENVIRONMENT_TYPE` in the environment file.

1. Rename `WP_THEME` to `WP_DEFAULT_THEME` in the environment file.

1. Rename `WP_URL` to `WP_HOME` in the environment file (if it exists).

1. If you're using the `WP_CACHE` environment variable you'll need to define it in the `public/wp-config.php` file:

    ```diff
    $application->run();

    +define('WP_CACHE', env('WP_CACHE', false));

    $table_prefix = env('DB_TABLE_PREFIX', 'wp_');
    ````

1. Optional: Rename `WP_PREFIX` to `DB_TABLE_PREFIX` in the following files:

    - `.env`
    - `.env.example`
    - `public/wp-config.php`

1. Run `composer update` in the root of your project.
</details>
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

1. Run `composer update` in the root of your project.
</details>
<details>
<summary><strong>Upgrading from 7 to 8</strong></summary>

1. WordPlate now requires PHP 7.2 or later.

1. Bump the version number in the `composer.json` file to `^8.0`.

   > [!Note]  
   > WordPlate 8.0 requires WordPress 5.3 or later.

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

1. Run `composer update` in the root of your project.
</details>
<details>
<summary><strong>Upgrading from 6 to 7</strong></summary>

1. Bump the version number in the `composer.json` file to `^7.0`.

   > [!Note]  
   > WordPlate 7.0 requires WordPress 5.0 or later.

1. Update the `realpath(__DIR__)` to `realpath(__DIR__.'/../')` in the `wp-config.php` file.

1. If your public directory isn't named `public`, add the following line to the `wp-config.php` file:

   ```php
   $application->setPublicPath(realpath(__DIR__));
   ```

1. Run `composer update` in the root of your project.
</details>
<details>
<summary><strong>Upgrading from 5 to 6</strong></summary>

1. Bump the version number in the `composer.json` file to `^6.0`.

1. Update the `realpath(__DIR__.'/../')` to `realpath(__DIR__)` in the `wp-config.php` file.

1. Run `composer update` in the root of your project.
</details>
<details>
<summary><strong>Upgrading from 4 to 5</strong></summary>

1. Bump the version number in the `composer.json` file to `^5.0`.

1. Copy and paste the contents of the [`wp-config.php`](https://github.com/vinkla/wordplate/blob/e301f9b093efdbd1bdeeb61e2f99f86e23c36fb2/public/wp-config.php) file into your application.

   > [!Note]  
   > Make sure you don't overwrite any of your custom constants.

1. Run `composer update` in the root of your project.
</details>

## Acknowledgements

WordPlate wouldn't be possible without these amazing open-source projects.

- [`composer/installers`](https://github.com/composer/installers)
- [`motdotla/dotenv`](https://github.com/motdotla/dotenv)
- [`outlandish/wpackagist`](https://github.com/outlandishideas/wpackagist)
- [`roots/bedrock-autoloader`](https://github.com/roots/bedrock-autoloader)
- [`roots/wordpress`](https://github.com/roots/wordpress)
- [`roots/wp-password-bcrypt`](https://github.com/roots/wp-password-bcrypt)
- [`symfony/http-foundation`](https://github.com/symfony/http-foundation)
- [`symfony/var-dumper`](https://github.com/symfony/var-dumper)
- [`upperdog/clean-image-filenames`](https://github.com/upperdog/clean-image-filenames)
- [`vinkla/headache`](https://github.com/vinkla/headache)
- [`vitejs/vite`](https://github.com/vitejs/vite)
- [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv)

## License

The WordPlate package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
