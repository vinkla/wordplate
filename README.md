WordPlate
=========

![wordplate](https://cloud.githubusercontent.com/assets/499192/7115057/a50304e2-e1e4-11e4-8676-979281d2dca5.png)

A [WordPress](https://github.com/WordPress/WordPress) boilerplate. This project is trying to simplify the way we're setting up a new WordPress project. [Don't repeat yourself](http://en.wikipedia.org/wiki/Don't_repeat_yourself).

[![StyleCI](https://styleci.io/repos/13329845/shield?style=flat)](https://styleci.io/repos/13329845)
[![Latest Version](https://img.shields.io/github/release/wordplate/wordplate.svg?style=flat)](https://github.com/wordplate/wordplate/releases)
[![License](https://img.shields.io/packagist/l/wordplate/wordplate.svg?style=flat)](https://packagist.org/packages/wordplate/wordplate)

## Install Composer
WordPlate utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using WordPlate, you will need to make sure you have Composer installed on your machine.

## Install WordPlate
First, download the WordPlate installer using Composer.

```bash
composer global require wordplate/installer
```

Make sure to place the `~/.composer/vendor/bin` directory in your PATH so the `wordplate` executable can be located by your system.

Once installed, the simple WordPlate new command will create a fresh WordPlate installation in the directory you specify. For instance, WordPlate new acme would create a directory named acme containing a fresh WordPlate installation with all dependencies installed. This method of installation is much faster than installing via Composer:

```bash
wordplate new acme
```

### Via Composer Create-Project
You may also install WordPlate by issuing the Composer create-project command in your terminal:

```bash
composer create-project wordplate/wordplate acme
```

## Environment

Add the database credentials and [salts](https://api.wordpress.org/secret-key/1.1/salt) to the `.env` configuration environment file.

```
DB_HOST=localhost
DB_NAME=wordpress
DB_USER=homestead
DB_PASSWORD=secret
```

## Install WordPress

Open up your browser and visit the project URL with `/wordpress/wp-admin/install.php` to install WordPress.

Thats it. We're done. Lets build stuff!

> Please note that if you aren't running your installation from the root you'll have to update [WP_CONTENT_URL](wp-config.php) in `wp-config.php`.

## Theming
Library configuration can be edited in the `wp-content/themes/wordplate/config` directory. Visit [wp-custom-post-type-class](https://github.com/jjgrainger/wp-custom-post-type-class) to read about adding custom post types. Custom post types can be added within the `wp-content/themes/wordplate/includes/post-types` directory.

The boilerplate doesn't include a way to create custom fields. Instead use [Advanced Custom Fields](http://www.advancedcustomfields.com/). It is specified by default in our `composer.json` file.

## What's included?

WordPress as a dependency. Move your content out of WordPress core.

[WordPress Packagist](http://wpackagist.org/). Instead of installing plugins manually, specify them in the `composer.json`, they will added to the plugins directory automatically.

A boilerplate theme filled with actions and filters to get the most out of WordPress.

[Vance Lucas's](https://github.com/vlucas) great [PHP dotenv](https://github.com/vlucas/phpdotenv) package. Which loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.

[TinyPNG](https://wordpress.org/plugins/tiny-compress-images/) - Speed up your website. Optimize your JPEG and PNG images automatically with TinyPNG.

[Lester Chan's](https://github.com/lesterchan) WP-Sweep plugin. It allows you to clean up unused, orphaned and duplicated data in your WordPress. It also optimizes your database tables.

[Joe Grainger's](https://github.com/jjgrainger) super [Custom Post Type Class](https://github.com/jjgrainger/wp-custom-post-type-class). It simplifies the way we do custom post types.

[Laravel's](http://laravel.com/) string and array [helper functions](http://laravel.com/docs/master/helpers). It gives use useful helpers that isn't included in PHP out of the box.

[Roots](https://github.com/roots) [soil](https://github.com/roots/soil) plugin, clean up WordPress markup, use relative URLs, nicer search URLs, and disable trackbacks.

A Server Settings page. This page lists server configuration. Instead of login in to the server you can visit this page to get the necessary information. Located under *Settings > Server*.

## License

WordPlate icon made by [Andrey Vasiliev](https://thenounproject.com/andvasiliev/). Licensed as [Creative Commons – Attribution (CC BY 3.0)](http://creativecommons.org/licenses/by/3.0/us/)

WordPlate is licensed under [The MIT License (MIT)](LICENSE).
