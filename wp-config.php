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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'd4jd4ovkppo0ip' );

/** MySQL database username */
define( 'DB_USER', 'itpywhqtxntgdh' );

/** MySQL database password */
define( 'DB_PASSWORD', 'f89683b755677b6d49b2f3365d54d2d092c3d70bda7003a6afe3b84a2734a7e7' );

/** MySQL hostname */
define( 'DB_HOST', 'ec2-50-19-26-235.compute-1.amazonaws.com' );

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
define( 'AUTH_KEY',         'f00^Xk3+Dape)07$gMkr&7!3n+Z-m+Wlhl$0d1:vpv6D2&^xi)SrFzAwN@`$A(Pm' );
define( 'SECURE_AUTH_KEY',  '2j~1N^h&1ENG)Ew??KKAjDB.T]$ =h9fAJmyZY8saIEkTraA0WWRd=aJ>:+2bWX5' );
define( 'LOGGED_IN_KEY',    'U}%l@YKqKffc&a~PNz+yHIn#k1HHjiuQI6_&j62fHw*[3krq]P1g+Y@}n*C,P))[' );
define( 'NONCE_KEY',        '@UjdZ;`{(={MRuy_m6`j?f!F>@#%U[Q_$-S:k1Bs%KuH!a|H))QN##lwxM_jVxSu' );
define( 'AUTH_SALT',        'I;6)QfQ.HmGYo1oX10t6;vG?L%L8m+%i(CDbmYt+.0Hu5qD^q(;[cthbavT(e;;]' );
define( 'SECURE_AUTH_SALT', 'FZ35Xwe@}W}<hn&~^ehqSH|SOMX$n0fD,!W?GAIUYfvG VwA)V*Xg*0IJSRC/&$;' );
define( 'LOGGED_IN_SALT',   '(WaBT7B/n1IrKO{[v3?b:]^VFz]0#SS&>g6oc*AJ_Ob>Sp*ev7Ru&8Y:eY)|GI4<' );
define( 'NONCE_SALT',       '2eQ[;~ sS}WRWAnruMx$mOf4$HCs;H}>!wRdbe!U,s{VZv OhT]Sh{ySl_pau{sL' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
