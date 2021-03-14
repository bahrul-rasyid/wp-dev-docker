FROM wordpress:latest

ENV XDEBUG_PORT 9003
ENV XDEBUG_IDEKEY VSCODE

RUN pecl install "xdebug" \
    && docker-php-ext-enable xdebug

RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.client_port=${XDEBUG_PORT}" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.idekey=${XDEBUG_IDEKEY}" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "display_errors=1" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "html_errors=1" >> /usr/local/etc/php/conf.d/xdebug.ini
