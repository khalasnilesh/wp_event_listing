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
define( 'DB_NAME', 'seat' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':Eq2:pNSrHd.p0Oi~8~A~W`8ue#4&9m?%hz`NY- s+rn0Z]$ENg.{&ss7lNyuu?%' );
define( 'SECURE_AUTH_KEY',  'ySvc&`?Ue0h?za?+~F[0r48Q<0vdde`t/);_i?;%t3HVh=jJS$pO@PeH>ev3gyxd' );
define( 'LOGGED_IN_KEY',    'T>]K-KbHC?{ |)Q+Lwkm9s.3O?_2KM8z;yy>^hKxn4}}7jnR(YzKj,R~H^{@O*Bk' );
define( 'NONCE_KEY',        'ZJg$zQb=gmrrH|dC--^l0ytyKjDKS@T|x_Rq8i~U<itlaWjoryT4e0/3>l9`)GYV' );
define( 'AUTH_SALT',        'f<&`5EQtIegv: /@efD:kdR7T2yP6r2j0+/!X?>N.B^L:#Tm5aT>_~fn1njTjP7Y' );
define( 'SECURE_AUTH_SALT', 'i}DX+?YxvB7dXkFh@jXhes4PTn1K4M`PFTxVU%pQAv]Q:w]2;F/=++>@:Z|fi.gP' );
define( 'LOGGED_IN_SALT',   'tlY0D<6e}+vy[Vx~ E#P,rCBYjFL[|~O<jwe(wj{r]W{!-T{JX?b.<|gma[Zv6n_' );
define( 'NONCE_SALT',       '-o$tlW?Q-zzPh;+Bf|0_TEB.q8ir/FH~HkbIBCj6fwVX-iR)gDQ!jc_,9m*<n[eE' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
