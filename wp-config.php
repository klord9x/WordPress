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
define('DB_NAME', 'project_wph2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123');

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
define('AUTH_KEY',         'Vhz(T]5byX`,vUn.iU@7Dx]!M:L>c;6Zrq%RmRnV7/8u YQ:#*Osw[s*e-sZ7Z#x');
define('SECURE_AUTH_KEY',  '9x3,jCh9e_%J=Ca>}*[du;.$<&Ukg8G^j.R(QR7g:b`YV*(@-Q|J>Gf%]!!Gc$C6');
define('LOGGED_IN_KEY',    '7/*7xGxwqWJd6MdELn:|;Xl>^t<amx ~*gcoPx)-Mh6i:^?P/DbqBSvDWGGC4 ]K');
define('NONCE_KEY',        'wc.S}n/xruc,F{(G<lo$qpH;@noV=Z|C _6Dw R$5{X2%qJoZ#W$/%D<8q,6:P/m');
define('AUTH_SALT',        '=UBT*X~NPju[=)uc}^!_6cc;?`e7gC;/eZj3R0zZ{~%Ey_B|Kxh&*+`u,Mh0Rr.K');
define('SECURE_AUTH_SALT', 'HNA}Bd=9d(x]%d0RWz#yT&tUr[O,@/adO)wMCky3.:*8xx}Sad-3iyeu[Ps8L?G7');
define('LOGGED_IN_SALT',   'cs2eOc[{HL3qf7a%F ezd.5.=0X4^nCrjJ`I27Q-7]XciznSFAP..2_),XG1B^Z3');
define('NONCE_SALT',       'y$cS%_8JpX_,1mK*dlKQ=*g_FMh%A; pkd_^#DlgnC{QfzJM 0meF]1l-}Eue-<w');

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
