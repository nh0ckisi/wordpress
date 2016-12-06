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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'G*uIR{&bWopHU}k#eUg|c *buo_/,X]|d+8VoYd>A&v8:&t+yf<84:HKQI_tlPV=');
define('SECURE_AUTH_KEY',  'tB-fZG1hzx`)5{g0Nw%E6|}9AnTS^2~Gp.h<Ti#.IsP5W` G=/`> ONp|[P_CE5a');
define('LOGGED_IN_KEY',    'AF/T^G0cssRAz/P^u1M6z$>|-{@!SLPo6]9=eqJeUz1g*alv.z~Wx]iK$YU`0Wsn');
define('NONCE_KEY',        'aKC-^M0$4FR2[.Y9h+Vn/|%y:t&vQLsulubvMjz!P5~m[s8m&4.CIF<n&;e?[4~^');
define('AUTH_SALT',        '2Pn5JS20G{!8fhD}6<Nqj?S}TS6BB}?F+kS)>B!&3f7J@aFxP]Pwl/ _Ig,ZqmTJ');
define('SECURE_AUTH_SALT', 'AM^sA qW  TU+?lJmv(:zF!1BBfjj#m-N,,_Mbys|yO2ahWP1#{7@;QS$q:UsU30');
define('LOGGED_IN_SALT',   'zE,?8:8DAt`^(e_43!bm}^c@M-Xz~v{^>#4Z{x|0LE>yzWq5t^J>`W:@^9?5cY}>');
define('NONCE_SALT',       'Whb`!p*+bXUjUGv}?W$^~.&>.Oi/aCHp50$OogMzx|t|2*Iub)rBrZBD1%(.cVD<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_123456';

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
