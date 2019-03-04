<?php
/**
 * The base configuration for WordPress
 *
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

define('ENVIRONMENTS', serialize([
  'development' => 'http://corewp.lndo.site',
  'staging'     => 'http://corewp.lndo.site',
  'production'  => 'http://corewp.lndo.site',
]));

/** @var string Directory containing all of the site's files */
$root_dir = dirname(dirname(__DIR__));

/** @var string Document Root */
$webroot_dir = $root_dir . '/web/';

/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
    $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD']);
}

/**
 * Set up our global environment constant and load its config first
 * Default: production
 */
define('WP_ENV', env('WP_ENV') ?: 'production');

$env_config = __DIR__ . '/env/' . WP_ENV . '.php';

if (file_exists($env_config)) {
    require_once $env_config;
}

/**
 * Define site and home URLs
 */
// HTTP is still the default scheme for now.
$scheme = 'http';
// If we have detected that the end use is HTTPS, make sure we pass that
// through here, so <img> tags and the like don't generate mixed-mode
// content warnings.
if ( isset( $_SERVER['HTTPS'] ) && !empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) {
	$scheme = 'https';
}
$site_url = $scheme . '://' . $_SERVER['HTTP_HOST'] . '/';
define('WP_HOME', $site_url);
define('WP_SITEURL', $site_url . 'wp/');

/*
* Define wp-content directory outside of WordPress core directory
*/
define('CONTENT_DIR', 'app');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);



// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', env('DB_NAME'));

/** MySQL database username */
define('DB_USER', env('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', env('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', env('DB_HOST') ?: 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', env('DB_CHARSET') ?: 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', env('DB_COLLATE') ?: '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = env('DB_PREFIX') ?: 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', $webroot_dir . 'wp/');
}
