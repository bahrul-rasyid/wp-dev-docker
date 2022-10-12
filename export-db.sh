#! /bin/sh

CONTAINER=wp_newsite_mysql
DB_NAME=wp_site

docker exec $CONTAINER mysqldump -u root --password=root $DB_NAME > ../wp_site.sql
