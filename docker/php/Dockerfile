FROM php:7.2-apache

RUN apt-get update
RUN apt-get install -y --no-install-recommends vim less git libcurl3-dev zlib1g-dev unzip

RUN docker-php-ext-install curl zip

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
