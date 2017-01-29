Update the docs
# Please enter the commit message for your changes. Lines starting
# with '#' will be ignored, and an empty message aborts the commit.
# On branch mix
# Your branch is up-to-date with 'origin/mix'.
#
# Changes to be committed:
#	modified:   README.md
#
# ------------------------ >8 ------------------------
# Do not touch the line above.
# Everything below will be removed.
diff --git a/README.md b/README.md
index c37228e..59d0cd5 100644
--- a/README.md
+++ b/README.md
@@ -22,7 +22,7 @@ composer create-project wordplate/wordplate
 - [Configuration](#configuration)
 - [Theming](#theming)
 - [Plugins](#plugins)
-- [Gulp](#gulp)
+- [Webpack](#webpack)
 - [Mail](#mail)
 - [Multisite](#multisite)
 - [Post Types](#post-types)
@@ -103,6 +103,7 @@ composer require wpackagist-plugin/wp-migrate-db
 Packages are installed to `public/plugins` or `public/themes`.
 
 #### Example
+
 This is an example of how your `composer.json` file might look like.
 
 ```json
@@ -114,55 +115,11 @@ This is an example of how your `composer.json` file might look like.
 
 Please visit [WordPress Packagist](https://wpackagist.org/) website for more information and examples.
 
-## Gulp
+## Webpack
 
-WordPlate has integrated [Elixir](https://laravel.com/docs/5.3/elixir). It provides a clean, fluent API for defining basic Gulp tasks for your WordPlate application.
+WordPlate has integrated [Laravel Mix](https://github.com/JeffreyWay/laravel-mix#readme). It provides a clean, fluent API for defining basic Webpack build steps for your WordPlate application.
 
-#### Installation
-
-Before triggering Elixir, you must first ensure that [Node.js](https://nodejs.org/en/) is installed on your machine.
-
-```sh
-node -v
-```
-
-If you don't have Node on your machine you can install it by visiting their [download page](https://nodejs.org/download/).
-
-Within a fresh installation of WordPlate, you'll find a `package.json` file in the root. Think of this like your `composer.json` file, except it defines Node dependencies instead of PHP. You may install the dependencies it references by running:
-
-```sh
-npm install
-```
-
-If you are developing on a Windows system or you are running your VM on a Windows host system, you may need to run the `npm install` command with the `--no-bin-links` switch enabled:
-
-```sh
-npm install --no-bin-links
-```
-
-#### Usage
-
-To use Elixir and Gulp, please run one of the following commands:
-
-##### Development
-
-This script is for development. This script will first run all the Gulp tasks and then keep listening for changes you make in your asset files.
-
-```sh
-npm run dev
-```
-
-This script will automagically start a [BrowserSync](https://www.browsersync.io/) proxy. For more information about getting started with BrowserSync, please visit the [Elixir documentation](https://laravel.com/docs/5.3/elixir#browser-sync).
-
-##### Production
-
-Then there is a script you should run before publishing your application. This script will compile all your asset files and revision them for [cache busting](https://laravel.com/docs/5.3/elixir#versioning-and-cache-busting).
-
-```sh
-npm run prod
-```
-
-For more information about Elixir please visit the [official document page](https://laravel.com/docs/5.3/elixir).
+[Read more about how to install and use Laravel Mix in the official documentation.](https://github.com/JeffreyWay/laravel-mix/tree/master/docs#readme)
 
 ## Mail
 
