FROM php:7.0-apache

WORKDIR /var/www/beedoo

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libicu-dev \
    libxml2-dev \
    nano \
    wget \
    unzip \
    zip \
    git \
    libpq-dev && docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_mysql mysqli gd

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-configure zip --with-zlib-dir=/usr \
    && docker-php-ext-install zip

COPY entrypoint.sh /entrypoints/beedoo/entrypoint.sh
RUN chmod 777 /entrypoints/beedoo/entrypoint.sh
COPY 000-default.conf /etc/apache2/sites-enabled/000-default.conf

CMD ["chmod", "+x", "/entrypoints/beedoo/entrypoint.sh"]