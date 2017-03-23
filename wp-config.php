<?php
define('FS_METHOD','direct');

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
define('DB_NAME', 'gsviec_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'phanbook');

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
define('AUTH_KEY',         'k8.X0>G^lX?Bc %P.16hI,Z|.~uxstQ3vXpRisxIK-Y:us}ul6/&oA<XP842+DZ4');
define('SECURE_AUTH_KEY',  '/i41MRFnq$:|h&q-ejEUgGShW38:Z{X*k6sVPyMt-?qeWWI1|:?/CmW`Ts?,x(|x');
define('LOGGED_IN_KEY',    'NP;2` a> DfsDN&d.nl#cJFe{w8F6-#-.45<&%4jU``K?l[qD>/!On 8WT::fp~0');
define('NONCE_KEY',        'ZbJP).P=>f7lZ;w5)&UuWltwz.vW:9le^|9<a25~)EVH7sCl5? =~PG?qf<.jc2{');
define('AUTH_SALT',        'omY>tG~^xrA}Q?gS*z2VP=1 A*@4dac$Ru?b@GF22/hCt@ CA&^r^#7M<)1S7|V{');
define('SECURE_AUTH_SALT', 'eBF:muUdZG3<!wj$?|SApUv5mv]d;P|vKg5n!3(A0sB|IX[1Ih1>Dt|m:3v;f^]6');
define('LOGGED_IN_SALT',   '2_H3dQ)(L/gO^9=~FD]zIc5!&0A>w!5.3C:- <Y/$.06?7+#acB=4S5^3EOpQbXS');
define('NONCE_SALT',       'fLbRB6a@1-V^rwZ3%lzSr**XE,5BQg9dmL?{TQAyW~aQtdCTFtJZLrgZ~33vvQ,1');

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

