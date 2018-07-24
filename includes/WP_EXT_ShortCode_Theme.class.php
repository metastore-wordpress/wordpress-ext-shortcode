<?php

/**
 * Class WP_EXT_ShortCode_Theme
 */
class WP_EXT_ShortCode_Theme extends WP_EXT_ShortCode {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 */
	public function run() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ], 92 );
	}

	/**
	 * Enqueue style.
	 */
	public function enqueue_style() {
		if ( ! is_admin() ) {
			wp_enqueue_style( 'ext-plugin-' . $this->domain_ID, plugins_url( 'themes/styles/theme.css', __DIR__ ), [], '' );
		}
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_ShortCode_Theme
 */
function WP_EXT_ShortCode_Theme() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_ShortCode_Theme;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 */
add_action( 'plugins_loaded', [ WP_EXT_ShortCode_Theme(), 'run' ] );
