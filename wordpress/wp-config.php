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
define('DB_NAME', 'trans');

/** MySQL database username */
define('DB_USER', 'shariq');

/** MySQL database password */
define('DB_PASSWORD', 'shariq786');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define( 'WP_MEMORY_LIMIT', '256M' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n;8W_OCIq;.[jKWK}9)Fj#vC~npRD-GO}Jqg%T68La31.!q/ZPWeZ{*TK{5ZR/7`');
define('SECURE_AUTH_KEY',  ':Wc2f-qt]Nr3XosSR_DA 7mz7@Wmut##9.~|iid6 H$3~m1kD9KV6E@/]6Ippj7c');
define('LOGGED_IN_KEY',    '*#L]*a31FIO_;wf*Kg01WKjy&$c=]]gSK A{V]X~{s1m=$LP=(.3rTk5gH?Wr3cq');
define('NONCE_KEY',        '97maY!&q/5&^r4w@^<s,b7ZOp#bdT_n=^fAnoVs{`wb$8@tuxv]=`A#^h0fEYxi<');
define('AUTH_SALT',        '&#fV!p[k-8luHe!ZvEOK6[|@{i/h. 6k<]j0@0;==V6.,J|E>bJ-;-I3jOT!-~.P');
define('SECURE_AUTH_SALT', '^dd=92^]~TQO|# {#4zTa3;Vy`qkn1,Xf n]:kURJ%-xT,UY; m-V*K<f*F J#^3');
define('LOGGED_IN_SALT',   'WWXxbw,&evY/#p>zq`O|dykF;_@juph_TT;+i8l,%*]C<m]3$5nowB1;r`{l!]JN');
define('NONCE_SALT',       '[$F8^<H#BDj2N%G^DhtryJ%O*Gi7!f1qX?<xUIaVA%<+FXf+O>(`TMml.E(=|Y?c');

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
