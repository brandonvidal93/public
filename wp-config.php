<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'N;4GJX-e5zp@/Jm38~^IpWGKMTA}S7EW<5p0Ct`Z8|dc++ FRRx+(g*0[LrWRy]f' );
define( 'SECURE_AUTH_KEY',   '].K9UDcg@vh+=[Y*WIZA^$45^kb{.y}zi`A{>4%qd]=-j i7ntc[X~e~q6O:z43%' );
define( 'LOGGED_IN_KEY',     'ycrst1S7jVcGXeO;!dYBoxf0[?X/JGNjIXxM808vq}31vFW3J:i&oR[*H4hr3s.R' );
define( 'NONCE_KEY',         'HID+_e!#XPn<2pJ4%fRO4.dfLY(3k>D8a,KE^1]-lE?9K$G2&BqJHJ!v`V$_D(c~' );
define( 'AUTH_SALT',         '29W%KfpA.O#p$+AnyT-Hc[g/t^ofOCy2g(|Z$7RKx9co74%LCWARm-n%P%SE902`' );
define( 'SECURE_AUTH_SALT',  'lPM<sJL`;P#6O@Md|{#Wa|gqv^f97a?Z:3.Jn$f+oy!Y6G*%-7z:4]=KP}>>.#{=' );
define( 'LOGGED_IN_SALT',    'Dc<=hyB[-kT#fP>dP#n]Ph5!H)l0i`K=Z4|kewN_bYZ6duWX ~nv<^O$T88f@mtn' );
define( 'NONCE_SALT',        'CpRbOZ-^;9i:@}_Mks:4A8$!skJ3/x;icVO@~~uzrC&U| VFzGvn6.3Ei,)!IN5M' );
define( 'WP_CACHE_KEY_SALT', 'WGc(xP@UDA)(rt- nu!3[K-aa[|{SR5x[+7gL#l#+lY)1lrF*RcLUa?!OVyw]dI{' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
