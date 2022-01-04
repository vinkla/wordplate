ARG PHP_VERSION=7.4

FROM php:${PHP_VERSION}-apache-buster AS wordplate

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY docker/php/dev.ini /usr/local/etc/php/php.ini

RUN apt-get update -y && apt-get upgrade -y && chmod uga+x /usr/local/bin/install-php-extensions && sync && install-php-extensions xdebug mysqli
