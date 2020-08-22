FROM php:7.4-fpm as base

RUN apt update && apt install -y \
    curl \
    git \
    libzip-dev zlib1g-dev libicu-dev libicu-dev \
    unzip \
    && apt clean

# Install composer - we need it on local machine...
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer global require hirak/prestissimo --no-progress

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql opcache \
    && docker-php-ext-enable intl opcache

RUN printf "short_open_tag=0 \n" > /usr/local/etc/php/conf.d/symfony.ini
