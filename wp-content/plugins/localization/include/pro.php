<?php


/**
 * A class to manage the Polylang Pro text domain and license key
 * and load all modules and integrations.
 *
 * @since 2.6
 */
class PLL_Pro {

	/**
	 * Constructor.
	 * Manages the compatibility with some plugins.
	 * It is loaded as soon as possible as we may need to act before other plugins are loaded.
	 *
	 * @since 2.6
	 */
	public function __construct() {
		require_once __DIR__ . '/../include/functions.php';
		foreach ( glob( POLYLANG_PRO_DIR . '/integrations/*/load.php', GLOB_NOSORT ) as $load_script ) {
			require_once $load_script; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
		}

		add_filter( 'pll_languages_list', array( 'PLL_Locale_Fallback', 'pll_languages_list' ) );
	}

	/**
	 * Manages the Polylang Pro translations and license key.
	 * Loads the modules.
	 *
	 * @since 2.8
	 *
	 * @param object $polylang Polylang object.
	 */
	public function init( &$polylang ) {
		if ( $polylang instanceof PLL_Admin_Base ) {
			load_plugin_textdomain( 'polylang-pro' );


			// Download Polylang language packs.
			add_filter( 'http_request_args', array( $this, 'http_request_args' ), 10, 2 ); // phpcs:ignore WordPressVIPMinimum.Hooks.RestrictedHooks.http_request_args
			add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'pre_set_site_transient_update_plugins' ) );
		}

		// Loads the modules.
		foreach ( glob( POLYLANG_PRO_DIR . '/modules/*/load.php', GLOB_NOSORT ) as $load_script ) {
			require_once $load_script; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
		}
	}

	/**
	 * Hack to download Polylang languages packs
	 *
	 * @since 1.9
	 *
	 * @param array  $args HTTP request args.
	 * @param string $url  The url of the request.
	 * @return array
	 */
	public function http_request_args( $args, $url ) {

		return $args;
	}

	/**
	 * Remove Polylang from the list of plugins to update if it is not installed
	 *
	 * @since 2.1.1
	 *
	 * @param array $value The value stored in the update_plugins site transient.
	 * @return array
	 */
	public function pre_set_site_transient_update_plugins( $value ) {

		return $value;
	}
}
