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
define( 'DB_NAME', 'mywordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'WhatIs@req515' );

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
define( 'AUTH_KEY',         ')inOnk-^g0M:+OZ]TPWa~<V)b<oC;0;owon]^Qx1sUt-A}C%TE ]~mIch}T>uheF' );
define( 'SECURE_AUTH_KEY',  'I6|Y.`K&9.( ~QQ)D!5Xo*$Rjp?whQ^-76%an5;>I1^dJS&*%HFQW#TCZa4r/Eyf' );
define( 'LOGGED_IN_KEY',    ']jb_. YNMu#}*zd6D!wj0aq(v=c%(o8@*Ml0A9_3*33JcG31XY0X%HVoe3=yvrSF' );
define( 'NONCE_KEY',        'j-so&p|VCvf2A3{I8/,KX;R<hAt{^sqcPNVy@Hom.:h;]:H*3O6Me2|s5riinN;t' );
define( 'AUTH_SALT',        'D)f6L2=6v.^xqk<:VmBw]bb0i_swRu]8JNrOHYhNNpY/B<d<3+-kV0YeDG([7R!Q' );
define( 'SECURE_AUTH_SALT', 'b~eN?VwG;1)v1!;_tzh,Vr}}-;iEj{T UD0H@{e.Yp=ibt-Chr<lri:LJ8gCB2jx' );
define( 'LOGGED_IN_SALT',   ']uG#[&>@=ff-fJJxs39V2C}khG4%ENmT@kYdl:t#ibmI7{3HY$v2<EOV%}8kSz3[' );
define( 'NONCE_SALT',       'VB3[u+:U@}R04Dl>zdV*[{w#.>+G(twyRbxzKC1.&1!G(P[%h-]W2!V8f[6^y!/u' );

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
