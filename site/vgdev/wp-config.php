<?php

// Configuration common to all environments
include_once __DIR__ . '/wp-config.common.php';

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bsabbott_vgdev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '49&HTO@>p-`{Su<z]}U1V9*O~#).rucmlHO6&tW Ho]}q>S3koYkr9k?#%$yFd*=');
define('SECURE_AUTH_KEY',  'Q0UA<E47u$i$]RR5+padT3P%AGKfC/>3OI;8CRxcHwntX>M0n{tdW: j1W0t.QJW');
define('LOGGED_IN_KEY',    'U,>><F$qAOMOWk7@$E=$l?V?Ni.NSp!SG!s#Ag(9m6e}k$4~F8T[5`!imXhE9KFg');
define('NONCE_KEY',        'Ls#y3QUs-sK(ajE3X6@Z}!/?p99]EzHF=z{D=.k?7+i!/Y$yb^uerfR5-}w_d1wv');
define('AUTH_SALT',        '9do|SdQ/ilH1M>wrEZpBE3g#x[|nI`YnK0RohfNH8En&`kUq=(_H[NNvm6,oZz(}');
define('SECURE_AUTH_SALT', ';URzkGf^T]Z@Cj^NJG{(A[4_>~L|}_ ok:)i=VT,YfH0;p%bD~Vn]460]3hBJ0O8');
define('LOGGED_IN_SALT',   'icZ<6Pz$JZO;7[xTp[>NvUa1nk^E053qbRZ #RuKi]r}qYJ|7lgPBM&h+Z~+?D83');
define('NONCE_SALT',       'dn_mls$)(LRugV,[F}F)E]wXlh:(W?ZV9a|ItQvaHGZ7AYO)GI,R2JiSvw5k%^:X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
define('WP_CACHE', true);
$currenthost = $_SERVER['HTTP_HOST'];
$mypos = strpos($currenthost, 'localhost');
if ($mypos === false) {
define('WP_HOME','http://xiledesigns.com/vgdev');
define('WP_SITEURL','http://xiledesigns.com/vgdev');
} else {
define('WP_HOME','http://localhost:8888');
define('WP_SITEURL','http://localhost:8888');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
