<?php
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
define('DB_NAME', 'wpenviro_db');

/** MySQL database username */
define('DB_USER', 'wpenviro_db_user');

/** MySQL database password */
define('DB_PASSWORD', 'MaidsKeenedSawingPole97');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '#Xa4O|wIphHmrDlSZs<LjvE2_A.#n-;;>3u?et>;#.U);x7Vdr~-Q1_9PsMy;4g>');
define('SECURE_AUTH_KEY',  'b>;Hr=mu,-ZT(P@h|;dhG>/B@*vDEA=W1bN~~d}Ta`_DGMox>-p|`ZyhAv<`)$8^');
define('LOGGED_IN_KEY',    'a}^/zMvb&J$C>oMfGzS28=M?f7~fbamapN[;a>n2b+O(+5QmP-mun7$?3o7T4o=:');
define('NONCE_KEY',        '(W$,K{@^+cYtSiv  &Ae@ebrP&e_KSN8@1M-Puw )/m=+$W;KX`~,9GTi|gcnRb5');
define('AUTH_SALT',        'hE&?tM5h`gzq}kDVxc!B|sG3KY!b KoJ9j8udsa1uJkb4ky%BNL[8a2{kHW9v^n|');
define('SECURE_AUTH_SALT', 'c&rN}o5}uT12XRj eGu5cB$~(7zuXbq6|+%a(~BjCiX5xu=I(|M:dtY9qqRG~f[u');
define('LOGGED_IN_SALT',   'LjoG0O8Yg9*|8%m(:hjjg^S;+FkqjrKD/|s1NMQNagVg#m(= F7DaPY FT,aFz$(');
define('NONCE_SALT',       'i@:e9` 9xkT8?*E^ZO[L5^!356I,5~WroU#` $^cIXCbktn8:=XGUPn-I6[sI]^L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'enviroinfo17_';

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

/** Custom stuff */

define('AUTOSAVE_INTERVAL', 300 ); 
define('WP_POST_REVISIONS', false );

define('WP_SITEURL','http://141.45.92.33/~wpenviro/cms/'); // ../cms
define('WP_HOME','http://141.45.92.33/~wpenviro/');
define ('WP_CONTENT_FOLDERNAME', 'content');
define ('WP_CONTENT_URL', WP_SITEURL . WP_CONTENT_FOLDERNAME);
define ('WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME) ;
define ('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');
define ('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
