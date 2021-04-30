FROM php:8.0-fpm

# Install system dependencies
RUN apt-get update
RUN apt-get install -y git
RUN apt-get install unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:1.10.20 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

COPY ./src .
