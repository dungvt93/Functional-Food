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
define('WP_HOME','http://bestfoodhealth.com');
define('WP_SITEURL','http://bestfoodhealth.com');
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'abc123');

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
define('AUTH_KEY',         ';v?),z:3K4{h @cPt!^W5Z[xy`0d&2,q?Fh(R[~`~P0+P=<LqRvnbRwsZ*+j6KJZ');
define('SECURE_AUTH_KEY',  'Hw(B]Bb|,<|Q*ty[$Kq%k}c?nZrcRww!ic-zh8nOujQTS^,%0#]~; )&UUoD)1(b');
define('LOGGED_IN_KEY',    'P>vr,^:vA6BV[ot0/K_1__b5I/Djj~HorP5^^p-+&R$6|6y`}HSuw*h}~g;.91x|');
define('NONCE_KEY',        '>kD@4QGVUH[V!s!GP|#=0JjXi_mkkT$O|e*S5.usqLIs-U8HmwpYS2;sLLMTM16h');
define('AUTH_SALT',        'r{Qw/W/pW6VV8N<:;A/QX[kd s3hHSFN]Rh@yW65_`S4AjQO`lPXoY?5lUGUrd4y');
define('SECURE_AUTH_SALT', 'LQ0(tf{a<Fl.6{kjY*O[jx~e(g{L&(<ul [!W;6RY.vl4j<^75QB5HdRrvn&OQo2');
define('LOGGED_IN_SALT',   'mIkv{:~[UeO ?zqIQ+zGXDTBQB7?U&NB-fo^v+A;B3ez~ ;6m47YnGC|>u4,(gFH');
define('NONCE_SALT',       '^Kbo#6LCFm.PzCSp[LO@}Kw0zC.a [J[3h-dZvF<.@B^8y?xacP!0iw|PRoPrFyX');

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
require_once(ABSPATH . 'wp-settings.php');
