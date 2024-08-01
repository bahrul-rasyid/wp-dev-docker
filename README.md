# WordPress Starter with Docker.

1. copy .env-sample to .env
2. edit environment values
3. run ```docker-compose up -d``` or ```docker-compose up -d --build```
4. Install composer packages `docker compose exec wordpress composer install`


## phpunit - plugin
1. generate files `docker compose exec wordpress wp --allow-root scaffold plugin-tests my-plugin`
2. run phpunit: `docker compose exec wordpress ../vendor/bin/phpunit --configuration wp-content/plugins/my-plugin`
2. run phpunit: `docker compose exec wordpress ../vendor/bin/phpcs wp-content/plugins/my-plugin`

