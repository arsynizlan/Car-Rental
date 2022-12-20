FROM php:8.1-fpm
WORKDIR /var/www/html

# #MOD REWRITE
# RUN a2enmod rewrite

RUN apt-get update

# INSTALL USEFUL TOOLS
RUN apt-get -y install apt-utils nano wget dialog vim

#LIBRARY
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev 

#COMPOSER 
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#PHP EXTENSION
RUN docker-php-ext-install gettext intl gd
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql