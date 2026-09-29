FROM php:8.5-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite \
    && apt install openssl \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /var/www/tome 

COPY src/ /var/www/tome
COPY apache.config /etc/apache2/sites-available/tome.lv.conf
COPY php.ini /usr/local/etc/php/php.ini
COPY container_setup.sh /container_setup.sh

RUN mkdir -p /var/www/tome/data
RUN chown -R www-data:www-data /var/www/tome/data
RUN chown -R www-data:www-data /var/www/tome \
    && chmod -R 770 /var/www/tome \
    && a2ensite tome.lv

RUN mkdir -p /database \
    && chown -R www-data:www-data /database \
    && chmod -R 770 /database \
    && chown -R www-data:www-data /container_setup.sh \
    && chmod -R 770 /container_setup.sh

EXPOSE 80
EXPOSE 443

ENTRYPOINT ["/container_setup.sh"]
#aterturris viridisturris
