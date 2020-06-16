set -ex

apt-get update

apt-get install -y \
  libzip-dev

docker-php-ext-install -j$(nproc) \
  zip

pecl install xdebug \
  && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/xdebug.ini \
  && echo "xdebug.idekey=docker" >> /usr/local/etc/php/conf.d/xdebug.ini

pecl install redis && docker-php-ext-enable redis

a2enmod rewrite

apt-get clean
