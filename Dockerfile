FROM wordpress:6

RUN pecl install "xdebug" \
    && docker-php-ext-enable xdebug
