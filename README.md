# WordPress Starter with Docker.

1. copy .env-sample to .env
2. edit environment values
3. run ```docker-compose up -d``` or ```docker-compose up -d --build```


## phpunit - plugin
1. generate files `docker compose exec -it wordpress wp --allow-root scaffold plugin-tests my-plugin`
2. Install composer packages `docker compose exec -it wordpress composer install`
3. create test database: `wp_tests`
4. run phpunit: `docker compose exec -it wordpress ../vendor/bin/phpunit --configuration wp-content/plugins/my-plugin`

