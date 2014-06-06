<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'micorazon');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'r6Pk1b^9');

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
define('AUTH_KEY',         'F8r+_k%h>m4S-(diulRy~wi=ff1vf.c+!37|S*qQXRa*1x:xg+(8o5-Q5n>4=7;#');
define('SECURE_AUTH_KEY',  'BK/}Y7eqbhx AQ5|7dDi=o:VoKH)U3-iLH_-%NhUf!60h(R0k-*4*-<Vlj6[WmYx');
define('LOGGED_IN_KEY',    'V*3)4G>=m]%AFo|YIC(*8NzqsI[2b m(1CvYIVbUTMRp9R-J_}KMSr}_+/  O$I<');
define('NONCE_KEY',        '|`b-d&x0%cjNy]JjRBa6k+m$eA*dTi9,2sXTYx06ES*F|u%e).x@u#Q(_Yd.Xqa>');
define('AUTH_SALT',        'T -;i-C.N.U>.&xPILpM9)*z,*)}?Y/=_~Aw`/Fe!uiadVx8mZ0jE<ToCqeu:9>+');
define('SECURE_AUTH_SALT', 'uYF6T7|z>_ZF:2Re$yluhSFn4X-8x`F$Tquz%B,/DJ><l|NZq_),rS-&d1z%~66A');
define('LOGGED_IN_SALT',   '/-P)Q%cL;R|-j^3cP~E/^GOAliSUr%@Yup]_vwCi}&AHJn+OZ> ze.|0/bejy0h ');
define('NONCE_SALT',       '1:$)j+r<}%]p]~-R]QkfStj~!*1R0Dlqt3H_Z@f=?*A[n`}Yv3T]d|oFqY3c):6n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
