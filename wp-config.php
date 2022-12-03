<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the web site, you can copy this file to "wp-config.php"

 * and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * Database settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', '94f37668d99c706d7022243f2668cb403486a670fd7f96f79f8f30b3058bbb1d' );


/** Database hostname */

define( 'DB_HOST', '127.0.0.1:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication unique keys and salts.

 *

 * Change these to different unique phrases! You can generate these using

 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.

 *

 * You can change these at any point in time to invalidate all existing cookies.

 * This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         'ckWHNY>u!n#E%}.P& tk|hJ|^nyuyNJb5nPv,AxUcw$!4lQ;,;{zIW_|_,F=]*`P' );

define( 'SECURE_AUTH_KEY',  '6$|5-~7m*1,psc9s)|.-+[HN7&Z2MV]bZOno5]H?1.)x4p*lKM^Gwt_X4C5MYlNc' );

define( 'LOGGED_IN_KEY',    'G9X*.AQq8 Pe?@`u^5bI zac_[p,MV(59]>DsAuK8R*C=y?dW{$c;i%+x+nhm~@V' );

define( 'NONCE_KEY',        ';;Cy>?XI6Y|#>E|:>$Q5xwG1aYT+/Ga<v9K72b=R<R1:yV/0[0UWP:*=Xf$VSE[d' );

define( 'AUTH_SALT',        '$d(x@x%np@~[R|+|.8274YHt[:B3=i,HUeFg,|Csm1vg,,Yi&X!qPKnO$;x*KF{E' );

define( 'SECURE_AUTH_SALT', ']s2A.6_/z,?bL=8kdX>)bJMFZ$no26Qx#vx=^RgpMJI Tw[%Zu 2vR=b],m09)W#' );

define( 'LOGGED_IN_SALT',   '|)f(F/$lPA{]fGH5AYW[8h@:(G,&pp79^_(~+xj#uX7uJF00i cO73i#RDPCu0$>' );

define( 'NONCE_SALT',       'o/`K5lEw,v3JCCn0oN03fNUxWm*_@Do7e`}nWT4V`4z^AY/wfhxe:VV>#meo+QFt' );


/**#@-*/


/**

 * WordPress database table prefix.

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


/* Add any custom values between this line and the "stop editing" line. */




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
