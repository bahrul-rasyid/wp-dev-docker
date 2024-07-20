FROM wordpress:6.6.0

RUN pecl install "xdebug" \
    && docker-php-ext-enable xdebug

# composer
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# copy composer.json
COPY composer.json /var/www/composer.json
COPY composer.lock /var/www/composer.lock

# install wp cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
&& chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

