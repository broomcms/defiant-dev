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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'defiantdevdb' );

/** MySQL database username */
define( 'DB_USER', 'defiantdevuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'secret' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql_defiantdev' );

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
define('AUTH_KEY',         'H)@g6u~ ,>3=i2T*$a/C|UjGf,^72-P-[({lGpd3`?MeFyKI+{r,ZkoUzT;~%WYj');
define('SECURE_AUTH_KEY',  'BID?s%/^31b.@X{m^Pr*yaN$Si8=9},dp=/r,xP$/}btJCC670!DJ+:)f6y>|?mu');
define('LOGGED_IN_KEY',    'M*Hm*UXn*6VNH>.qzA{#2Jv,npe.B9o{!*,}N;t9t^3Xn/Z;!W-ucQ`2l[nn}L?=');
define('NONCE_KEY',        'Qg]Kpj9)=uRt#cfxR~^W:+GU)GD.oH_zw_-$X+^%&WQp304iP{yW4&;XY<E--{o;');
define('AUTH_SALT',        '[vZos@l3eu`C6u-uJ9BsNw$;v1*P+GI8Z@522LguCEmfvG:!`!iP!~PsIIVS O9b');
define('SECURE_AUTH_SALT', 'TPh[U71Cg,D+rSXM7iawJAPuC.;~Ji=a~Vv&*lsL=*R!J1k`+.QcWL g e<LbCY9');
define('LOGGED_IN_SALT',   'HI?El+wpM_ug% tAn5I-|J{q>l_}+;Uh|,n-8uyH0relp9NP^ngC`-sx>oTNwia.');
define('NONCE_SALT',       ';4#MEuk8l1x|Hn~s;,))aPmH;$jyA}-F+~5hW[~ePTo6f5|l2rJa)?3Kep2z1U;Q');

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/** Add any custom values after this line. */



/** Custom values must be above this line. That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
