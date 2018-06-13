<?php

/**
 * Class WP_EXT_ShortCode_CodeEmail
 * ------------------------------------------------------------------------------------------------------------------ */

class WP_EXT_ShortCode_CodeEmail extends WP_EXT_ShortCode {

	/**
	 * Constructor.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function __construct() {
		parent::__construct();

		// Settings.
		$this->code_ID = 'email';

		// Initialize.
		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function run() {
		add_shortcode( $this->code_ID, [ $this, 'shortcode' ] );
	}

	/**
	 * ShortCode.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function shortcode( $atts, $content = null ) {

		/**
		 * Options.
		 * ---------------------------------------------------------------------------------------------------------- */

		$defaults = [
			'address' => '',
		];

		$atts = shortcode_atts( $defaults, $atts, $this->code_ID );

		/**
		 * Rendering data.
		 * ---------------------------------------------------------------------------------------------------------- */

		$address = ( $atts['address'] ) ? $atts['address'] . '' : '';
		$email   = esc_html( $address );
		$url     = '<a href="' . esc_url( 'mailto:' . $email ) . '" rel="nofollow"><i class="fas fa-envelope"></i><span>' . $email . '</span></a>';

		$out = '<span class="wp-ext-' . $this->domain_ID . ' wp-ext-' . $this->domain_ID . '-' . $this->code_ID . '">' . $url . '</span>';

		return $out;
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_ShortCode_CodeEmail
 * ------------------------------------------------------------------------------------------------------------------ */

function WP_EXT_ShortCode_CodeEmail() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_ShortCode_CodeEmail;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 * ------------------------------------------------------------------------------------------------------------------ */

add_action( 'plugins_loaded', [ WP_EXT_ShortCode_CodeEmail(), 'run' ] );
