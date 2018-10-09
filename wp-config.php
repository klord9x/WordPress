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
define('DB_NAME', 'liftify');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'mysql');

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
define('AUTH_KEY',         'z$m3txh!9NSZ]N)=8Bh:RSq`s?$~Y#7)V NOj`K)fZF^<PHe@ND&?iZO,Dw`o 5U');
define('SECURE_AUTH_KEY',  'sF:x{`XV)TCf#R9wf6dC+5L=!4E<Oi9G*htRPxQ?PZf_=Kl8^`ZU:eC4}S2f^O0N');
define('LOGGED_IN_KEY',    '?VuaDJDk&^~T/N9#L/emf]Z]=w9Ln)]vBA(xTt_0h1.9]g_Gk,j/UeFxk7iv?r~3');
define('NONCE_KEY',        'Y9}w2y g$#M/ma2_<@B5d[/3E8@l4EzlX&-DW~qK>==FIl.mm?fE9[:x[<}:Y4Z!');
define('AUTH_SALT',        'U>aHCX]]TG|]+]l;l2=UhHXrjMT.u3C96*Qj}fjvEw%eVEI8zZ|YklENz6E-t0}:');
define('SECURE_AUTH_SALT', 'dQZAnQTnl4n%G,2J1R6J[$T+8SrIcmNDStJt :]negd|y8?D+eb[-ScEdb@qo-<@');
define('LOGGED_IN_SALT',   'ZrVNj1Pjt 2;k: (si wZ>HzcWXm;-dP7AkKgq(xHVcU>TqcuO^A)2d[0xy.4%-k');
define('NONCE_SALT',       'Q: Pb$HxtI0fhGct,1c^_N>zQKi,?f(xc5as&%c ANR9?U5`-c<G#ZXp[V`Gr1Md');

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
