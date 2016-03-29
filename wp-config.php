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
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DISABLE_CACHE', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w61Z(83Gq&*@1]`%,;^U;QJ7c.u~SpK(xm%Gx$i~Cpyv{8|y-(m3Ig.Y]NrOeo~j');
define('SECURE_AUTH_KEY',  '{v^!v7}hdo_bLX^8%O&2LL#!>.l|O-hib.XpxP5o`X{fVHNEYne3v^B& ]zcJKV/');
define('LOGGED_IN_KEY',    'g!*FOq %`Un:VTtX:?_FM7Nn2Z-8QdB+-nl+xLsK-it8tE|`I0h@hl|$wSf{E5g>');
define('NONCE_KEY',        '~Rw8asOA54gLbk^NK;^&UJj1rE`qM`|vm0-Fj$LNO+agJZ]NjEX`-r%]=C<joi~j');
define('AUTH_SALT',        '@I-ul}X,7iKe89<eDF^H%qTs2- o4n&tOBVOSukdv)!Y+ZR[i#UJ#)?9w(G4Hm+K');
define('SECURE_AUTH_SALT', 'qf%=EeevB09px=w&tX>rH|q9/R;K@B(zU%-G#)H~=*yof,%qQ~9L?JRVoB5XvdH[');
define('LOGGED_IN_SALT',   'n3X <H=Lj}.[Ju9D+)|AiK}[-LcEMh(PE|CZGQWW=@;8hOmVU[h5y$*KIJ-b[e|X');
define('NONCE_SALT',       'Wc8/kvXErkLb+egv<crStH%Wa +#Nf&PqFz^*+> z[c]~(%:Tv3Hp5tp3QME>zD8');

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
