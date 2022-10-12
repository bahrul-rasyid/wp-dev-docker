#! /bin/sh

CONTAINER=wp_newsite_mysql
DB_NAME=wp_site

docker exec -i $CONTAINER mysql -u root --password=root $DB_NAME < ../wp_site.sql
