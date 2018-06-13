<?php

/**
 * Class WP_EXT_ShortCode
 * ------------------------------------------------------------------------------------------------------------------ */

class WP_EXT_ShortCode {

	/**
	 * Textdomain used for translation.
	 *
	 * @var string
	 * -------------------------------------------------------------------------------------------------------------- */

	protected $domain_ID;

	/**
	 * ShortCode ID.
	 *
	 * @var string
	 * -------------------------------------------------------------------------------------------------------------- */

	protected $code_ID;

	/**
	 * Constructor.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function __construct() {
		// Settings.
		$this->domain_ID = 'shortcode';

		// Languages.
		self::languages();

		// Initialize.
		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function run() {
	}

	/**
	 * Plugin: `languages`.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function languages() {
		load_plugin_textdomain(
			'wp-ext-' . $this->domain_ID,
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages/'
		);
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_ShortCode
 * ------------------------------------------------------------------------------------------------------------------ */

function WP_EXT_ShortCode() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_ShortCode;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 * ------------------------------------------------------------------------------------------------------------------ */

add_action( 'plugins_loaded', [ WP_EXT_ShortCode(), 'run' ] );
