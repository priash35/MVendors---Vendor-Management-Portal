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
define('DB_NAME', 'asmita');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '%F&Wd?7nGMpBrYp=G,rx%M-&<g6{)#KP8s*|+=<7Lj[p;P5Uz26deo{Tc+m(`[De');
define('SECURE_AUTH_KEY',  ':)m#=cu=Bf]0ri-x$Fb.:Cage52V)wtmE(V+JTff2wh5zYxzAS4KnRA@_c=*vCK9');
define('LOGGED_IN_KEY',    '|c{w)7%y]DP@O@fGuVrD-_SnJ|4xnF^Jy&ulAR+jaS[gh4*:,f/:M&R)>mM&2xVD');
define('NONCE_KEY',        '-i;ckF,qI>[gE_OEUar0FaV1PiP*T,N`l?nb%LT<3}T|Ym]H7=x/K6w b+)+o=V#');
define('AUTH_SALT',        'Rg^<S{9l?0gg~|96.S.:,T1YHp1#gUCu[SZr`-!c6y6gMVvI(^CUv`n;;mjl<wWt');
define('SECURE_AUTH_SALT', '8ct3xgmctkLS60z~$%+FnD~_,Ks)^r+Yu`ep!f[2*zSX0*^L7_r<|[`(f}Ds&@jE');
define('LOGGED_IN_SALT',   '3iFcw+B&|#Q6|KsRZCIZ2?}n[a.UlaD@GuI_v-+rl]!0<(]CCv?KM@][nJHYRN!Q');
define('NONCE_SALT',       ',>-$%7BhyNJn6(jymIUxZ;GQOFDJ0tUpV&q_X#d+86+Gk9z>U%5=ml;nvh*!=MG9');

define('FS_METHOD', 'direct');
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

