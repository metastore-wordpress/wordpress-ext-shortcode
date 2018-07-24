<?php

/**
 * Class WP_EXT_ShortCode_CodeAddress
 */
class WP_EXT_ShortCode_CodeAddress extends WP_EXT_ShortCode {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();

		// Settings.
		$this->code_ID = 'address';

		// Initialize.
		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 */
	public function run() {
		add_shortcode( $this->code_ID, [ $this, 'shortcode' ] );
	}

	/**
	 * ShortCode.
	 */
	public function shortcode( $atts, $content = null ) {

		/**
		 * Options.
		 */
		$defaults = [
			'location' => '',
		];

		$atts = shortcode_atts( $defaults, $atts, $this->code_ID );

		/**
		 * Rendering data.
		 */
		$location = ( $atts['location'] ) ? $atts['location'] . '' : '';
		$address  = esc_html( $location );
		$url      = '<a href="' . esc_url( 'https://www.google.ru/maps/place/' . $address ) . '" target="_blank" rel="nofollow"><i class="fas fa-map-marker-alt"></i><span>' . $address . '</span></a>';

		$out = '<span class="wp-ext-' . $this->domain_ID . ' wp-ext-' . $this->domain_ID . '-' . $this->code_ID . '">' . $url . '</span>';

		return $out;
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_ShortCode_CodeAddress
 */
function WP_EXT_ShortCode_CodeAddress() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_ShortCode_CodeAddress;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 */
add_action( 'plugins_loaded', [ WP_EXT_ShortCode_CodeAddress(), 'run' ] );
