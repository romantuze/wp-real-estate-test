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
define('DB_NAME', 'realestate');

/** MySQL database username */
define('DB_USER', 'realestate');

/** MySQL database password */
define('DB_PASSWORD', 'BTV7U2DxO31wtWrw');

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
define('AUTH_KEY',         '] *]J3qb|cV.s435ltS9JR@!r$uRdR1O^x*SWgT;@f/e1_7Z!G><H([N&y,vPzpN');
define('SECURE_AUTH_KEY',  'u9PDk8tC>_?e0Q2lB^ lNWi*&euC.&Xn^VGdm]C9F46G>`*-T,hf1[a4[2=+H %a');
define('LOGGED_IN_KEY',    'I)BAd_G de!HJsQ5*dnDIpKs<MfyDVRXI8foY}!Y!bzbR>Gpg5ldctbiiUG`#jp[');
define('NONCE_KEY',        ';i%3q-Jc`Nv:#TC9SF6x)/yZ6zfPu#aY=Q0%f4NWuEX]NI>9N1[l1G1sf{-CC{}v');
define('AUTH_SALT',        'nZ=8jKJ;vHl)>b9d:AS>u-/,X(:p5Hio-~[zAl,:I.hAy_w*tH^=@+RRH*Ru{J&$');
define('SECURE_AUTH_SALT', 'juqe>ec^$L-&]n:&yvOB7Yc=o<Q2v?Sq+J1f+Vppzun_B! B~r9KIp?a^A(2u/Ap');
define('LOGGED_IN_SALT',   'GUIbaNFoi(#;&Nxt_*7@iN$S :30Jdp%^6;aw~mo?tw*qp(FGYR~an6??U([a]Ql');
define('NONCE_SALT',       'IXCW/jEw!5Nw:f%|7A3IhU4Ww2o`}OG D`IfUb~~8E9Dh/yLE#;9YGDK[UTXuGp9');

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
