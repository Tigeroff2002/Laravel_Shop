FROM php:8-apache

RUN apt-get update && apt-get install -y 

RUN a2enmod rewrite

RUN apt-get install -y libpq-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql

USER root

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /var/www/html/public

COPY default.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80