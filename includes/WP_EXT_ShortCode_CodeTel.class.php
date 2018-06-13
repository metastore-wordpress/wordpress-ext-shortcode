<?php

/**
 * Class WP_EXT_ShortCode_CodeTel
 * ------------------------------------------------------------------------------------------------------------------ */

class WP_EXT_ShortCode_CodeTel extends WP_EXT_ShortCode {

	/**
	 * Constructor.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function __construct() {
		parent::__construct();

		// Settings.
		$this->code_ID = 'tel';

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
			'number' => '',
		];

		$atts = shortcode_atts( $defaults, $atts, $this->code_ID );

		/**
		 * Rendering data.
		 * ---------------------------------------------------------------------------------------------------------- */

		$number = ( $atts['number'] ) ? $atts['number'] . '' : '';
		$number = esc_html( $number );
		$tel    = preg_replace( '#[^0-9\+]#', '', $number );
		$url    = '<a href="' . esc_url( 'tel:' . $tel ) . '" rel="nofollow"><i class="fas fa-phone"></i><span>' . $number . '</span></a>';

		$out = '<span class="wp-ext-' . $this->domain_ID . ' wp-ext-' . $this->domain_ID . '-' . $this->code_ID . '">' . $url . '</span>';

		return $out;
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_ShortCode_CodeTel
 * ------------------------------------------------------------------------------------------------------------------ */

function WP_EXT_ShortCode_CodeTel() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_ShortCode_CodeTel;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 * ------------------------------------------------------------------------------------------------------------------ */

add_action( 'plugins_loaded', [ WP_EXT_ShortCode_CodeTel(), 'run' ] );
