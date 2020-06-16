FROM php:7.4.3-apache

COPY config/install-dependencies.sh /
RUN chmod +x /install-dependencies.sh && /install-dependencies.sh

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --allow-root

COPY config/host.conf /etc/apache2/sites-enabled/000-default.conf

ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 80

WORKDIR /app
