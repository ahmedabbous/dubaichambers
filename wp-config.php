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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dubaichambers_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ' A:c=qb+hk}.Di/dyAFZgOtb$sbDb?@^p8Grj%3,>(95S>PxN|r1CNkB43G 1^{K' );
define( 'SECURE_AUTH_KEY',  'I;-x=HL-bU>[Oe2w0JI7DlmSubce7knn&^n,))~oBj`WuyAlM#RV+[+`YniDdD]<' );
define( 'LOGGED_IN_KEY',    '0GMfOvZ= 3ddCzG9ru>2S:~H?wVd0t}~5:Djap!~&Pkw;+QJ]mF?Pi&Nm%d;c`TZ' );
define( 'NONCE_KEY',        'Zb>y_p`ojy5NGu}:ZXgOa2/xb^E8`Pmk!sEI6h?}6.Mdx9<tTN/8c,-=VLtG/%~o' );
define( 'AUTH_SALT',        'Bx]~|Ql+pE1~&PW_j2MJX<7OqSBtE^UBfivRcsqL5#>w>D-ERmg*_ 5z1%[;r1 9' );
define( 'SECURE_AUTH_SALT', '|@kAO_fABa]JW`-jj?Mb38Dv6^OD2 XZ)r9kriypzSk G7c74T:GW8m]Q54zqpP.' );
define( 'LOGGED_IN_SALT',   'YK`ik-YM+sGV|7Sq?RQYWVf?ylP8)@k/LnEw@DT,(Qbbpdn=H!<}G((<BdAJ_<L`' );
define( 'NONCE_SALT',       'z>()*~5ECKc}+OMx%aA[L5Nm[Z(G3t{jkd EV5k(MUiT*a>P=-<M/-l`VH`u$&Lp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dcs_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
