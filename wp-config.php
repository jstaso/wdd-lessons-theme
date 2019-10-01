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
define( 'DB_NAME', 'jstaso' );

/** MySQL database username */
define( 'DB_USER', 'jstaso' );

/** MySQL database password */
define( 'DB_PASSWORD', '1Xy3$%vg2AHr' );

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
define( 'AUTH_KEY',         '<HcBt~,$d,V)TI<j5!*3xeS@+5h,F zyRKt7!;ui14md/f`4UuSEs}0/RU4>$~q[' );
define( 'SECURE_AUTH_KEY',  'T*0IAab)K%){1*<=gbKB%52H^BU{SQ3`)2B(E_>NFF&`J}6P^z>_n/K4yC|A}u u' );
define( 'LOGGED_IN_KEY',    't_ u%w(X(sK^zoi+FGmqY0L|U90+hAPupMk.fE^DC>]#,z7F6HR}RU}3hdZu/6)x' );
define( 'NONCE_KEY',        '.kmOQ8RTWbUWp09Qt~/jL9I1P6eo=0/L+-hRx_-ur lxc)Mmya`xkk!{)O4,mTYs' );
define( 'AUTH_SALT',        '=--BU+P9>Y.vQu^W87$`dk5cB$AZ#>DE1vw!I Jn$VYXi& g|j1|>als1`xALWHm' );
define( 'SECURE_AUTH_SALT', '`5m<UanWG{<TW1%ZoU.reuSy|h[2jaA:!t}W]n}:C1.3TWcw[Af}yRwKvS=eOajo' );
define( 'LOGGED_IN_SALT',   ',>L?4*,S+7Ns60B:^z$/eUM~/O%SREe&6vy`0uv|s<Ba}7?q1:H-Qnml|6%f:4b_' );
define( 'NONCE_SALT',       '`^qWQ[|&/LRRwrwBy(3Ut2{Ua~EyivHI.9VrN;J/RRRDU<]#u-8}^!)V7KhA[#L*' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wdd_lessons_';

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


@ini_set( 'upload_max_size' , '20M' );
@ini_set( 'post_max_size', '13M');
@ini_set( 'memory_limit', '15M' );