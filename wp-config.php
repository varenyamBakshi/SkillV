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
define( 'DB_NAME', 'skillv_db' );

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
define( 'AUTH_KEY',         'wzlf,Br`y#|([#_&Q@DD6F=9-$cRyUqS)ZV&(ANb-&dn%Ua)E~H|CZk$d8JiJD.M' );
define( 'SECURE_AUTH_KEY',  '{Q6~3s0q+Dlnxbm-5S9` )MmH7e.{>VHeO)xk_gp*U83Cm<>s]bYEFYrG+1:Y=1g' );
define( 'LOGGED_IN_KEY',    '<9o?_XgN-d(K8kco$k% 4rPF]^Q`_>?g,^j8;0#BEd}}{iK^AQ|:Y>jK${-6e=yI' );
define( 'NONCE_KEY',        '`M)P<JG_4e,P E{.LLMYj`;vjc|(.GL_{K:#G=gYV6ZLkqQ7o1o 9jMF372n])NV' );
define( 'AUTH_SALT',        'M)KJplQvg5mfsD|@m,XJ#cpqbpk;P<U#Y4:%E:`.l[Qp2O6AETmIO&485Jh/^!?!' );
define( 'SECURE_AUTH_SALT', '@xBchyx=r_]Mw(mx[(m1B(i[nM(#zNb78#DUz{K$i9%8qO9Y$[}ndk!R <N/Y( q' );
define( 'LOGGED_IN_SALT',   'Z8h;x3H^;}NP]+<rNCTj4&d1v.%Z.C*90)![BmrVL5XGJU>60dS%$u$u `RV*mv&' );
define( 'NONCE_SALT',       'wg-#-<v2N2z.xp^bZ!F4?l=DM*{r)vA4Tw=V#_Ir.[*W`o3//qlAkx~*./ThuQ{|' );

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
