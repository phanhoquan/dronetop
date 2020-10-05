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
define( 'DB_NAME', 'dronetop' );

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
define( 'AUTH_KEY',         'DR}X&;-tD1dD5xo:<exQ~&7No&LLFeGqaX^hp3N%1|LS][3{0#?)I_,TTs/-.O8.' );
define( 'SECURE_AUTH_KEY',  '&4FAKieoNdQ7B&l<?}=GH$y{`+&ru6)kA+K3#oH^uS#H/ru=8_!u}osZ1}EX>d<u' );
define( 'LOGGED_IN_KEY',    'w(kHV/jZA<^BgW~Qq1q5u%:M;dRy/m2]yBcETW,v]5bfsmEAFM^qoj&:.Q?Hh]fR' );
define( 'NONCE_KEY',        't/rT4X8W+mjyT6):HikOtu@/_8.WO.M<Jha:5RHwu: #K>!Ft)&S1LjWg,Fy<56=' );
define( 'AUTH_SALT',        'pp724~L5Bk/O$lOYt1~]h}S.L:h[cNN|AkpAv`sQONW.nfoe3^q/CcY|eUcX|+z*' );
define( 'SECURE_AUTH_SALT', 'pm Gj:!TVjG!{9Me,LZl$*6<u=w_fZn;mIkU&)t48^]^D<9$6yHC<$&2UEwGYOb6' );
define( 'LOGGED_IN_SALT',   '3_mhJnCkeNI_1HGagg(`Gxiq`~n@<$/<Ldk!8;&Kg4V`M[>}[]ZvaqwXp^9*xe7 ' );
define( 'NONCE_SALT',       'oIbqmHh>mY>I]G^yULuXT@FJpMTNsj#`g)V8~GDx07z~&!PR3ljhUGtJK.zm#4 T' );

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
