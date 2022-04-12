<?php
/*
Plugin Name: Localization
Plugin URI: https://www.future-internet.com/
Version: 7.7.1
Author: Future Internet
Author URI: https://www.future-internet.com/
Text Domain: acf
Domain Path: /lang
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

define( 'POLYLANG_PRO', true );
define( 'POLYLANG_PRO_FILE', __FILE__ );
define( 'POLYLANG_PRO_DIR', __DIR__ );

if ( defined( 'POLYLANG_BASENAME' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	deactivate_plugins( POLYLANG_BASENAME );
} else {
	define( 'POLYLANG_BASENAME', plugin_basename( __FILE__ ) );
}

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/wpsyntex/polylang/polylang.php';

if ( empty( $_GET['deactivate-polylang'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
	add_action( 'pll_init', array( new PLL_Pro(), 'init' ), 0 );
}

