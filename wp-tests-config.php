<?php

// a helper function to lookup "env_FILE", "env", then fallback
if ( ! function_exists( 'getenv_docker' ) ) {
	// https://github.com/docker-library/wordpress/issues/588 (WP-CLI will load this file 2x)
	function getenv_docker( $env, $default ) {
		if ( $fileEnv = getenv( $env . '_FILE' ) ) { // phpcs:ignore
			return rtrim( file_get_contents( $fileEnv ), "\r\n" );  // phpcs:ignore
		} elseif ( ( $val = getenv( $env ) ) !== false ) {  // phpcs:ignore
			return $val;
		} else {
			return $default;
		}
	}
}

/* Path to the WordPress codebase you'd like to test. Add a forward slash in the end. */
define( 'ABSPATH', __DIR__ . '/html/' );

/*
 * Path to the theme to test with.
 *
 * The 'default' theme is symlinked from test/phpunit/data/themedir1/default into
 * the themes directory of the WordPress installation defined above.
 */
define( 'WP_DEFAULT_THEME', 'default' );

// Test with multisite enabled.
// Alternatively, use the tests/phpunit/multisite.xml configuration file.
// define( 'WP_TESTS_MULTISITE', true );

// Force known bugs to be run.
// Tests with an associated Trac ticket that is still open are normally skipped.
// define( 'WP_TESTS_FORCE_KNOWN_BUGS', true );

// Test with WordPress debug mode (default).
define( 'WP_DEBUG', true );

// ** MySQL settings ** //

// This configuration file will be used by the copy of WordPress being tested.
// wordpress/wp-config.php will be ignored.

// WARNING WARNING WARNING!
// These tests will DROP ALL TABLES in the database with the prefix named below.
// DO NOT use a production database or one that is shared with something else.

define( 'DB_NAME', getenv_docker( 'WORDPRESS_TESTS_DB_NAME', 'wp_tests' ) );
define( 'DB_USER', getenv_docker( 'WORDPRESS_TESTS_DB_USER', 'root' ) );
define( 'DB_PASSWORD', getenv_docker( 'WORDPRESS_TESTS_DB_PASSWORD', 'root' ) );
define( 'DB_HOST', getenv_docker( 'WORDPRESS_TESTS_DB_HOST', 'mysql' ) );
define( 'DB_CHARSET', getenv_docker( 'WORDPRESS_TESTS_DB_CHARSET', 'utf8' ) );
define( 'DB_COLLATE', getenv_docker( 'WORDPRESS_TESTS_DB_COLLATE', '' ) );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 */
define( 'AUTH_KEY', getenv_docker( 'WORDPRESS_TESTS_AUTH_KEY', '3c19062ee44a1be50314a5b9cac844b540c10aa2' ) );
define( 'SECURE_AUTH_KEY', getenv_docker( 'WORDPRESS_TESTS_SECURE_AUTH_KEY', '5573ea40bed386b9e15c7b7d016b00e8d9bade8b' ) );
define( 'LOGGED_IN_KEY', getenv_docker( 'WORDPRESS_TESTS_LOGGED_IN_KEY', 'e99087e38eff7c8982577466bf2924c8c288bd65' ) );
define( 'NONCE_KEY', getenv_docker( 'WORDPRESS_TESTS_NONCE_KEY', 'e119d82d1d964f04ee01a83c61cd13e9039ab110' ) );
define( 'AUTH_SALT', getenv_docker( 'WORDPRESS_TESTS_AUTH_SALT', '7c95cb5ea9573b9ffb1e9f4ab63cb317f17a9ff6' ) );
define( 'SECURE_AUTH_SALT', getenv_docker( 'WORDPRESS_TESTS_SECURE_AUTH_SALT', 'd545e14050ccab40ca4c6d4d0faf9d4a63772e10' ) );
define( 'LOGGED_IN_SALT', getenv_docker( 'WORDPRESS_TESTS_LOGGED_IN_SALT', '2e3d39cd9dab102a864994096b082c4e632b7b8a' ) );
define( 'NONCE_SALT', getenv_docker( 'WORDPRESS_TESTS_NONCE_SALT', '6c11c1f4be590cb065c76881c957dd93b01b9008' ) );

$table_prefix = getenv_docker( 'WORDPRESS_TESTS_TABLE_PREFIX', 'wptests_' );

define( 'WP_TESTS_DOMAIN', 'localhost' );
define( 'WP_TESTS_EMAIL', 'admin@localhost.org' );
define( 'WP_TESTS_TITLE', 'Test Blog' );

define( 'WP_PHP_BINARY', 'php' );

define( 'WPLANG', '' );
