FROM php:8.5-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite \
    && apt install openssl \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /var/www/tome
COPY src/ /var/www/tome
COPY apache.config /etc/apache2/sites-available/tome.lv.conf

RUN mkdir -p /var/www/tome/data \
    && chown -R www-data:www-data /var/www/html/data
#aterturris viridisturris
EXPOSE 80
EXPOSE 443

