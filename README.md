WordPlate
=========

![wordplate](https://cloud.githubusercontent.com/assets/499192/13548328/22cb8d6c-e2ee-11e5-8adf-33c8184181b1.jpg)

WordPlate is a modern WordPress stack which tries to simplify the fuzziness around WordPress development. Using the latest standards from PHP. WordPlate utilizes WordPress as its dependency through Composer.

```bash
composer create-project wordplate/wordplate
```

[![Build Status](https://img.shields.io/travis/wordplate/framework/master.svg?style=flat)](https://travis-ci.org/wordplate/framework)
[![Latest Version](https://img.shields.io/github/release/wordplate/wordplate.svg?style=flat)](https://github.com/wordplate/wordplate/releases)
[![License](https://img.shields.io/packagist/l/wordplate/wordplate.svg?style=flat)](https://packagist.org/packages/wordplate/wordplate)

## Table of Contents

- [Installation](#installation)
- [Plugins](#plugins)
- [Contributing](#contributing)

## Why WordPlate?

- [Easy to setup](#installation)
- [Built with Composer](https://getcomposer.org/)
- [WordPress as a dependency](composer.json)
- [Environment files](https://github.com/vlucas/phpdotenv)
- [Versioning and cache busting](https://laravel.com/docs/elixir#versioning-and-cache-busting)
- [WordPress Packagist](https://wpackagist.org/)
- [Laravel Elixir](https://laravel.com/docs/elixir)
- [Real GUIDs](https://github.com/wordplate/uuid)
- [Soil plugin](https://roots.io/plugins/soil/)

## Installation

Install WordPlate by issuing the Composer `create-project` command in your terminal:

```bash
composer create-project wordplate/wordplate
```

## Plugins

[WordPress Packagist](https://wpackagist.org/) comes straight out of the box with WordPlate. It mirrors the WordPress [plugin](https://plugins.svn.wordpress.org/) and [theme](https://themes.svn.wordpress.org/) directories as a Composer repository.

### How do I use it?

1. Add the repository to your `composer.json` file.
1. Add the desired plugins and themes to your requirements using `wpackagist-plugin` or `wpackagist-theme` as the vendor name.
1. Run `composer update`.
1. Packages are installed to `public/plugins` or `public/themes`.

### Example
```json
"require": {
    "wordplate/framework": "^4.0",
    "wpackagist-plugin/polylang": "^1.0",
},
```

## Contributing

Please review our [contribution guidelines](https://github.com/wordplate/framework/blob/master/CONTRIBUTING.md) before submitting a pull request.

## License

WordPlate is licensed under [The MIT License (MIT)](LICENSE).
