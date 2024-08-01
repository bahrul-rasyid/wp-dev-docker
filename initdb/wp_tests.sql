-- create database
CREATE DATABASE IF NOT EXISTS wp_tests;

-- create user
CREATE USER IF NOT EXISTS 'wp_tests'@'%' IDENTIFIED BY 'wp_tests';

-- grant privileges
GRANT ALL PRIVILEGES ON `wp\_tests`.* TO 'wp_tests'@'%';

-- flush privileges
FLUSH PRIVILEGES;

