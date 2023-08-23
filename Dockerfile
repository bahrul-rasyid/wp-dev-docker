FROM wordpress:6.3

RUN pecl install "xdebug" \
    && docker-php-ext-enable xdebug
