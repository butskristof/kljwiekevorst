# start from recent PHP version with Apache
FROM php:7.1-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

# enable rewriting of URLs
RUN a2enmod rewrite
RUN service apache2 restart
